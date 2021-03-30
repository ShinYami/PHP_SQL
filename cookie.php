<?php

//Session
session_start();

//COOKIE tjr avant le doctype
if (!empty($_POST['pseudo'])) {

    $pseudo = $_POST['pseudo'];
    $_SESSION['pseudo'] = $pseudo;

    setcookie('pseudo', $pseudo, time() + 365 * 24 * 3600, null, null, false, true);
}

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
<div class="container w-50">
<h2>Entrer votre pseudo</h2>
<form method="post" action="cookie.php">
  <div class="form-group m-2">
    <label for="formGroupExampleInput">Votre pseudo</label>
    <input type="text" class="form-control" name="pseudo" placeholder="Pseudo">
  </div>
  <button class="btn btn-primary m-2">Submit</button>
</form>
<?php
if (!empty($_SESSION['pseudo'])) {
    echo '<h2>Hello ' . $_SESSION['pseudo'] . '</h2>';
}
?>
</div>
</body>
</html>
