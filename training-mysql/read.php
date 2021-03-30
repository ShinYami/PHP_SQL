<?php

include 'connection.php';

//Lire les infos
$requete = $bdd->query('SELECT * FROM hiking');

$donnees = $requete->fetchALL();

$requete->closeCursor();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table class="table table-striped">
      <!-- Afficher la liste des randonnées -->
      <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Difficulté</th>
      <th scope="col">Distance</th>
      <th scope="col">Duration</th>
      <th scope="col">Dénivelé</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($donnees as $donnees): ?>
    <tr>
        <td><?=$donnees['name']?></td>
        <td><?=$donnees['difficulty']?></td>
        <td><?=$donnees['distance']?> m</td>
        <td><?=$donnees['duration']?></td>
        <td><?=$donnees['height_difference']?> m</td>
    </tr>
    <?php endforeach?>
  </tbody>
    </table>
  </body>
</html>
