<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercice While, Do...While</title>
</head>

<body>
  <?php
  // Exercice 1
  /*
      1. A l'aide d'une boucle `while`, écrire un tableau HTML comportant 10 lignes.

      2. Chacune des lignes comportera 10 cases, générées par une boucle `for`.

      3. Chaque case sera numérotée de 1 à 100.
  */
  $nbLignes = 10;
  $nbColonnes = 10;
  
  echo '<table border="1"><tbody>';
  $i = 0;
  while($i < $nbLignes) {

    echo '<tr>';
    for ($j=1; $j <= $nbColonnes; $j++) {
      // on incrémente le compteur par case
      echo '<td>'. ( $i * $nbColonnes + $j ) . '</td>';
    }
    
    echo '</tr>';
    $i++;
  }

  echo '</tbody></table>';

  //Exercice 2
  /*
    Transformer la boucle de l'exercice 018 en boucle do...while, pour que le résultat soit exactement le même
  */
  
  echo '<table border="1"><tbody>';
  $i = 0;
  
  do {
    echo '<tr>';
    for ($j=1; $j <= $nbColonnes; $j++) {
      // on incrémente le compteur par case
      echo '<td>'. ( $i * $nbColonnes + $j ) . '</td>';
    }
    
    echo '</tr>';
    $i++;
  }
  while($i < $nbLignes);

  echo '</tbody></table>';

  ?>
</body>

</html>