<?php

// Connection a ma base de données
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', '');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
