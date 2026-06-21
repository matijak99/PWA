<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        LExpress
    </title>
    <link rel="stylesheet" type="text/css" href="stil/stil.css">
    <link rel="icon" href="slike/fav.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/48.2.0/ckeditor5.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<header>
    <a href="index.php"><img src="slike/logo.png" alt="Logo"></a><br>

    <img src="slike/menu.svg" id="menu">

    <nav>
        <ul>
            <li>
                <a href="index.php">Naslovna</a>
            </li>
            <li>
                <a href="index.php?kategorija=svijet">Svijet</a>
            </li>
            <li>
                <a href="index.php?kategorija=gospodarstvo">Gospodarstvo</a>
            </li>

            <?php 
            
            if($_SESSION['prijavljen']) {
                echo "
                <li>
                    <a href='profil.php'>Profil</a>
                </li>
                <li>
                    <a href='odjava.php'>Odjava</a>
                </li>
                ";
            } else {
                echo "
                <li>
                    <a href='prijava.php'>Prijava</a>
                </li>
                <li>
                    <a href='registracija.php'>Registracija</a>
                </li>
                ";
            }
            
            ?>

            
            
        </ul>
    </nav>
</header>




