<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Isset et Empty</title>
</head>

<body>
  <?php 
  /*
  La fonction isset() permet de savoir si une variable, passée en paramètre, a été initialisée.
 */
$a;
$b;

$b = 'Toto';

$aSet = isset($a); // bool(false)
$bSet = isset($b); // bool(true)

var_dump($aSet);
echo '<br>';
var_dump($bSet);

/*
  Tres pratique, dans une conditionnelle, avant de procéder à des opérations sur une variable :
 */
$a = 2;
$b;

if (isset($a) && isset($b)) {
    echo $a + $b;
} else {
    echo 'Une des deux variables n\'a pas été initialisée';
}


/*
    Dans la même gamme que la fonction `isset`, la fonction `empty` est très utile pour vérifier le contenu d'une variable.

    La fonction `empty($variable)` renverra TRUE si la variable passée en paramètre est "vide", c'est à dire déclarée, mais non initialisée, ou encore initialisée à une valeur nulle (0, chaine vide, false, null..)

    cf http://php.net/manual/fr/function.empty.php
 */
  $a;
  if (empty($a)) // TRUE
      echo '$a est vide<br>';
  else
      echo '$a n\'est pas vide<br>';

  $b = 'Valeur';

  if (empty($b)) // FALSE
  echo '$b est vide<br>';
else
  echo '$b n\'est pas vide<br>';

?>
</body>

</html>