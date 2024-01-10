<?php 
/*
  Rappel sur les tableaux multi-dimensionnels :
  Il est possible, en PHP, de créer des tableaux de tableaux.
 */

 $dates = array(
  'janvier' => array(
      '1',
      '2',
      '3',
  // ...
  ),
  'février' => array(
      '1',
      '2',
      '3',
  // ...
  ),
      // ...
);

/*
  On peut ajouter autant de niveaux qu'on le souhaite.
  Bien entendu, il faut que ces tableaux soient bien organisés pour être utilisés facilement.
 */

// Un tableau multi-dimensionnel avec des clés :

$products = array(
  1 => array(
      'id' => 487,
      'nom' => 'Crayon HB',
      'prix_unitaire' => 0.75,
      'fournisseurs' => array(
          'Leclerc',
          'Crayola',
      )
  ),
  2 => array(
      'id' => 140,
      'nom' => 'Gomme',
      'prix_unitaire' => 0.99,
      'fournisseurs' => array(
          'Auchan',
          'Carrefour',
      )
  ),
  3 => array(
      'id' => 26,
      'nom' => 'Rame de papier 500 feuilles',
      'prix_unitaire' => 4.50,
      'fournisseurs' => array(
          'Burocopy',
      )
  ),
);
/*
  Comme on le voit dans la troisieme case du tableau, il est tout à fait possible, et cohérent,
  d'utiliser un tableau, meme si on a un seul élément dedans.

  Ainsi, la structure est la meme pour chaque élément.
  On peut également facilement ajouter un fournisseur.
 */

 /*
  On peut utiliser des boucles pour lire le contenu de ce genre de tableaux.
  On placera une boucle dans une autre, pour parcourir chacun des éléments (boucles "imbriquées")
 */

foreach ($products as $product) {
  echo 'ID = ' . $product['id'] . '<br>';
  echo 'Nom = ' . $product['nom'] . '<br>';
  echo 'P.U. = ' . $product['prix_unitaire'] . '<br>';
  echo 'fournisseurs = <br>';
  echo '<ul>';
  foreach ($product['fournisseurs'] as $fournisseur) {
      echo '<li>' . $fournisseur . '</li>';
  }
  echo '</ul>';
}