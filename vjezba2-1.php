<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vjezba1b</title>

    <style>
        :root {
            --bg: #00185a;
            --card: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --accent: #2563eb;
        }

        * {
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
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 16px;
            font-size: 2rem;
        }

        p {
            margin-bottom: 16px;
            line-height: 1.6;
        }

        a {
            color: var(--text);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: 1px solid var(--accent);
            border-radius: 10px;
            text-decoration: none;
            color: var(--accent);
            transition: all 0.2s ease;
        }

        .btn:hover {
            background: var(--accent);
            color: #fff;
            text-decoration: none;
        }

        .btn:focus-visible {
            outline: 3px solid var(--accent);
            outline-offset: 2px;
        }

        .btn:active {
            opacity: 0.85;
        }

        .footer {
            font-size: 0.9rem;
            color: var(--muted);
        }

        @media screen and (max-width: 720px) {
            .wrap {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <main class="wrap">
        <h1>Naslov stranice</h1>

        <p>
            Ovu stranicu je izradio <b>Matija Kovačević</b>
        </p>

        <p>
            PHP je serverski jezik koji generira HTML ili JSON odgovor prema klijentu.
        </p>

        <a href="https://www.php.net/" class="btn">Saznaj više o PHP-u</a>

        <p class="footer">
            &copy; 2026 - Demo za PHP
        </p>
    </main>

</body>
</html>