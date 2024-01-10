<?php 

/*
  Les boucles sont indispensables pour traiter les tableaux.
  Il est possible de lire tous les éléments d'un tableau, en utilisant par exemple la boucle `for`

  La fonction count($array) permet d'obtenir le nombre d'éléments d'un tableau.
 */

 $pins = array(
  'blue',
  'red',
  'yellow',
  'brown'
);
$countPins = count($pins);
for ($i = 0; $i < $countPins; $i++) {
  echo $pins[$i] . '<br>';
}

// syntaxe alternative
for ($i = 0; $i < $countPins; $i++) :
  echo $pins[$i] . '<br>';
endfor;

/*
  Pour plus de simplicité, on peut utiliser un autre type de boucle : `foreach`
  On écrira alors :
 */
  foreach ($pins as $item) {
    # code...
    echo $item . '<br>';
  }

/*
  Plus simple, non ?
  `foreach` permet également de se situer dans le tableau, en récupérant la clé de chaque case :
 */
  foreach ($pins as $key => $value) {
    echo 'La case ' . $key . ' du tableau contient la valeur ' . $value;
  }


  // syntaxe alternatives avec les :
  foreach ($variable as $key => $value) :
    echo 'La case ' . $key . ' du tableau contient la valeur ' . $value;
  endforeach;

  $cookies = [
    'Damien' => 'Chocolat',
    'Jean-Pierre' => 'Crevette'
  ];
  // foreach($variable as $cle => $valeur) { ... }
  foreach ($cookies as $firstname => $cookie) {
    echo $firstname . ' mange des cookies a/au ' . $cookie . '<br>';
  }


?>