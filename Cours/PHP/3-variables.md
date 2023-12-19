# Les variables

En PHP, il existe plusieurs types de variables qui vous permettent de stocker différentes sortes de données. Voici les types de variables les plus courants en PHP, avec leur définition et un exemple de code pour chaque type :

## 1. null

Le type null est le type unité de PHP, c'est-à-dire qu'il n'a qu'une seule valeur: null.
Les variables non définies et les variables `unset()` auront la valeur `null`, c'est à dire sans valeur.

```php
$var = NULL;
```

## 2. Entiers (Integer)

Les entiers sont des nombres entiers sans décimales, positifs ou négatifs.

**Exemple :**

```php
$age = 25;
$temps = 0;
$taxes = -100;
```

## 3. Nombres à virgule flottante (Float)

Les nombres à virgule flottante sont des nombres décimaux, positifs ou négatifs.

**Exemple :**

```php
$prix = 49.99;
$duree = -12.04;
```

## 4. Chaînes de caractères (String)

Les chaînes de caractères sont utilisées pour stocker du texte.

**Exemple :**

```php
$nom = "Alice";
```

Il est possible de concaténer du texte et des variables avec l'opérateur `.` :

```php
$prenom = "John";
$nom = "Doe";

echo 'Bonjour ' . $prenom . ' ' . $nom;
//Affiche Bonjour John Doe.
```

## 5. Booléens (Boolean)

Les booléens représentent des valeurs vraies (true) ou fausses (false).

**Exemple :**

```php
$estMajeur = true;
```

## 6. Tableaux (Array)

Les tableaux permettent de stocker plusieurs valeurs dans une seule variable.

**Exemple :**

```php
$ex1 = array("Alice", "Bob", "Charlie");

//on peut aussi utiliser la syntaxe courte :
$ex2 = ["Alice", "Bob", "Charlie"];
// et aussi utiliser des indexs nommés :
$ex3 = [
    "nom" => "Alice",
    "epoux" => "Bob",
    "enfant" => "Charlie"
];

// on utilise var_dump pour afficher le resultat dans le cadre d'un débuggage:
var_dump($ex3);

```

L'exemple ci-dessus va afficher :

```txt
array(3) {
  [nom]=>
  string(5) "Alice"
  [epoux]=>
  string(3) "Bob"
  [enfant]=>
  string(7) "Charlie"
}
```

## 7. Objets (Object)

Les objets sont des instances de classes qui regroupent des données et des méthodes.

**Exemple :**

```php
class Personne {
    public $nom;
    public $age;
}

$personne1 = new Personne();
$personne1->nom = "Alice";
$personne1->age = 25;
```

### Convertir une variable en objet

Si un objet est converti en un objet, il ne sera pas modifié. Si une valeur de n'importe quel type est convertie en un objet, une nouvelle instance de la classe interne stdClass sera créée.

- Si la valeur est `null`, la nouvelle instance sera vide.
- Pour un `array` se convertit en object avec les propriétés nommées au regard des clés avec leurs valeurs correspondantes. (Notez que dans ce cas, avant php 7.2.0 les clés numériques ont été inaccessibles à moins d'être itérées).

```php
$obj = (object) array('1' => 'foo');
var_dump(isset($obj->{'1'})); // affiche 'bool(true)' depuis PHP 7.2.0; 'bool(false)' auparavant
var_dump(key($obj)); // affiche 'string(1) "1"' depuis PHP 7.2.0; 'int(1)' auparavant
```

- Pour n'importe quel autre type que Array, un membre appelé scalar contiendra la valeur.

```php
$obj = (object) 'ciao';
echo $obj->scalar;  // Affiche : 'ciao'
```

## 8. Ressources (Resource)

Les ressources sont utilisées pour représenter des ressources externes, comme les connexions de base de données.

**Exemple :** Les ressources sont généralement créées lors de l'ouverture de fichiers, de connexions de base de données, etc.

## 9. Variables Superglobales

Les variables superglobales sont des tableaux associatifs prédéfinis qui stockent des informations sur le serveur, les sessions, les cookies, etc.
**Exemple :** Les superglobales incluent `$_GET`, `$_POST`, `$_SESSION`, `$_COOKIE`, `$_SERVER`, etc.

## 10. Variables de Type Mixte

Les variables en PHP peuvent contenir différents types de données. Elles sont dynamiquement typées, ce qui signifie que vous pouvez changer le type d'une variable en cours d'exécution.

**Exemple :**

```php
$variable = 42; // Un entier
$variable = "Bonjour"; // Une chaîne de caractères
```

Ces types de variables vous permettent de stocker et de manipuler une grande variété de données dans vos scripts PHP. Vous pouvez utiliser ces variables pour effectuer des opérations, prendre des décisions conditionnelles, créer des boucles, et interagir avec des bases de données, des fichiers, et bien plus encore.

En PHP, les noms de variables suivent certaines conventions et bonnes pratiques pour rendre votre code plus lisible, compréhensible et maintenable. Voici quelques recommandations pour nommer vos variables, ainsi que des informations sur les noms de variables protégées.

## 11. variable de type Constante

Il est possible de définire des constante en PHP, ce sont des variables qui ne peuvent pas être redéfinie au cours du temps. On utilise le mot-clé `define()` pour nommer ces variable et leur donner une valeur.

```php
define("SEPARATEUR", '-'); //ici on définit une variable constante SEPARATEUR qui aura la valeur '-'
// Par convention les constantes sont déclarées en MAJUSCULE

echo 'mon texte '. SEPARATEUR . ' avec un séparateur.';

//affiche : mon texte - avec un séparateur.
```

## Conventions pour les noms de variables

1. **Noms significatifs :** Donnez des noms de variables qui décrivent clairement leur but ou leur contenu. Les noms de variables doivent être des mots en minuscules et des mots composés séparés par des underscores pour plus de lisibilité. Par exemple : `$nom_utilisateur`, `$total_commande`, `$liste_articles`.

2. **Soyez explicite :** Évitez d'utiliser des noms de variables trop courts (comme `$x`, `$y`, `$temp`) à moins qu'ils ne soient utilisés dans un contexte spécifique où leur signification est évidente. Utilisez des noms qui décrivent clairement ce que la variable représente.

3. **Utilisez des noms en anglais :** Pour une meilleure compatibilité avec d'autres développeurs et la communauté en général, il est recommandé d'utiliser des noms de variables en anglais.

4. **Évitez les noms de variables réservés :** N'utilisez pas des mots réservés par PHP, tels que `if`, `else`, `while`, `class`, etc., comme noms de variables. Consultez la documentation PHP pour obtenir une liste complète des mots réservés.

5. **Évitez les caractères spéciaux :** Les noms de variables ne doivent pas contenir de caractères spéciaux, à l'exception du trait de soulignement `_`. Les noms de variables ne peuvent pas commencer par un chiffre.
