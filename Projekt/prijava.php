<?php 

include "konekcija.php";
include "funkcije.php";

include "header.php";


if(isset($_POST['submit'])) {

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $lozinka = $_POST['lozinka'];

    try {
        prijava($pdo, $email, $lozinka);
    } catch (PDOException $e) {
        echo "<div id='greska'>".$e->getMessage()."</div>";
    }

}


?>


<main>

    <aside>
        <form method="POST" action="">
            <h2>Prijavite se</h2>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Unesite email" required><br>

            <label for="lozinka">Lozinka</label>
            <input type="password" name="lozinka" placeholder="Unesite lozinku" required><br>

            <input type="submit" name="submit" value="Prijavite se">
        </form>
    </aside>

</main>



    
<?php 

include "footer.php";

?>
