<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2 Assignation de variables</title>
</head>

<body>
  <h1>2 Assignation de variables</h1>
  <?php 
  // Assignation d'une variable String (chaine de caractères)
  $prenom = 'Jerome'; // on peut également utiliser des guillemets simples ou doubles

  // Assignation d'une variable Integer (nombre entier)
  $populationDanemark = 4500000;

  // Assignation d'une variable Float (nombre décimal)
  $tailleDanemark = 45.5;
  
  // Assignation d'une variable Boolean (vrai ou faux)
  $anneeBissextile = true; //true || false
  
  // Assignation d'une variable Array (tableau)
  $fruits = array('pomme', 'banane', 'poire');

  // Pour plus de lisibilité ou pourrait l'écrire comme ça :
  $fruits = array(
    'pomme',
    'banane',
    'poire'
  );

  // Depuis php 5.4,  On peut aussi notter les tableaux avec des []
  $fruits = [
    'poire',
    'banane',
    'pomme',
  ];

  /*
    Note :
    Une variable commence forcément par une lettre ou un caractère _.
    Elle peut contenir des chiffres, mais jamais en premiere position.
    Elle ne peut contenir aucun autre caractère ( *, ?, ., etc.)

    PHP reconnait les majuscules et les minuscules, $maVariable n'est pas la meme variable que $mavariable.
  */
  echo $prenom, '<br>', $populationDanemark, '<br>'; 
  echo $fruits[0]; //j'affiche la valeur de la première case du tableau

  // ici avec des guillemets doubles, je peux écrire des variables dans une phrase :
  echo "Mon prénom est $prenom et la population du Danemark est de $populationDanemark habitants.";
  
  
  ?>
</body>

</html>