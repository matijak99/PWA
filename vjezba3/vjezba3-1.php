<?php
$poruka = "";

if (isset($_GET['broj'])) {
    $uneseniBroj = $_GET['broj'];
    $zamisljeniBroj = rand(1, 9);

    if ($uneseniBroj == $zamisljeniBroj) {
        $poruka = "<p style='color:green;'>Pogodak, probaj ponovo!</p>";
    } else {
        $poruka = "<p style='color:red;'>Krivo, probaj ponovo!</p>";
    }

    $poruka .= "<p>Zamišljeni broj je $zamisljeniBroj</p>";
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Igra (pogodi broj)</title>
</head>
<body>

    <h2>Igra (pogodi broj)</h2>

    <form method="GET">
        <label>
            Upiši jedan broj od 1 do 9:
            <input type="number" name="broj" min="1" max="9" required>
        </label>

        <button type="submit">Provjeri</button>
    </form>

    <?php echo $poruka; ?>

</body>
</html>