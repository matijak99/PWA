<?php 

include "konekcija.php";
include "funkcije.php";

if(!$_SESSION['prijavljen']) {
    header("location: index.php");
}


$id = $_GET['komentar'];

$sql="DELETE FROM komentar WHERE komentar_id = :id";
$stmt=$pdo->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

header("location: profil.php?prikaz=komentari");


?>