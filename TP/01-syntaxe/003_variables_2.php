<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>3 - Assignations de variables</title>
</head>

<body>
  <h1>Variables tableau</h1>

  <?php 
    //php permet d'écrire des tableaux associatifs
    $aliments = array(
      'pomme' => 'fruit',  // clé => valeur
      'banane' => 'fruit',
      'poire' => 'fruit',
      'poireau' => 'légume',
      'cerise' => 'fruit',
      'salade' => 'légume'
    );

    echo $aliments['pomme'];
    echo '<br>';

    // On peut également créer un tableau vide
    $aliments = [];

    // Je remplis le tableau clé par clé :
    $aliments['pomme'] = 'fruit';
    $aliments['salade'] = 'fruit';
    // on pourrait ajouter des cases à un tableau sans clé :
    $aliments[] = 'légume';
    $aliments[] = 'fruit';
    
    // pour afficher un tableau, on utiliser la fonction print_r()
    print_r($aliments);
    echo '<br>';
    // on peut afficher une clé de tableau avec la notation $tableau['clé']
    echo $aliments['pomme'];
    echo '<br>';

      // On peut aussi créer un tableau multidimensionnel
      $tableau = array(
        'fruits' => array('pomme', 'poire', 'banane'),
        'légumes' => array('poireau', 'radis','salade'),
      );
    
      // on peut aussi le notter comme ceci :
      $tableau = array(
        'fruits' => array(
          'pomme',
          'poire',
          'banane'
        ),
        'légumes' => array(
          'poireau',
          'radis',
          'salade'
        ),
      );

      // pour afficher une donnée d'un tableau multidimensionnel, on utilise la notation $tableau['clé']['clé2']
      //pour récupérer 'poire' :
      echo $tableau['fruits'][1]; // 'poire'
    
    

  ?>

</body>

</html>