<?php
require_once 'vendor/autoload.php'; // Autoload TWIG
require_once 'db_connection.php';

// Simpele inlogcontrole (gebruikersnaam = admin, wachtwoord = admin)
$gebruikersnaam = $_POST['gebruikersnaam'] ?? '';
$wachtwoord = $_POST['wachtwoord'] ?? '';

if ($gebruikersnaam === 'admin' && $wachtwoord === 'admin') {
    // Maak databaseverbinding
    $dbConnection = new DBConnection();
    $verbinding = $dbConnection->connect();

    // Render gebruikerspagina met gegevens
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('user.twig', [
        'gebruikersnaam' => $gebruikersnaam,
        'afbeeldingen' => [
            'afbeelding1.jpg',
            'afbeelding2.jpg',
            'afbeelding3.jpg'
        ]
    ]);
} else {
    // Render inlogpagina met foutmelding
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    echo $twig->render('login.twig', ['foutmelding' => 'Ongeldige inloggegevens']);
}
?>
