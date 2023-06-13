<?php
require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);



$adres = [
    'titel' => "POSTADRES \n",
    'straat' => 'Bos en lommerweg',
    'huisnummer' => '242',
    'postbus' => '',
    'postcode' => '1055 EJ',
    'woonplaats' => 'Amsterdam'

];

echo $twig->render('extensie.twig', ['adres' => $adres]);

//echo $twig->render('extensie.twig', ['naam' => 'Halil','beroep' => 'student']);
