<?php 

include "konekcija.php";
include "funkcije.php";
include "header.php";

if(isset($_GET['kategorija'])) {
    $kategorija=trim($_GET['kategorija']);
    $sql="SELECT * FROM kategorija WHERE naziv=:kat";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        'kat' => $kategorija
    ]);
} else {
    $sql="SELECT * FROM kategorija;";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
}

$kategorije=$stmt->fetchAll(PDO::FETCH_ASSOC);



?>


<main>

    <?php 

        foreach($kategorije as $kategorija){
            $sql="SELECT * FROM vijest WHERE kategorija_id = :kategorija";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([
                'kategorija' => $kategorija['kategorija_id']
            ]);
            if(!$vijesti=$stmt->fetchAll(PDO::FETCH_ASSOC)) {
                continue;
            }
            echo "
            <h2>
                {$kategorija['naziv']}
            </h2>
            <div>
            ";

            foreach($vijesti as $vijest) {
                if($vijest['kategorija_id']==$kategorija['kategorija_id']) {
                    echo "
                    <a href='clanak.php?clanak={$vijest['vijest_id']}' class='clanak'>
                        <div>
                            <img src='slike/vijesti/{$vijest['vijest_id']}.png'>
                            <p>
                                {$vijest['naslov']}
                            </p>
                        </div>
                    </a>
                    ";
                }
            }

            echo "</div>";
        }

    
    ?>

</main>

<?php 

include "footer.php";

?>