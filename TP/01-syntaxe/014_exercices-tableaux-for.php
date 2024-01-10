<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercice For</title>
</head>

<body>

  <?php
//Exercice 1
/*
    1. Ecrire un tableau HTML contenant 20 lignes, à l'aide d'une boucle for.

    2. Dans chaque première case, écrire le numéro de la ligne : "Ligne 1", "Ligne 2", "Ligne 3..."
*/

    echo '<table><tbody>';

    for ($i=1; $i <= 20; $i++) {
        echo '<tr><td>' . $i . '</td></tr>';
    }
    echo '</tbody></table>';

  //Exercice 2
  /*
  * Complétez le script PHP suivant de manière à afficher un tableau HTML composé de $nbLignes lignes
  * et de $nbColonnes colonnes.
  * On affichera un indice dans chaque case, en commençant par 1.
  * 
  * [Facultatif] Une case sur deux sera grisée.
  */
 
$nbLignes = 4;
$nbColonnes = 3;
?>
  <hr>
  <table border="1" width="100%">
    <tbody>
      <?php /*for ($i=0; $i < $nbLignes; $i++) { ?>
      <tr>
        <?php for ($j=1; $j <= $nbColonnes; $j++) { ?>
        <td><?php echo $i + $i + $j; ?></td>
        <?php } ?>
      </tr>
      <?php }*/ ?>

      <?php 
      for ($i=0; $i < $nbLignes; $i++) { 
        echo '<tr>';
        for ($j=1; $j <= $nbColonnes; $j++) {
          
          // on incrémente le compteur par case
          $count = $i * $nbColonnes + $j;
          /*
          // je teste si le compteur est un chiffre pair
          if($count % 2 == 0) {
            // si oui, je mets le style
            $style = 'style="background-color: #777"';
          } else {
            // sinon rien
            $style = '';
          }

          // je crée la case correspondant au style et au compteur
          echo '<td '. $style .'>'. $count . '</td>';*/
          
          // on peut aussi utiliser une condition avec un ternaire :
          echo '<td '. ($count % 2 == 0 ? 'style="background-color: #777"' : '') .'>'. $count . '</td>';
        }
        
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>

</body>

</html>