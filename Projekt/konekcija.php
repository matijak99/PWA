<?php

session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
]);

session_start();

$env = parse_ini_file('.env');

putenv("DB_DSN=" . $env['DB_DSN']);
putenv("DB_USER=" . $env['DB_USER']);
putenv("DB_PASS=" . $env['DB_PASS']);

$dsn = getenv('DB_DSN');
$korisnik = getenv('DB_USER');
$lozinka = getenv('DB_PASS');

error_reporting(0);
ini_set('display_errors', 0);

try {
    $pdo = new PDO($dsn, $korisnik, $lozinka);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Greška pri spajanju s bazom podataka.";
}


?>