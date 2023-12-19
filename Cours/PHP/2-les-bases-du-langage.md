# Les bases du langage PHP

PHP est un langage de programmation largement utilisé pour le développement web côté serveur. C'est un langage puissant pour le développement web, et il est largement utilisé pour la création de sites web dynamiques, la gestion de bases de données, et bien plus encore. Il existe des framework de développement créés en php comme Sylex, Symfony, Laravel, CodeIgniter, Zend Framework, Cake PHP.

## 1. Balises php

Lorsque PHP traite un fichier, il cherche les balises d'ouverture et de fermeture (`<?php` et `?>`) qui délimitent le code qu'il doit interpréter. De cette manière, cela permet à PHP d'être intégré dans toutes sortes de documents, car tout ce qui se trouve en dehors des balises ouvrantes / fermantes de PHP est ignoré.

PHP inclus une balise ouvrante echo courte `<?=` qui est un raccourci au code plus verbeux `<?php echo`.

### Exemple #1 Balises d'ouvertures et de fermetures PHP

1. `<?php echo 'Si vous voulez intégrez du code PHP dans des documents XHTML ou XML, utilisez ces balises'; ?>`
2. Vous pouvez utiliser la balise courte pour `<?= 'écrire ce texte' ?>`. Est équivalent à `<?php echo 'écrire ce texte' ?>`.
3. `<? echo 'ce code est entre des balises courtes'; ?>` Le code suivant `<?= 'du texte' ?>` est un raccourci pour `<? echo 'du texte' ?>` 

Les balises courtes (troisième exemple) sont disponibles par défaut, mais peuvent être désactivées soit via l'option `short_open_tag` du fichier de configuration `php.ini`, ou sont désactivées par défaut si PHP est compilé avec l'option `--disable-short-tags`.

> Note: Comme les balises courtes peuvent être désactivées il est recommandé de seulement utiliser les balises normales (`<?php ?>` et `<?= ?>`) pour maximiser la compatibilité.

Si un fichier contient seulement du code PHP, il est préférable de ne pas placer la balise de fermeture à la fin du fichier. Ceci permet d'éviter d'oublier un espace ou une nouvelle ligne après la balise de fermeture de PHP, ce qui causerait des effets non voulus car PHP commencera à afficher la sortie, ce qui n'est souvent pas le cas désiré.

```php
<?php
echo "Bonjour le monde !";

// ... encore du code

echo "Dernière instruction";

// le script se termine ici, sans la balise de fermeture PHP
```

### Echappement depuis du code HTML

Tout ce qui se trouve en dehors d'une paire de balises ouvrantes/fermantes est ignoré par l'analyseur PHP, ce qui permet d'avoir des fichiers PHP mixant les contenus. Ceci permet à PHP d'être contenu dans des documents HTML, pour créer par exemple des templates.

```php
<p>Ceci sera ignoré par PHP et affiché au navigateur.</p>
<?php echo 'Alors que ceci sera analysé par PHP.'; ?>
<p>Ceci sera aussi ignoré par PHP et affiché au navigateur.</p>
<?php if ($expression == true) { ?>
  <p>Ceci sera affiché si l'expression est vrai.</p>
<?php } else { ?>
  <p>Sinon, ceci sera affiché.</p>
<?php } ?>
<!-- avec une syntaxe php plus explicite : -->
<?php if ($expression == true): ?>
  <p>Ceci sera affiché si l'expression est vrai.</p>
<?php else: ?>
  <p>Sinon, ceci sera affiché.</p>
<?php endif; ?>
```

> note: pour que le PHP soit interprété comme tel, la page doit se terminé avec un nom de fichier en `.php` ou avec une extension de fichier reconnue par le serveur comme étant du `php`



## 2. les commentaires en PHP

En PHP, les commentaires sont des annotations qui ne sont pas exécutées par l'interpréteur PHP. Ils sont utilisés pour ajouter des explications, des notes, des descriptions et des rappels dans le code source, ce qui rend le code plus lisible et plus compréhensible. 

**Commentaires sur une ou plusieurs ligne(s) :**

```php
// Ceci est un commentaire sur une seule ligne
$variable = 42; // Un autre commentaire

/*
Ceci est un commentaire
sur plusieurs lignes.
*/
$variable = 42;
```

