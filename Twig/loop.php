<?php
require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);



$users = [
    'usernameU' => "Halil \n",
    'usernameN' => "Uday \n",
    'usernameN' => "Mert \n",
    'usernameN' => "Ahmet \n",
    'usernameN' => "Bilal \n"

    

];

echo $twig->render('loop.twig', ['users' => $users]);

//echo $twig->render('extensie.twig', ['naam' => 'Halil','beroep' => 'student']);
