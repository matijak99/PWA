<?php
$naslov = "PHP dokument — vježba 1c";
$autor = "Ime Prezime";
$opis = "Ovo je primjer PHP stranice koja kombinira PHP i HTML sadržaj.";
$linkInfo = "https://www.php.net";
$linkNatrag = "vjezba2-1.php";
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $opis; ?>">
    <title><?php echo $naslov; ?></title>

    <style>
        :root {
            --bg: #00185a;
            --card: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --accent: #2563eb;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
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
            font-size: 2rem;
        }

        p {
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            margin-right: 10px;
            border: 1px solid var(--accent);
            border-radius: 10px;
            text-decoration: none;
            color: var(--accent);
            transition: .2s;
        }

        .btn:hover {
            background: var(--accent);
            color: #fff;
        }

        footer {
            margin-top: 24px;
            font-size: 0.9rem;
            color: var(--muted);
        }
    </style>
</head>
<body>

    <main class="wrap">
        <h1><?php echo $naslov; ?></h1>

        <p><?php echo $opis; ?></p>

        <p>Autor stranice: <?php echo $autor; ?></p>

        <a href="<?php echo $linkInfo; ?>" target="_blank" class="btn">
            Saznaj više o PHP-u
        </a>

        <a href="<?php echo $linkNatrag; ?>" class="btn">
            Natrag na vježba 1b
        </a>

        <footer>
            &copy; <?php echo date('Y'); ?> - Demo za PHP
        </footer>
    </main>

</body>
</html>