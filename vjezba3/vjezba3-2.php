<?php
$rezultat = "";

if (isset($_GET['broj1']) && isset($_GET['broj2']) && isset($_GET['operacija'])) {

    $broj1 = $_GET['broj1'];
    $broj2 = $_GET['broj2'];
    $operacija = $_GET['operacija'];

    switch ($operacija) {
        case '+':
            $rezultat = $broj1 + $broj2;
            break;

        case '-':
            $rezultat = $broj1 - $broj2;
            break;

        case '*':
            $rezultat = $broj1 * $broj2;
            break;

        case '/':
            if ($broj2 != 0) {
                $rezultat = $broj1 / $broj2;
            } else {
                $rezultat = "Dijeljenje s nulom nije moguće!";
            }
            break;

        default:
            $rezultat = "Odaberite operaciju.";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator (Switch naredba)</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        input, button {
            padding: 8px;
            margin: 5px;
        }

        .rezultat {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Kalkulator (Switch naredba)</h2>

    <form method="GET">
        <p>
            Upiši prvi broj:
            <input type="number" name="broj1" required>
        </p>

        <p>
            Upiši drugi broj:
            <input type="number" name="broj2" required>
        </p>

        <p>Rezultat: <?php echo $rezultat; ?></p>

        <button type="submit" name="operacija" value="+">+</button>
        <button type="submit" name="operacija" value="-">-</button>
        <button type="submit" name="operacija" value="*">*</button>
        <button type="submit" name="operacija" value="/">/</button>
    </form>

</body>
</html>