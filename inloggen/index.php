<?php
require_once 'vendor/autoload.php'; // Autoload TWIG

// Render welkomstpagina
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
echo $twig->render('welcome.twig');
?>
