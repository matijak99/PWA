<?php 
function provjeraImeEmailLozinka($pdo, $ime, $email, $lozinka, $lozinkaPotvrdi) {

    $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = :ime";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'ime' => $ime
    ]);

    if($stmt->fetch(PDO::FETCH_ASSOC)) {
        throw new PDOException("Korisnicko ime se već koristi.");
    }

    $sql = "SELECT * FROM korisnik WHERE email = :email";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'email' => $email
    ]);

    if($stmt->fetch(PDO::FETCH_ASSOC)) {
        throw new PDOException("Email se već koristi.");
    }

    if(!($lozinka === $lozinkaPotvrdi)) {
        throw new PDOException("Lozinke se ne podudaraju.");
    }
}

function registracija($pdo, $ime, $prezime, $korime, $email, $lozinka) {
    $sql="INSERT INTO korisnik(ime, prezime, korisnicko_ime, email, lozinka) VALUES (:ime, :prezime, :korime, :email, :lozinka);";
    $stmt=$pdo->prepare($sql);
    try {
        $stmt->execute([
            'ime' => $ime,
            'prezime' => $prezime,
            'korime' => $korime,
            'email' => $email,
            'lozinka' => $lozinka,
        ]);
    } catch(PDOException $e) {
        throw new PDOException("Greška kod registracije.");
    }
}

function prijava($pdo, $email, $lozinka) {
    $sql="SELECT * FROM korisnik WHERE email = :email";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        'email' => $email
    ]);

    $korisnik=$stmt->fetch(PDO::FETCH_ASSOC);

    if($korisnik && password_verify($lozinka, $korisnik['lozinka'])) {

        $_SESSION['prijavljen']=true;
        $_SESSION['id']=$korisnik['korisnik_id'];
        $_SESSION['ime']=$korisnik['korisnicko_ime'];
        $_SESSION['email']=$korisnik['email'];
        $_SESSION['uloga']=$korisnik['uloga'];

        header("location: index.php");
        die();
    } else {
        throw new PDOException("Pogrešan email ili lozinka");
    }
}


function unosKategorija($pdo, $naziv) {
    $sql="SELECT * FROM kategorija WHERE naziv = :naziv;";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        'naziv' => $naziv
    ]);
    $kategorija=$stmt->fetchAll(PDO::FETCH_ASSOC);

    if($kategorija) {
        throw new PDOException("Kategorija već postoji.");
    }

    try {
        $sql="INSERT INTO kategorija (naziv) VALUES (:naziv)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([
            'naziv' => $naziv
        ]);
    } catch(PDOException) {
        throw new PDOException("Greška kod unosa kategorije.");
    }
}

function dohvatiClanak($pdo, $id) {
    $sql="SELECT vijest.vijest_id, vijest.naslov, vijest.sadrzaj, vijest.datum_objave, kategorija.naziv kategorija FROM vijest
    INNER JOIN kategorija ON kategorija.kategorija_id = vijest.kategorija_id
    WHERE vijest.vijest_id = :id;";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function unesiKomentar($pdo, $tekst, $id, $korisnik) {
    $sql="INSERT INTO komentar (sadrzaj, korisnik_id, vijest_id) VALUES (:sadrzaj, :korisnik_id, :vijest_id);";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        'sadrzaj' => $tekst,
        'korisnik_id' => $korisnik,
        'vijest_id' => $id
    ]);
}

function dohvatiKomentarePoVijest($pdo, $id) {
    $sql="SELECT sadrzaj, korisnicko_ime korisnik, datum_objave FROM komentar INNER JOIN
          korisnik ON korisnik.korisnik_id = komentar.korisnik_id                
          WHERE vijest_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);
     
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function dohvatiKomentarePoKorisniku($pdo, $id) {
    $sql="SELECT vijest_id, komentar_id, komentar.sadrzaj, korisnicko_ime korisnik, komentar.datum_objave, korisnik.korisnicko_ime  autor FROM komentar INNER JOIN
          korisnik ON korisnik.korisnik_id = komentar.korisnik_id
          WHERE komentar.korisnik_id = :id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);
     
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function dohvatiKomentare($pdo) {
    $sql="SELECT vijest_id, komentar_id, komentar.sadrzaj, korisnicko_ime korisnik, komentar.datum_objave, korisnik.korisnicko_ime autor FROM komentar INNER JOIN
          korisnik ON korisnik.korisnik_id = komentar.korisnik_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
     
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function dohvatiKorisnike($pdo) {
    $sql="SELECT * FROM korisnik";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function dohvatiVijesti($pdo) {
    $sql="SELECT vijest.vijest_id, korisnik.korisnicko_ime AS autor, vijest.naslov, vijest.datum_objave, kategorija.naziv AS kategorija FROM vijest INNER JOIN 
    kategorija ON kategorija.kategorija_id = vijest.kategorija_id INNER JOIN
    korisnik ON korisnik.korisnik_id = vijest.autor_id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>