**Commentaires de documentation :**

Les commentaires de documentation sont utilisés pour générer une documentation automatique de votre code à l'aide d'outils tels que PHPDoc. Ils ont un format particulier qui inclut des balises et des descriptions pour documenter les fonctions, les classes, les méthodes, les propriétés, les paramètres, les types de retour, etc.

```php
/**
 * Cette fonction additionne deux nombres.
 *
 * @param int $a Le premier nombre.
 * @param int $b Le deuxième nombre.
 * @return int La somme des deux nombres.
 */
function addition($a, $b) {
    return $a + $b;
}
```

Les commentaires de documentation sont principalement utilisés pour générer une documentation détaillée du code afin que d'autres développeurs (ou vous-même à l'avenir) puissent comprendre rapidement comment utiliser vos fonctions, classes et méthodes.

**Commentaires conditionnels :**

Vous pouvez également utiliser des commentaires conditionnels pour exclure temporairement du code. Par exemple, vous pouvez commenter du code que vous ne voulez pas exécuter sans le supprimer complètement.

```php
/*
if ($condition) {
    // Code à exécuter sous certaines conditions
}
*/
```

Les commentaires conditionnels sont utiles pour le débogage ou pour désactiver temporairement des parties du code.

En utilisant des commentaires de manière appropriée, vous pouvez rendre votre code plus lisible, plus documenté et plus facile à maintenir. Ils sont un outil précieux pour la programmation en PHP.

## 3. Variables en PHP

Les variables en PHP commencent par le signe `$` suivi du nom de la variable. PHP est sensible à la casse, ce qui signifie que les variables `$nom` et `$Nom` sont considérées comme différentes.

Exemple de déclaration de variable et d'affichage de son contenu :

```php
$nom = "Alice";
echo "Bonjour, " . $nom; // Affiche "Bonjour, Alice"
```

## 4. Types de données

PHP prend en charge différents types de données, notamment les chaînes de caractères, les nombres, les tableaux, les booléens, etc.

Exemple de type de données en PHP :

```php
$age = 25; // Nombre entier
$salaire = 5000.50; // Nombre à virgule flottante
$estEtudiant = true; // Booléen
$noms = array("Alice", "Bob", "Charlie"); // Tableau de chaînes de caractères
```

## 5. Opérateurs

PHP prend en charge des opérateurs courants tels que l'addition, la soustraction, la multiplication, la division, etc.

Exemple d'utilisation d'opérateurs en PHP :

```php
$a = 10;
$b = 5;

$addition = $a + $b;
$soustraction = $a - $b;
$multiplication = $a * $b;
$division = $a / $b;

echo "Addition : $addition, Soustraction : $soustraction, Multiplication : $multiplication, Division : $division";
```

## 6. Structures conditionnelles

Les structures conditionnelles permettent d'exécuter du code en fonction de conditions.
Exemple d'utilisation de la structure `if` en PHP :

```php
$age = 18;

if ($age >= 18) {
    echo "Vous êtes majeur.";
} else {
    echo "Vous êtes mineur.";
}
```

## 7. Boucles

Les boucles permettent de répéter des instructions un certain nombre de fois.
Exemple d'utilisation d'une boucle `for` en PHP pour afficher les nombres de 1 à 5 :

```php
for ($i = 1; $i <= 5; $i++) {
    echo $i . " ";
}
```

## 8. Fonctions

Les fonctions permettent de regrouper des instructions dans un bloc réutilisable.
Exemple de déclaration et d'appel de fonction en PHP :

```php
function direBonjour($nom) {
    echo "Bonjour, " . $nom;
}

direBonjour("Alice"); // Appelle la fonction avec le nom "Alice"
```

## 9. Superglobales
 
PHP prend en charge plusieurs superglobales telles que `$_GET`, `$_POST`, `$_SESSION`, `$_COOKIE`, qui sont utilisées pour traiter les données de formulaire, les sessions, etc.

Exemple de récupération de données de formulaire via `$_POST` :

```php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    echo "Bonjour, " . $nom;
}
```

> [Les balises php](https://www.php.net/manual/fr/language.basic-syntax.phptags.php)
> [Echappement depuis du HMTL](https://www.php.net/manual/fr/language.basic-syntax.phpmode.php)
