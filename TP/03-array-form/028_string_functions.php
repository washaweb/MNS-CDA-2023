<?php 

// Quelques fonctions utiles pour manipuler les chaines de caractères :

$string = 'Un mojito s\'il vous plait !';
$string = strtoupper($string); // met les caractères en majuscule
// "UN MOJITO S'IL VOUS PLAIT !"

$string = 'Une Phrase Avec Plein De Majuscules';
$string = strtolower($string); // met les caractères en minuscules
// une phrase avec plein de majuscules

/*
  On peut ajouter une majuscule en début de chaine

  `ucfirst($string)`
 */
$string = ucfirst($string);
// Une phrase avec plein de majuscules

/*
  Il est également possible d'ajouter une majuscule à chaque mot de la chaine,
  avec la fonction `ucwords($string)`
 */
$string = ucwords($string);
// Une Phrase Avec Plein De Majuscules

/*
  Une fonction extrêmement utile, qui permet d'obtenir la position d'une chaine dans une autre :

  `strpos($chaine, $aTrouver)`
 */
  $bigString = 'Les sanglots longs des violons de l\'automne blessent mon coeur d\'une langueur monotone.';
  
  $position = strpos($bigString, 'automne');
  echo 'Le mot "automne" se trouve au caractère ' . $position . '<br>';

  /*
  Autre fonction utile, qui permet de récupérer une partie d'une chaine :

  `substr($chaine, $debut, $longueur)`
 */
$bigString = 'Allez viens boire un p\'tit coup à la maison, y a du blanc, y a du rouge du saucisson';
$part = substr($bigString, 60, 12); //string, index, longeur
//y a du rouge

$part = substr($bigString, 60); //si je ne précise pas la longeur, il prend le reste de la phrase
// y a du rouge du saucisson

/*
  La fonction `str_replace($aRemplacer, $nouveauMot, $chaineAModifier)` permet de remplacer une partie de chaine par une autre.
 */
echo str_replace('world', 'Jon', 'Hello world!') . '<br>';
// Affichera "Hello Jon!"

/*
  La fonction `explode($delimiteur, $string)` renvoie un tableau dans lequel sont placé les différents éléments
  de la chaine.
  Exemple :
 */
$bigString = 'Bonjour tonton-stop-bien arrivé-stop-hate de prendre le bateau-stop-en plus-stop-Le Titanic c\'est un joli nom';
$separator = '-stop-';
$arrayOfString = explode($separator, $bigString);

echo '<pre>';
print_r($arrayOfString);
echo '</pre>';
// utile pour récuperer les différents éléments d'une url
$url = 'google.com/monsite/mapage?mavar=toto';
$parts = explode('?', $url);
$var = explode('=', $parts[1]);
echo $parts[0]; // la première partie de l'url
echo '<br>' . $var[1];

// implode fait exactement l'inverse
echo '<ul><li>';
echo implode( '</li><li>', $arrayOfString); //separateur, array
 echo '</li></ul>';
?>