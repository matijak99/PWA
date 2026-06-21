<?php 

include "konekcija.php";
include "funkcije.php";
include "header.php";

$id=$_GET['clanak'];

$nema=false;
if(!$clanak=dohvatiClanak($pdo, $id)) {
    $nema=true;
    $clanak['naslov']="Članak nedostupan";
}

?>

<main>
    <article>
        <h3>
            <?php echo $clanak['kategorija'] ?>
        </h3>
        <h2>
            <?php echo $clanak['naslov'] ?>
        </h2>
        <span>
            <?php echo date("H:i, d. m. Y.", strtotime($clanak['datum_objave']))  ?>
        </span>
        <img src="slike/vijesti/<?php echo $clanak['vijest_id'] ?>.png">
        <p>
            <?php echo $clanak['sadrzaj'] ?>
        </p>

        <?php 
        
            if(!$nema){
                echo "
                <div class='komentari'>
                    <h3>
                        Ostavite komentar
                    </h3>
                    <form method='POST' action='komentar.php?clanak=$id'>
                        <textarea name='tekst' maxlength='255'></textarea><br>
                        <input type='submit' name='submit' value='Objavi'>
                    </form>
                    <h2>
                        Komentari
                    </h2>";

                $komentari = dohvatiKomentarePoVijest($pdo, $id);

                foreach($komentari as $komentar) {
                    echo "
                    <div>
                        <h3>
                            {$komentar['korisnik']}
                        </h3>
                        <p>
                            {$komentar['sadrzaj']}
                        </p>
                        <p>".
                            date("H:i, d. m. Y.", strtotime($komentar['datum_objave']))
                        ."</p>
                    </div>";
                }

                echo "</div>";
            }
        
        ?>
        
    </article>
</main>

<?php 

include "footer.php";

?>