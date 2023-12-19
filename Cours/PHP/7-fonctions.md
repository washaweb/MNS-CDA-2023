# Les fonctions

Les fonctions sont des blocs de code réutilisables qui effectuent une tâche spécifique lorsque vous les appelez. Les fonctions sont essentielles pour organiser et structurer votre code, le rendre plus lisible et éviter la répétition.

## Définition d'une fonction

Pour définir une fonction en PHP, utilisez le mot-clé `function`, suivi du nom de la fonction et des paramètres entre parenthèses, puis du code à exécuter entre des accolades.

```php
function direBonjour($nom) {
    echo "Bonjour, $nom !";
}
```

Dans cet exemple, nous avons défini une fonction nommée `direBonjour` qui prend un paramètre `$nom` et affiche un message de salutation avec ce nom.

## *Appel d'une fonction

Pour appeler une fonction, utilisez simplement son nom suivi des valeurs des paramètres entre parenthèses, le cas échéant.

```php
direBonjour("Alice");
```

En appelant la fonction `direBonjour` avec le nom "Alice" comme argument, le message "Bonjour, Alice !" sera affiché.

## Valeur de retour

Une fonction en PHP peut également renvoyer une valeur à l'endroit où elle est appelée à l'aide du mot-clé `return`.

```php
function addition($a, $b) {
    return $a + $b;
}

$resultat = addition(5, 3); // $resultat contiendra 8

echo $resultat;
// -> 8
```

Dans cet exemple, la fonction `addition` prend deux paramètres, effectue une addition, puis renvoie le résultat. Lorsque la fonction est appelée avec les arguments 5 et 3, le résultat est stocké dans la variable `$resultat`.

## Portée des variables

Les variables déclarées à l'intérieur d'une fonction sont généralement locales à cette fonction, ce qui signifie qu'elles ne sont accessibles que dans cette fonction. Les variables déclarées à l'extérieur des fonctions sont globales et peuvent être utilisées dans l'ensemble du script.

## Fonctions prédéfinies (ou fonctions internes)

PHP offre un grand nombre de fonctions prédéfinies pour effectuer des opérations courantes, telles que la manipulation de chaînes, la gestion de fichiers, la gestion des dates, etc. Vous pouvez consulter la documentation PHP pour connaître la liste complète de ces fonctions.

Voici un exemple d'utilisation d'une fonction prédéfinie pour obtenir la longueur d'une chaîne :

```php
$chaine = "Hello, world!";
$longueur = strlen($chaine); // Utilisation de la fonction prédéfinie strlen
echo "La longueur de la chaîne est $longueur.";
```

Les fonctions sont un élément fondamental de la programmation en PHP, vous permettant d'organiser votre code de manière modulaire et de réutiliser des morceaux de code, ce qui améliore la lisibilité et la maintenance de votre application.

> [Fonctions internes](https://www.php.net/manual/fr/functions.internal.php)


## Fonctions récursives

Il est possible d'appeler des fonctions récursives en PHP. C'est à dire une fonction qui s'appelle elle-même :

```php
function recursion($a)
{
    if ($a < 20) {
        echo "$a\n";
        recursion($a + 1);
    }
}
```

> Note: Les appels de méthodes/fonctions récursives avec 100-200 degrés de récursivité peuvent remplir la pile et ainsi, terminer le script courant. À noter qu'une récursion infinie est considérée comme une erreur de programmation.


## Les arguments d'une fonction

Des informations peuvent être passées à une fonction en utilisant une liste d'arguments, dont chaque expression est séparée par une virgule. Les arguments seront évalués depuis la gauche vers la droite, avant que la fonction soit actuellement appelée (évaluation immédiate).

```php
function faireBeaucoupDeChose(
    $first_arg,
    $second_arg,
    $a_very_long_argument_name,
    $arg_with_default = 5,
    $again = 'a default string', // Cette virgule trainant n'était pas permit avant 8.0.0.
)
{
    // ...
}
```

### arguments par valeurs et par références

Par défaut, les arguments sont passés à la fonction par valeur (aussi, changer la valeur d'un argument dans la fonction ne change pas sa valeur à l'extérieur de la fonction). Si vous voulez que vos fonctions puissent changer la valeur des arguments, vous devez passer ces arguments par référence.

Si vous voulez qu'un argument soit toujours passé par référence, vous pouvez ajouter un '&' devant l'argument dans la déclaration de la fonction :

```php
function add_some_extra(&$string)
{
    $string .= ', et un peu plus.';
}
$str = 'Ceci est une chaîne';
add_some_extra($str);
echo $str;

// Affiche : 'Ceci est une chaîne, et un peu plus.'

```

### arguments avec valeur par défaut

ne fonction peut définir des valeurs par défaut pour les arguments en utilisant une syntaxe similaire à l'affectation d'une variable. La valeur par défaut n'est utilisée que lorsque le paramètre n'est pas spécifié ; en particulier, notez que le passage de null n'assigne pas la valeur par défaut.

```php
function servir_cafe ($type = "cappuccino")
{
    return "Servir un $type.\n";
}
echo servir_cafe();
echo servir_cafe(null);
echo servir_cafe("espresso");
```

L'exemple ci-dessus va afficher :

```txt
Servir un cappuccino.
Servir un .
Servir un espresso.
```

> à noter que les arguments sans valeur par défaut doivent être placés en premiers

```php
function foo($a = [], $b) {} // Par défaut, non utilisé ; obsolète à partir de PHP 8.0.0.
function foo($a, $b) {} // Fonctionnement équivalent, pas de notice d’obsolescence
function bar(A $a = null, $b) {} // Toujours autorisé ; $a est obligatoire mais nullable.
function bar(?A $a, $b) {} // Recommandé
```

### Utilisation de ... pour accéder aux arguments variables

PHP supporte les arguments à nombre variable dans les fonctions défini par l'utilisateur en utilisant le token ....


```php
function sum(...$numbers) {
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum(1, 2, 3, 4);
// affiche 10
```
