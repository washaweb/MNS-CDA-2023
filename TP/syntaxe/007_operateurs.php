<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Opérateurs</title>
</head>

<body>
  <?php

// Opérateurs arithmétiques
// Sert aux opérations mathématiques classiques

$a = 2;
$b = 5;
$c = 7;

// Addition
$resultat = $a + $b;
// 7

 // Multiplication
 $resultat = $a * $b;

 // Division
 $resultat = $b / $a;

 // Soustraction
 $resultat = $b - $a;

//  Modulo
$resulat = $b % $a;
// 5 % 2 = 1
//  sert souvent à trouver les chiffres pairs/impairs

// Il est possible de raccourcir l'écriture de certaines instructions
// Pour écrire
$a = $a + 10;

echo '<br>' . $a; //12
// on peut écrire
$a += 10;
echo '<br>' . $a;//22

// De même pour les autres opérateurs
$a *= 10;
$a -= 10;
$a /= $b;

echo '<br>' . $a; //42

// Il arrive souvent qu'on doive ajouter ou retirer 1 à une valeur inscrite dans une variable
// On appelle cela "incrémenter" ou "décrémenter"
// Dans ce cas, au lieu de
$a = $a +1; // 43
$a +=1; // 44
echo $a++; //<<--- affiche la valeur de $a (44) puis incrémente $a + 1
echo '<br>';
echo ++$a; //<<--- incrémente $a (45+1) et ensuite affiche a (46)
echo '<br>';
// De la même manière avec la soustraction (décrément)
$a--;
--$a;
// au lieu de 
$a = $a - 1;
// ou de 
$a -= 1;

// Opérateurs de concatépnation de string

// quand on veut ajouter plusieurs textes en une phrase

$a = 'Je suis joyeux';
$options = ['mon vélo', 'ma voiture', 'ma moto'];
// ajouter des valeurs à un tableau
$options[3] = 'mon bateau';
$options[] = 'ma trotinette';

// le signe . permet de "coller" plusieurs bouts de phrases :


// pour connaître la longeur du tableau 
$limit = count($options) - 1;

// ici la méthode rand($min, $max) permet de choisir un chiffre aléatoire entre 0 et 2
$rand = rand(0, $limit);


echo $a . ' quand je conduis ' . $options[$rand];

echo '<br>';
?>
</body>

</html>