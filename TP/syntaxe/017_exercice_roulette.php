<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercice Roulette</title>
</head>

<body>
  <?php
    /*
        1. Complétez ce script PHP pour qu'il parcoure le tableau $rouletteRusse, élément par élement.
            Dans une liste <ul>, affichez "*click*" lorsque la case est 'vide', "PAN !" lorsqu'elle est chargée.

        2. Faites en sorte que l'affichage s'arrête lorsque la case 'chargé' est atteinte, après avoir écrit "PAN !"

            Indice : réfléchissez au type de boucle à utiliser
     */

    $rouletteRusse = array(
        1 => 'vide',
        2 => 'vide',
        3 => 'vide',
        4 => 'chargé',
        5 => 'vide',
        6 => 'vide',
    );
    // ici on écrit la balise html <ul>
    echo '<ul>';

    // on boucle sur le tableau php $rouletteRusse
    foreach ($rouletteRusse as $charge) {
      // $charge vaut soit 'vide', soit 'chargé'
      // si $charge vaut la valeur 'chargé
      if($charge === 'chargé') {
        // j'écrit 'PAN !'
        echo '<li>PAN !</li>';
        // et j'arrète la boucle
        break;
      } else {
        // sinon, j'écris '*click*'
        echo '<li>*click*</li>';
      }
    }
  // ici on écrit la balise html de fin de </ul>
    echo '</ul>';
?>

</body>

</html>