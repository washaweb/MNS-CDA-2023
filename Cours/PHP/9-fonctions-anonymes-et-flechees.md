# Fonction anonyme et fonction flechée

## Fonction anonyme

Les fonctions anonymes, aussi appelées fermetures ou closures permettent la création de fonctions sans préciser leur nom. Elles sont particulièrement utiles comme fonctions de rappel callable, mais leur utilisation n'est pas limitée à ce seul usage.

Les fonctions anonymes sont implémentées en utilisant la classe Closure.

### Exemple #1 Exemples avec des fonctions anonymes

```php
echo preg_replace_callback('~-([a-z])~', function ($match) {
    return strtoupper($match[1]);
}, 'bonjour-le-monde');
```

Les fonctions anonymes peuvent aussi être utilisées comme valeurs de variables. PHP va automatiquement convertir ces expressions en objets Closure. Assigner une fermeture à une variable est la même chose qu'une affectation classique, y compris pour le point-virgule final.

### Exemple #2 Assignation de fonction anonyme à une variable

```php
$greet = function($name) {
    printf("Bonjour %s\r\n", $name);
};

$greet('World');
$greet('PHP');
```

Les fonctions anonymes peuvent hériter des variables du contexte de leur parent. Ces variables doivent alors être passées dans la construction de langage use. À partir de PHP 7.1, ces variables ne doivent pas inclure de superglobals, $this, ou des variables ayant le même nom qu'un paramètre. Une déclaration de type de retour pour la fonction doit être placé après la clause use.

## Fonction fléchée

Les fonctions fléchées ont été introduites en PHP 7.4 en tant que syntaxe plus concise pour les fonctions anonymes. Les fonctions anonymes comme les fonctions fléchées sont implémentées en utilisant la classe Closure.

Les fonctions fléchées ont la forme basique `fn (argument_list) => expr`.

Les fonctions fléchées supportent les mêmes fonctionnalités que les fonctions anonymes, à l'exception que l'utilisation des variables de la portée parente est automatique.

Quand une variable utilisée dans l'expression est définie dans la portée parente, elle sera implicitement capturée par valeur. Dans l'exemple suivant, les fonctions $fn1 et $fn2 se comportent de façon identique.

### Exemple #1 Les fonctions fléchées capturent les variables par valeur automatiquement

```php
$y = 1;
 
$fn1 = fn($x) => $x + $y;
// equivalent to using $y by value:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};
// var_export():  Retourne le code PHP utilisé pour générer une variable
var_export($fn1(3));
// L'exemple ci-dessus va afficher : 4
```

Ceci fonctionne aussi si les fonctions fléchées sont imbriquées :

### Exemple #2 Les fonctions fléchées capturent les variables par valeur automatiquement, même imbriquées

```php
$z = 1;
$fn = fn($x) => fn($y) => $x * $y + $z;
// Outputs 51
var_export($fn(5)(10));
```

Similairement aux fonctions anonymes, la syntaxe des fonctions fléchées permet les signatures de fonction arbitraire, ceci inclus les types de paramètres et de retour, valeur par défaut, variable, aussi bien que le passage et retour par référence. Tous les exemples suivants sont des fonctions fléchées valides :

### Exemple #3 Exemples de fonctions fléchées

```php
fn(array $x) => $x;
static fn(): int => $x;
fn($x = 42) => $x;
fn(&$x) => $x;
fn&($x) => $x;
fn($x, ...$rest) => $rest;

```

Les fonctions fléchées lie les variables par valeur. Ceci est à peu près équivalent à effectuer un use($x) pour chaque variable $x utilisée à l'intérieur de la fonction fléchée. Un liage par valeur signifie qu'il n'est pas possible de modifier une valeur de la portée extérieure. Les fonctions anonymes peuvent être utilisées à la place pour des liaisons par référence.

### Exemple #4 Valeurs de la portée extérieure ne peuvent pas être modifiées par les fonctions fléchées

```php
$x = 1;
$fn = fn() => $x++; // N'a aucun effet
$fn();
var_export($x);  // Outputs 1
```
