<?php 

include "konekcija.php";
include "funkcije.php";

if(!$_SESSION['prijavljen'] || !$_SESSION['uloga']==2) {
    header("location: index.php");
}

include "header.php";


if(isset($_POST['submit'])) {

    $naziv = trim($_POST['naziv']);

    try {
        unosKategorija($pdo, $naziv);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}




?>


<main>

    <aside>
        <form method="POST" action="">
            <h2>Nova kategorija</h2>

            <label for="naziv">Naziv</label>
            <input type="text" name="naziv" placeholder="Unesite naziv kategorije" id="naziv" required><br>

            <input type="submit" name="submit" value="Objavi">
        </form>
    </aside>

</main>

<?php

include "footer.php";

?>