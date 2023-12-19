# Les tableaux

Les tableaux en PHP sont des structures de données qui vous permettent de stocker et de manipuler des collections de valeurs. Vous pouvez créer des tableaux numérotés (avec des index numériques) ou des tableaux associatifs (avec des index nommés). Voici une explication détaillée de ces concepts :

**Tableaux Numérotés :**

Un tableau numéroté est une liste de valeurs indexées par des entiers commençant à zéro (0) pour le premier élément, puis 1 pour le deuxième, et ainsi de suite. Vous pouvez créer un tableau numéroté en utilisant la fonction `array()` ou en utilisant la notation `[]`.

```php
// Création d'un tableau numéroté
$tableau = array("Pomme", "Banane", "Fraise");

// Accès aux éléments par index
echo $tableau[0]; // "Pomme"
echo $tableau[1]; // "Banane"
echo $tableau[2]; // "Fraise"
```

**Tableaux Associatifs :**

Un tableau associatif est un tableau où les indices sont des noms ou des clés associées à des valeurs. Les indices ne sont pas limités à des entiers, ce qui les rend plus flexibles.

```php
// Création d'un tableau associatif
$personne = array("nom" => "Alice", "âge" => 30, "ville" => "Paris");

// Accès aux éléments par index nommé
echo $personne["nom"]; // "Alice"
echo $personne["âge"]; // 30
echo $personne["ville"]; // "Paris"
```

**Itération sur les Tableaux :**

Pour parcourir les valeurs d'un tableau en PHP, vous pouvez utiliser des boucles comme `foreach` pour les tableaux numérotés ou associatifs. Voici comment itérer sur un tableau numéroté et un tableau associatif :

```php
// Tableau numéroté
$fruits = array("Pomme", "Banane", "Fraise");
foreach ($fruits as $fruit) {
    echo $fruit . " ";
}
// Résultat : "Pomme Banane Fraise "

// Tableau associatif
$personne = array("nom" => "Alice", "âge" => 30, "ville" => "Paris");
foreach ($personne as $cle => $valeur) {
    echo "$cle : $valeur, ";
}
// Résultat : "nom : Alice, âge : 30, ville : Paris, "
```

Voici un exemple d'itération sur un tableau numéroté à l'aide d'une boucle `for` en PHP :

```php
$fruits = array("Pomme", "Banane", "Fraise", "Orange");

// Obtenez la longueur du tableau
$longueur = count($fruits);

// Utilisez une boucle for pour parcourir le tableau
for ($i = 0; $i < $longueur; $i++) {
    echo "Fruit $i : " . $fruits[$i] . "<br>";
}
```

Ici, nous utilisons une boucle `for` pour parcourir un tableau de fruits. La variable `$i` est utilisée comme index pour accéder aux éléments du tableau. La boucle commence à `$i = 0` (le premier index), puis continue tant que `$i` est inférieur à la longueur du tableau (`$i < $longueur`). À chaque itération, le nom du fruit est affiché avec son index correspondant.

Le résultat de cette boucle serait :

```txt
Fruit 0 : Pomme
Fruit 1 : Banane
Fruit 2 : Fraise
Fruit 3 : Orange
```

La boucle `for` est utile lorsque vous connaissez à l'avance le nombre d'itérations que vous souhaitez effectuer, comme dans ce cas où nous itérons sur un tableau avec une longueur déterminée.

**Fonctions de Manipulation de Tableaux :**

PHP propose de nombreuses fonctions pour manipuler les tableaux. Voici quelques-unes des fonctions couramment utilisées :

- `count($tableau)`: Retourne le nombre d'éléments dans le tableau.
- `array_push($tableau, $valeur)`: Ajoute une valeur à la fin du tableau.
- `array_pop($tableau)`: Supprime et retourne la dernière valeur du tableau.
- `array_unshift($tableau, $valeur)`: Ajoute une valeur au début du tableau.
- `array_shift($tableau)`: Supprime et retourne la première valeur du tableau.
- `array_merge($tableau1, $tableau2)`: Fusionne deux tableaux en un seul.
- `array_slice($tableau, $debut, $longueur)`: Extrait un segment du tableau.
- `array_splice($tableau, $debut, $longueur, $remplacement)`: Remplace une portion du tableau par une autre.

Quelques exemples d'utilisation :

```php
$fruits = array("Pomme", "Banane", "Fraise");

// Ajouter un élément à la fin du tableau
array_push($fruits, "Orange");

// Supprimer le premier élément du tableau
array_shift($fruits);

// Fusionner deux tableaux
$autresFruits = array("Cerise", "Raisin");
$fruits = array_merge($fruits, $autresFruits);
```

Les tableaux sont des structures de données polyvalentes en PHP, et leur utilisation est courante dans le développement web. Avec les fonctions de manipulation de tableaux, vous pouvez effectuer diverses opérations pour ajouter, supprimer et modifier des éléments en fonction de vos besoins.
