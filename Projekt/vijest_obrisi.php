<?php 

include "konekcija.php";
include "funkcije.php";

if(!$_SESSION['prijavljen'] || !$_SESSION['uloga']==2) {
    header("location: index.php");
}

$id = $_GET['clanak'];

$sql="DELETE FROM komentar WHERE vijest_id = :id";
$stmt=$pdo->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

$sql="DELETE FROM vijest WHERE vijest_id = :id";
$stmt=$pdo->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

header("location: profil.php?prikaz=vijesti");


?>