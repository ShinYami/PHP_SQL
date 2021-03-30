<?php

// Connection a ma base de données
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['ville']) && isset($_POST['haut']) && isset($_POST['bas'])) {

    $ville = $_POST['ville'];
    $max = $_POST['haut'];
    $min = $_POST['bas'];

    $requete = $bdd->prepare('INSERT INTO Météo(ville,haut,bas) VALUES(? , ? , ?)') or die(print_r($bdd->errorInfo()));

    $requete->execute(array($ville, $max, $min));

    //header('location: ../');
}

if (isset($_GET['supprimer_ville'])) {
    $id = $_GET['supprimer_ville'];
    $bdd->exec("DELETE FROM Météo WHERE id=$id");
}

//Lire les infos
$requete = $bdd->query('SELECT * FROM Météo');

$donnees = $requete->fetchALL();

$requete->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h2>Ajouter une ville</h2>
<form class="form-inline" method="post" action="index.php">
  <div class="form-group m-2">
    <label for="formGroupExampleInput">Ville : </label>
    <input type="text" class="form-control" name="ville" placeholder="Entrer un nom de ville">
  </div>
  <div class="form-group m-2">
    <label for="formGroupExampleInput2">Temp Max : </label>
    <input type="text" class="form-control" name="haut" placeholder="Entrer une valeur">
  </div>
  <div class="form-group m-2">
    <label for="formGroupExampleInput2">Temp Min : </label>
    <input type="text" class="form-control" name="bas" placeholder="Entrer une valeur">
  </div>
  <button class="btn btn-primary m-2">Ajouter</button>
</form>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ville</th>
      <th scope="col">Haut</th>
      <th scope="col">Bas</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($donnees as $donnees): ?>
    <tr>
        <td>#<?=$donnees['id']?></td>
        <td><?=$donnees['ville']?></td>
        <td><?=$donnees['haut']?></td>
        <td><?=$donnees['bas']?></td>
        <td>
        <a class="btn btn-danger stretched-link" href="index.php?supprimer_ville=<?php echo $donnees['id'] ?>">Remove</a>
        </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
</div>
</body>
</html>
