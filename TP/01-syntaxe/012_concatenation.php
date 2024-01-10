<?php 

// Parfois on a besoin de construire des chaines de caractères progressivement
// l'opérateur .= permet cela

// je crée une variable $message
$message = 'bonjour ';

// connexion à une base de donnée...
// récupération du nom de l'utilisateur dans une variable...
$login = 'Yoda';

$message .= $login;
$message .= ', comment allez-vous ?';
$message .= '<br>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exemple de concaténation</title>
</head>

<body>
  <p><?php echo $message; ?></p>
</body>

</html>