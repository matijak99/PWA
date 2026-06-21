<?php 


include "konekcija.php";
include "funkcije.php";

if($_SESSION['prijavljen']) {
    header("location: index.php");
}

include "header.php";

if(isset($_POST['submit'])) {

    $korisnickoIme = trim(filter_input(INPUT_POST, 'korisnicko_ime', FILTER_SANITIZE_SPECIAL_CHARS));
    $ime = trim(filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_SPECIAL_CHARS));
    $prezime = trim(filter_input(INPUT_POST, 'prezime', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $lozinka = $_POST['lozinka'];
    $lozinkaPotvrdi = $_POST['lozinkaPotvrdi'];

    try {
        provjeraImeEmailLozinka($pdo, $korisnickoIme, $email, $lozinka, $lozinkaPotvrdi);
        $lozinka=password_hash($lozinka, PASSWORD_DEFAULT);
        registracija($pdo, $ime, $prezime, $korisnickoIme, $email, $lozinka);
        header("location: prijava.php");
    } catch(PDOException $e) {
        echo "<div id='greska'>".$e->getMessage()."</div>";
    }

}


?>


<main>

    <aside>
        <form method="POST" action="">
            <h2>Registrirajte se</h2>

            <label for="ime">Ime</label>
            <input type="text" name="ime" placeholder="Unesite ime" id="ime" required><br>

            <label for="prezime">Prezime</label>
            <input type="text" name="prezime" placeholder="Unesite prezime" id="ime" required><br>

            <label for="korime">Korisničko ime</label>
            <input type="text" name="korisnicko_ime" placeholder="Unesite korisničko ime" id="korime" required><br>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Unesite email" id="email" required><br>

            <label for="lozinka">Lozinka</label>
            <input type="password" name="lozinka" placeholder="Unesite lozinku" id="lozinka" required><br>

            <label for="lozinkaPotvrdi">Potvrdi lozinku</label>
            <input type="password" name="lozinkaPotvrdi" placeholder="Unesite lozinku" id="lozinkaPotvrdi" required><br>

            <input type="submit" name="submit" value="Registriraj se">
        </form>
    </aside>

</main>



    
<?php 

include "footer.php";

?>
