# Portée des variables et inclusions de fichiers

La portée des variables et l'inclusion de fichiers sont des concepts essentiels en PHP pour gérer la visibilité et la réutilisation des variables à travers différents fichiers.

## Portée des Variables

La portée d'une variable en PHP détermine où la variable peut être utilisée dans un script. Il existe trois principales portées de variables en PHP :

1. **Portée Locale :** Les variables déclarées à l'intérieur d'une fonction sont locales à cette fonction. Elles ne sont accessibles que dans cette fonction et ne sont pas visibles en dehors de celle-ci.

```php
function maFonction() {
    $variableLocale = 10;
    echo $variableLocale; // OK, accessible dans la fonction
}

maFonction();
echo $variableLocale; // Erreur, non accessible en dehors de la fonction
```

2. **Portée Globale :** Les variables déclarées à l'extérieur de toutes les fonctions sont globales et peuvent être utilisées dans tout le script.

```php
$variableGlobale = 20;

function maFonction() {
    echo $variableGlobale; // OK, accessible dans la fonction
}

maFonction();
echo $variableGlobale; // OK, accessible en dehors de la fonction
```

3. **Portée Statique :** Les variables statiques sont locales à une fonction, mais elles conservent leur valeur entre les appels successifs de la fonction.

```php
function compteur() {
    static $compteur = 0;
    $compteur++;
    return $compteur;
}

echo compteur(); // 1
echo compteur(); // 2
```

**Inclusion de Fichiers :**

PHP permet d'inclure le contenu d'un fichier dans un autre à l'aide de l'instruction `include` ou `require`. Cela facilite la réutilisation de code d'un fichier à l'autre.

- `include` : Inclut un fichier et continue l'exécution du script même si le fichier inclus est introuvable.
- `require` : Inclut un fichier, mais si le fichier inclus est introuvable, il génère une erreur fatale et arrête l'exécution du script.
- `require_once` : Identique à require, mais php vérifie si le fichier a déjà été inclus. Si plusieurs appels au même fichiers sont fait, il ne sera inclus qu'une seule fois.

Exemple d'inclusion de fichiers :

```php
// Inclusion du fichier "config.php"
include("config.php");

// Inclusion du fichier "fonctions.php"
require("fonctions.php");
require_once("library.php");

// Inclusion du fichier "header.php" conditionnellement
if ($afficherEnTete) {
    include("header.php");
}

// Le contenu des fichiers inclus est maintenant disponible dans ce script.
```

**Portée des Variables Globales à Travers Différents Fichiers :**

Lorsque vous incluez un fichier dans un autre, les variables globales déclarées dans le fichier inclus sont accessibles dans le fichier principal. Cela signifie que les variables globales peuvent être partagées entre différents fichiers inclus. Toutefois, il est recommandé d'utiliser des techniques de gestion des variables globales, telles que les [superglobales](https://www.php.net/manual/fr/language.variables.superglobals) (`$_GLOBALS`, `$_SESSION`, `$_COOKIE`, etc.), ou des [namespace](https://www.php.net/language.namespaces), pour éviter de potentielles collisions de noms de variables entre les fichiers inclus.

**Exemple :**

Supposons que vous ayez deux fichiers : "index.php" et "config.php". Vous pouvez partager des variables globales entre ces fichiers comme ceci :

**index.php :**

```php
$parametreGlobal = "Valeur globale";

include "config.php";

echo $parametreLocal; // "Valeur locale"
echo $parametreGlobal; // "Valeur partagée"
```

**config.php :**

```php
$parametreLocal = "Valeur locale";
$parametreGlobal = "Valeur partagée";
```

N'oubliez pas de gérer attentivement les variables globales pour éviter les problèmes potentiels de portée et de nommage, notamment lors de l'inclusion de plusieurs fichiers dans un projet PHP.

> [superglobales](https://www.php.net/manual/fr/language.variables.superglobals) 
> [namespace](https://www.php.net/language.namespaces)