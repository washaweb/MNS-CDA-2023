# Variables externes à PHP

## Formulaires HTML (GET et POST)

Lorsqu'un formulaire est envoyé à un script PHP, toutes les variables du formulaire seront automatiquement disponibles dans le script. Il y a peu de façon pour récupérer ces informations, par exemple :

### Exemple #1 Exemple avec un formulaire simple

```html
<form action="foo.php" method="post">
    Nom  :  <input type="text" name="username" /><br />
    Email: <input type="text" name="email" /><br />
    <input type="submit" name="submit" value="Envoie!" />
</form>
```

Il y a que deux façons d'accéder aux données provenant d'un formulaire HTML. Les méthodes disponible actuellement sont décrites ci-dessous :

### Exemple #2 Accéder simplement à des variables de formulaires POST

```php
echo $_POST['username'];
echo $_REQUEST['username'];
```

Utiliser un formulaire de type `GET` est similaire, hormis le fait que vous deviez utiliser les variables prédéfinies de `GET` à la place. `GET` s'applique aussi à la `QUERY_STRING` (les informations disponibles après le `?` dans une URL). De ce fait, par exemple, `http://www.example.com/test.php?id=3` contient les données de `GET`, qui sont accessibles via $_GET['id']. Voir aussi [$_REQUEST](https://www.php.net/manual/fr/reserved.variables.request.php).

>Note: Les points et les espaces dans les noms de variables sont convertis en underscores.

Par exemple, `<input name="a.b" />` deviendra `$_REQUEST["a_b"]`.

PHP comprend aussi les tableaux dans le contexte des formulaires. (voir aussi la FAQ). Vous pouvez, par exemple, grouper des variables ensemble ou bien utiliser cette fonctionnalité pour lire des valeurs multiples d'un menu déroulant. Par exemple, voici un formulaire qui se poste lui-même des données, et les affiche :

### Exemple #3 Variables de formulaires complexes

```php
if ($_POST) {
    echo '<pre>';
    echo htmlspecialchars(print_r($_POST, true)); //la méthode htmlspecialchars sert à échaper les caractères html dans la variable pour éviter qu'ils ne soient interprétés comme du code au moment de l'affichage
    echo '</pre>';
}
```

```html
<form action="" method="post">
    Name:  <input type="text" name="personal[name]" /><br />
    Email: <input type="text" name="personal[email]" /><br />
    Beer: <br />
    <select multiple name="beer[]">
        <option value="warthog">Warthog</option>
        <option value="guinness">Guinness</option>
        <option value="stuttgarter">Stuttgarter Schwabenbräu</option>
    </select><br />
    <input type="submit" value="Validez moi !" />
</form>
```

> Note: Si le nom d'une variable externe commence par une syntaxe valide pour un tableau, les caractères qui suivent sont silencieusement ignorés.

Par exemple : `<input name="foo[bar]baz">` deviens `$_REQUEST['foo']['bar']`.

## Nom de variables IMAGE de type SUBMIT

Lors de la soumission d'un formulaire, il est possible d'utiliser une image au lieu d'un bouton standard, comme ceci :

```html
<input type="image" src="image.gif" name="sub" />
```

Lorsque l'utilisateur clique sur cette image, le formulaire associé est envoyé au serveur, avec deux données supplémentaires, `sub_x` et `sub_y`. Elles contiennent les coordonnées du clic de l'utilisateur dans l'image. Vous noterez que ces variables sont envoyées par le navigateur avec un point dans leur nom, mais PHP convertit ces points en soulignés.

## Cookies HTTP

Les cookies sont un mécanisme permettant de stocker des données sur la machine cliente à des fins d'identification de l'utilisateur. Vous pouvez établir un cookie grâce à la fonction `setcookie()`. Les cookies font partie intégrante des en-têtes HTTP et donc la fonction `setcookie()` doit être appelée avant que le moindre affichage ne soit envoyé au navigateur. C'est la même restriction que pour la fonction `header()`. Les données contenues dans les cookies sont alors disponibles dans les tableaux de cookies appropriés, comme `$_COOKIE` mais aussi `$_REQUEST`. Lisez la page de la documentation sur la fonction `setcookie()` pour plus de détails ainsi que des exemples.

> Note: Depuis PHP 7.2.34, 7.3.23 et 7.4.11, respectivement, les noms des cookies entrants ne sont plus url-décodés, et ce, pour des raisons de sécurité.

Si vous souhaitez assigner plusieurs valeurs à un seul cookie, vous devez l'assigner sous forme de tableau. Par exemple :

```php
setcookie("MyCookie[foo]", 'Test 1', time()+3600);
setcookie("MyCookie[bar]", 'Test 2', time()+3600);
```

Cela va créer deux cookies distincts bien que MyCookie est maintenant un simple tableau dans votre script. Si vous voulez définir seulement un cookie avec plusieurs valeurs, utilisez la fonction `serialize()` ou `explode()` sur la première valeur.

Il est à noter qu'un cookie remplace le cookie précédent par un cookie de même nom tant que le chemin ou le domaine sont identiques. Donc, pour une application de panier, vous devez implémenter un compteur et l'incrémenter au fur et à mesure. C'est-à-dire :

### Exemple #4 Exemple avec setcookie()

```php
if (isset($_COOKIE['compte'])) {
    $compte = $_COOKIE['compte'] + 1;
} else {
    $compte = 1;
}
setcookie('compte', $compte, time()+3600);
setcookie("Panier[$compte]", $item, time()+3600);
```

### Cas des points dans les noms de variables

Typiquement, PHP ne modifie pas les noms des variables lorsqu'elles sont passées à un script. Cependant, il faut noter que les points (.) ne sont pas autorisés dans les noms de variables PHP. Pour cette raison, jetez un œil sur :

```php
  $varname.ext;  /* nom de variable invalide */
```

Dans ce cas, l'analyseur croit voir la variable nommée `$varname`, suivie par l'opérateur de concaténation, et suivie encore par la chaîne sans guillemets (une chaîne sans guillemets et qui n'a pas de signification particulière). Visiblement, ce n'est pas ce qu'on attendait...

Pour cette raison, il est important de noter que PHP remplacera automatiquement les points des noms de variables entrantes par des soulignés.
