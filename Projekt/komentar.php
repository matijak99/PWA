<?php 

include "konekcija.php";
include "funkcije.php";

if(!$_SESSION['prijavljen']) {
    header("location: index.php");
}

$id=$_GET['clanak'];

if(!$clanak=dohvatiClanak($pdo, $id)) {
    header("location: index.php");
}

$tekst = trim(filter_input(INPUT_POST, 'tekst', FILTER_SANITIZE_SPECIAL_CHARS));

unesiKomentar($pdo, $tekst, $id, $_SESSION['id']);

header("location: clanak.php?clanak=$id");



?>
