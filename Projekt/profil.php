<?php 

include "konekcija.php";
include "funkcije.php";

if(!$_SESSION['prijavljen']) {
    header("location: index.php");
}


include "header.php";

?>


<main>
    <aside>
        <?php 


        echo "
            <div>
                <h2>Pozdrav, {$_SESSION['ime']}!</h2>
            </div>
        ";

        if($_SESSION['uloga']==0) {
            $komentari = dohvatiKomentarePoKorisniku($pdo, $_SESSION['id']);

            echo "<div class='prikaz'>
            <h3>
                Vaši komentari
            </h3>
                <div>
                    <p>
                        Sadrzaj
                    </p>
                    <p>
                        Autor
                    </p>
                    <p>
                        Članak
                    </p>
                    <p>
                        Datum objave
                    </p>
                </div>";

            foreach($komentari as $komentar) {
                echo "
                <div>
                    <p>
                        {$komentar['sadrzaj']}
                    </p>
                    <p>
                        {$komentar['autor']}
                    </p>
                    <p>
                        <a href='clanak.php?clanak={$komentar['vijest_id']}'>Članak</a>
                    </p>
                    <p>
                        {$komentar['datum_objave']}
                    </p>
                    <p>
                        <a href='komentar_obrisi.php?komentar={$komentar['komentar_id']}'>Obriši</a>
                    </p>
                </div>
                ";
            }
        }

        

        if($_SESSION['uloga']==2) {

            echo "
            <h2>
                Administracija
            </h2>
            <div class='admin'>
                <a href='profil.php?prikaz=korisnici'>
                    <div>
                        Korisnici
                    </div>
                </a>
                <a href='profil.php?prikaz=vijesti'>
                    <div>
                        Vijesti
                    </div>
                </a>
                <a href='profil.php?prikaz=komentari'>
                    <div>
                        Komentari
                    </div>
                </a>
            </div>
            ";
            
            if($_GET['prikaz']=='korisnici') {

                echo "<div class='prikaz'>
                    <div>
                        <p>
                            ID
                        </p>
                        <p>
                            Korisničko ime
                        </p>
                        <p>
                            Email
                        </p>
                        <p>
                            Datum registracije
                        </p>
                        <p>
                            Uloga
                        </p>
                    </div>";

                $korisnici = dohvatiKorisnike($pdo);

                foreach($korisnici as $korisnik) {
                    echo "
                    <div>
                        <p>
                            {$korisnik['korisnik_id']}
                        </p>
                        <p>
                            {$korisnik['korisnicko_ime']}
                        </p>
                        <p>
                            {$korisnik['email']}
                        </p>
                        <p>
                            {$korisnik['datum_registracije']}
                        </p>
                        <p>";
                        echo $korisnik['uloga']==0 ? 'Čitatelj' : 'Admin';
                        echo "</p>
                    </div>
                    ";
                }

                echo "</div>";

            } else if($_GET['prikaz']=='vijesti') {

                echo "<a href='vijest.php'><h3>Nova vijest</h3></a>";
                echo "<a href='kategorija.php'><h3>Nova kategorija</h3></a>";

                echo "<div class='prikaz'>
                    <div>
                        <p>
                            Naslov
                        </p>
                        <p>
                            Kategorija
                        </p>
                        <p>
                            Autor
                        </p>
                        <p>
                            Datum objave
                        </p>
                        <p>
                            Sadrzaj
                        </p>
                    </div>";

                $vijesti = dohvatiVijesti($pdo);

                foreach($vijesti as $vijest) {
                    echo "
                    <div>
                        <p>
                            <a href='clanak.php?clanak={$vijest['vijest_id']}'>{$vijest['naslov']}</a>
                        </p>
                        <p>
                            {$vijest['kategorija']}
                        </p>
                        <p>
                            {$vijest['autor']}
                        </p>
                        <p>
                            {$vijest['datum_objave']}
                        </p>
                        <p>
                            <a href='vijest_obrisi.php?clanak={$vijest['vijest_id']}'>Obriši</a>
                        </p>
                    </div>
                    ";
                }

                echo "</div>";
            } else if($_GET['prikaz']=='komentari') {

                $komentari = dohvatiKomentare($pdo);

                echo "<div class='prikaz'>
                    <div>
                        <p>
                            Sadrzaj
                        </p>
                        <p>
                            Autor
                        </p>
                        <p>
                            Članak
                        </p>
                        <p>
                            Datum objave
                        </p>
                    </div>";

                foreach($komentari as $komentar) {
                    echo "
                    <div>
                        <p>
                            {$komentar['sadrzaj']}
                        </p>
                        <p>
                            {$komentar['autor']}
                        </p>
                        <p>
                            <a href='clanak.php?clanak={$komentar['vijest_id']}'>Članak</a>
                        </p>
                        <p>
                            {$komentar['datum_objave']}
                        </p>
                        <p>
                            <a href='komentar_obrisi.php?komentar={$komentar['komentar_id']}'>Obrisi</a>
                        </p>
                    </div>
                    ";
                }
            }

        }

        
        ?>
    </aside>
</main>

<?php 

include "footer.php";

?>