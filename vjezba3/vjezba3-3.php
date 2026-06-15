<?php
$poruka = "";

if (isset($_GET['kol1']) && isset($_GET['kol2'])) {

    $kol1 = (int)$_GET['kol1'];
    $kol2 = (int)$_GET['kol2'];

    if ($kol1 < 1 || $kol1 > 5 || $kol2 < 1 || $kol2 > 5) {
        $poruka = "Ocjene moraju biti između 1 i 5.";
    } else {

        $prosjek = ($kol1 + $kol2) / 2;

        if ($kol1 == 1 || $kol2 == 1) {
            $konacnaOcjena = 1;
        } else {
            $konacnaOcjena = round($prosjek);
        }

        $poruka = "
            <p>Ocjena I. kolokvija: $kol1</p>
            <p>Ocjena II. kolokvija: $kol2</p>
            <p>Prosjek: " . number_format($prosjek, 2) . "</p>
            <p>Konačna ocjena: $konacnaOcjena</p>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Izračun ocjene</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 40px;
    }

    .container {
        max-width: 400px;
        margin: auto;
        border: 1px solid #ccc;
        padding: 20px;
    }

    h2 {
        margin-top: 0;
    }

    label {
        display: block;
        margin-top: 10px;
    }

    input {
        width: 100%;
        padding: 5px;
        margin-top: 5px;
    }

    button {
        margin-top: 15px;
        padding: 8px 15px;
    }

    .rezultat {
        margin-top: 20px;
    }
</style>

</head>
<body>

<div class="container">

    <h2>Izračun konačne ocjene</h2>

    <form method="GET">

        <label for="kol1">Ocjena I. kolokvija:</label>
        <input type="number" name="kol1" id="kol1" min="1" max="5" required>

        <label for="kol2">Ocjena II. kolokvija:</label>
        <input type="number" name="kol2" id="kol2" min="1" max="5" required>

        <button type="submit">Izračunaj</button>

    </form>

    <div class="rezultat">
        <?php echo $poruka; ?>
    </div>

</div>

</body>
</html>