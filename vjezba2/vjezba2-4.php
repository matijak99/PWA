<?php

$c=0;

if (isset($_GET['a']) && isset($_GET['b'])) {
    $a = $_GET['a'];
    $b = $_GET['b'];

    $c = (3 * $a - $b) / 2;
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Izračun varijable c</title>
</head>
<body>

    <form method="GET">
        <label>
            Vrijednost a:
            <input type="number" name="a" required>
        </label>
        <br><br>

        <label>
            Vrijednost b:
            <input type="number" name="b" required>
        </label>
        <br><br>

        <button type="submit">Izračunaj</button>
    </form>

    <?php
        echo "<p>Rezultat: c = (3 * $a - $b) / 2 = $c</p>";
    ?>

</body>
</html>