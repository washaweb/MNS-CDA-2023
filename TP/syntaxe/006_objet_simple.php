<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Objets simples</title>
</head>

<body>
  <?php

  // Pour faire un objet à la place d'un tableau

  $user = (object)[
    'nom' => 'John',
    'prenom' => 'Doe',
    'age' => 23
  ];

  // Pour accéder aux propriétés d'un objet en PHP il faut utiliser la flèche ->

  echo "Bonjour $user->nom $user->prenom, Votre âge est de $user->age ans";

  ?>
</body>

</html>