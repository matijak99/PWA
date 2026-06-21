<?php 

include "konekcija.php";
include "funkcije.php";
include "header.php";

if(!$_SESSION['prijavljen'] || !$_SESSION['uloga']==2) {
    header("location: index.php");
}

if(isset($_POST['submit'])) {

    $time=time();
    $slika=$time.".png";

    $naslov = trim($_POST['naslov']);
    $sadrzaj = trim($_POST['sadrzaj']);
    $kategorija = $_POST['kategorija'];
    $slika_tmp=$_FILES['slika']['tmp_name'];


    $maxSirina = 1920;
    $maxVisina = 1080;
    $dimenzija = getimagesize($_FILES['slika']['tmp_name']);
    if ($dimenzija[0] > $maxSirina || $dimenzija[1] > $maxVisina) {
        echo "Slika mora biti 1920x1080 ili manja.";
        exit;
    }

    $sql="INSERT INTO vijest (vijest_id, naslov, sadrzaj, kategorija_id, autor_id) VALUES (:id, :naslov, :sadrzaj, :kategorija_id, :autor_id)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        'id' => $time,
        'naslov' => $naslov,
        'sadrzaj' => $sadrzaj,
        'kategorija_id' => $kategorija,
        'autor_id' => $_SESSION['id']
    ]);

    move_uploaded_file($slika_tmp, "slike/vijesti/$slika");

}




?>


<main>

    <aside>
        <form method="POST" action="" enctype="multipart/form-data">
            <h2>Nova vijest</h2>

            <label for="naslov">Naslov</label>
            <input type="text" name="naslov" placeholder="Unesite naslov" id="naslov" required><br>

            <label for="editor">Sadržaj</label>
            <textarea name="sadrzaj" id="editor" required></textarea><br>

            <label for="slika">Slika</label>
            <input type="file" name="slika" placeholder="Unesite lozinku" id="slika" accept="image/*" required><br>



            <select name="kategorija">
                

            <?php 
            
                $sql="SELECT * FROM kategorija;";
                $stmt=$pdo->prepare($sql);
                $stmt->execute();
                $kategorije=$stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($kategorije as $kategorija) {
                    echo "<option value='{$kategorija['kategorija_id']}'>{$kategorija['naziv']}</option>";
                }
            
            ?>


            </select>

            <input type="submit" name="submit" value="Objavi">
        </form>
    </aside>

</main>

<?php

include "footer.php";

?>