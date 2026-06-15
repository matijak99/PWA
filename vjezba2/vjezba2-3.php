<?php
$naslov = "PHP dokument — vježba 1d";
$autor = "Matija Kovacevic";
$opis = "Ova stranica nadograđuje vježbu 1c: biramo temu (dark/light), odabiremo sliku i po želji prikazujemo opis.";

$tema = $_GET['tema'] ?? 'dark';
$slika = $_GET['slika'] ?? 'php';
$prikaziOpis = isset($_GET['opis']);

$putanjaSlike =  $slika . ".jpg";

$bg = "#1f2937";
$card = "#ffffff";
$text = "#111827";

if ($tema === "light") {
    $bg = "#f3f4f6";
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $naslov; ?></title>

    <style>
        :root {
            --card: #ffffff;
            --accent: #2563eb;
            --muted: #6b7280;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: <?php echo $bg; ?>;
            color: <?php echo $text; ?>;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            font-size: 16px;
        }

        .wrap {
            max-width: 720px;
            margin: 48px auto;
            padding: 32px;
            background: var(--card);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 16px;
        }

        p {
            line-height: 1.6;
        }

        img {
            max-width: 250px;
            display: block;
            margin: 20px 0;
            border-radius: 10px;
        }

        form {
            margin-top: 24px;
        }

        .group {
            margin-bottom: 16px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: 1px solid var(--accent);
            border-radius: 10px;
            text-decoration: none;
            background: white;
            color: var(--accent);
            cursor: pointer;
            transition: .2s;
        }

        .btn:hover {
            background: var(--accent);
            color: #fff;
        }

        .back {
            margin-left: 8px;
        }

        .footer {
            font-size: 0.9rem;
            color: var(--muted);
        }
    </style>
</head>
<body>

    <main class="wrap">

        <h1><?php echo $naslov; ?></h1>

        <p>Ovu stranicu je izradio <?php echo $autor; ?></p>

        <img src="<?php echo $putanjaSlike; ?>" alt="<?php echo $slika; ?>">

        <?php if ($prikaziOpis) : ?>
            <p><?php echo $opis; ?></p>
        <?php endif; ?>

        <form method="GET">

            <div class="group">
                <strong>Tema:</strong><br>

                <label>
                    <input type="radio" name="tema" value="dark"
                        <?php if ($tema === 'dark') echo 'checked'; ?>>
                    Dark
                </label>

                <label>
                    <input type="radio" name="tema" value="light"
                        <?php if ($tema === 'light') echo 'checked'; ?>>
                    Light
                </label>
            </div>

            <div class="group">
                <label for="slika"><strong>Odaberi sliku:</strong></label><br>

                <select name="slika" id="slika">
                    <option value="php" <?php if ($slika === 'php') echo 'selected'; ?>>
                        PHP
                    </option>

                    <option value="server" <?php if ($slika === 'server') echo 'selected'; ?>>
                        Server
                    </option>

                    <option value="code" <?php if ($slika === 'code') echo 'selected'; ?>>
                        Code
                    </option>
                </select>
            </div>

            <div class="group">
                <label>
                    <input type="checkbox" name="opis"
                        <?php if ($prikaziOpis) echo 'checked'; ?>>
                    Prikaži opis
                </label>
            </div>

            <button type="submit" class="btn">
                Primijeni odabir
            </button>

            <a href="vjezba1c.php" class="btn back">
                Natrag na vježba 1c
            </a>

        </form>
        <p class="footer">
            &copy; 2026 - Demo za PHP
        </p>
    </main>

</body>
</html>