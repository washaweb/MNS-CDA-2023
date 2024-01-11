# Fonctionnement des Dates en PHP

En PHP, les dates sont gérées principalement par les classes et fonctions de date/heure. La classe `DateTime` est l'une des façons les plus flexibles de travailler avec les dates. Il existe aussi la fonction `date()` et d'autre fonctions comme `strtotime()`, `time()` et `mktime()` (entre autre) pour générer des `timestamp` qui servent à faire des manipulations sur les dates.

## DateTime()

DateTime est une classe avec des propriétés et méthodes consacrées à la gestion, la manipulation et le formatage des dates. C'est un peu un outil tout en un.

**Création d'un objet DateTime**:

```php
  $date = new DateTime(); // crée un objet DateTime pour la date et l'heure actuelles
```

**Formatage des Dates**:
La méthode `format()` est utilisée pour formater l'objet DateTime en une chaîne de caractères selon le format spécifié.

```php
  echo $date->format('Y-m-d H:i:s');
```

**Manipulation des Dates**:

On peut modifier les dates en utilisant des fonctions comme `modify()`.

```php
  $date->modify('+1 day'); // ajoute un jour
```

## UTC

UTC (Temps Universel Coordonné) est la base de temps principale à laquelle le temps dans le monde est réglé. Il remplace le GMT (Greenwich Mean Time) comme standard de temps mondial. L'UTC ne change pas avec un changement de saison. Il est utilisé comme standard pour le commerce, l'aviation, les transmissions, etc.

### Gestion du Décalage Horaire

Les décalages horaires sont gérés en PHP soit en définissant le fuseau horaire lors de la création d'un objet DateTime, soit en utilisant `date_default_timezone_set()` pour définir le fuseau horaire par défaut pour toutes les fonctions de date/heure.

Exemple avec `DateTimeZone` :

```php
  $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
```

Exemple avec `date_default_timezone_set()` :

```php
  date_default_timezone_set('Europe/Paris');
  $date = new DateTime();
```

### Stockage des Dates dans les Bases de Données

Les dates sont généralement stockées dans les bases de données sous forme de chaînes de caractères au format UTC pour éviter les problèmes liés aux fuseaux horaires. Les formats les plus courants sont :

- **Timestamp UNIX** : le nombre de secondes écoulées depuis le 1er janvier 1970 à minuit UTC. C'est un format simple et universel, mais il a des limites en termes de plage de dates.
  
- **ISO 8601 / Format de date SQL** : c'est le format `YYYY-MM-DD HH:MM:SS`, souvent utilisé dans les bases de données SQL. Ce format est facile à lire et comprend la date et l'heure.

### Conversion pour l'Affichage

Lors de l'affichage des dates, convertissez-les dans le fuseau horaire local de l'utilisateur. Cela peut être fait en PHP lors de la récupération des données ou dans la base de données elle-même, selon la technologie utilisée.

Exemple de conversion :

```php
  $date->setTimezone(new DateTimeZone('Europe/Paris'));
  echo $date->format('Y-m-d H:i:s');
```

En résumé, les dates en PHP sont flexibles et peuvent être manipulées et formatées de différentes manières. L'utilisation de l'UTC pour le stockage des dates dans les bases de données est une pratique courante pour éviter les problèmes liés aux fuseaux horaires.

## fonction Date

La méthode `date()` en PHP est utilisée pour formater une date et une heure. Elle est très flexible et permet de formater une date dans presque tous les formats imaginables. Voici quelques exemples d'utilisation :

### La fonction `date()`

Syntaxe de base :

```php
date(string $format, int $timestamp = time()): string
```

- `$format` : la chaîne de formatage de la date.
- `$timestamp` (optionnel) : le timestamp Unix à formater. Par défaut, c'est l'heure actuelle.

Exemples :

```php
echo date("Y-m-d"); // Affiche la date actuelle sous la forme AAAA-MM-JJ
echo date("d/m/Y H:i:s"); // Affiche la date et l'heure actuelle sous la forme JJ/MM/AAAA HH:MM:SS
```

### La fonction `strtotime()`

Cette fonction convertit une description textuelle de date et d'heure en un timestamp Unix.

Exemples :

```php
echo strtotime("now"); // Donne le timestamp actuel
echo strtotime("+1 week"); // Donne le timestamp pour une semaine à partir de maintenant
echo strtotime("next Monday"); // Donne le timestamp pour le prochain lundi
```

### La fonction `time()`

Cette fonction retourne le timestamp Unix actuel.

Exemple :

```php
echo time(); // Affiche le timestamp actuel
```

### Formats de dates

Voici quelques-unes des chaînes de formatage les plus couramment utilisées avec `date()` :

- `Y` : l'année sur 4 chiffres (ex. 2023)
- `m` : le mois sur 2 chiffres (01 à 12)
- `d` : le jour du mois sur 2 chiffres (01 à 31)
- `H` : l'heure au format 24h (00 à 23)
- `i` : les minutes (00 à 59)
- `s` : les secondes (00 à 59)
- `l` (lettre 'L' minuscule) : le jour de la semaine en texte complet (ex. Sunday)

Il existe de nombreux autres formats disponibles, et vous pouvez les combiner pour créer des formats de date et d'heure personnalisés. Pour une liste complète des formats possibles, vous pouvez consulter la documentation officielle de PHP sur le formatage de la date : [Documentation PHP - Fonction date](https://www.php.net/manual/fr/function.date.php).

## Les Timestamp

Un timestamp, ou horodatage en français, est une représentation numérique du point dans le temps. En informatique et en programmation, un timestamp est généralement exprimé comme le nombre de secondes (et parfois de millisecondes) écoulées depuis un point de départ spécifique, connu sous le nom d'« époque ».

### Timestamp Unix

Le timestamp Unix, en particulier, est largement utilisé dans de nombreux systèmes et langages de programmation, dont PHP. Il représente le nombre de secondes écoulées depuis le 1er janvier 1970 à 00:00:00 UTC, sans tenir compte des secondes intercalaires. Ce point de départ est appelé l'« époque Unix ».

Voici quelques caractéristiques clés des timestamps Unix :

1. **Universel** : Comme il est basé sur l'UTC, un timestamp Unix est le même quel que soit le fuseau horaire. Cela en fait un standard pratique pour enregistrer ou comparer des moments dans le temps à travers différents systèmes et emplacements géographiques.

2. **Facile à manipuler** : Les opérations mathématiques (comme l'addition et la soustraction) peuvent être effectuées directement sur les timestamps pour calculer des écarts de temps ou pour ajuster des dates et des heures.

3. **Stockage et transfert** : Ils sont efficaces pour le stockage (ne prenant qu'un espace numérique relativement petit) et sont indépendants du format de date et d'heure, ce qui les rend pratiques pour le transfert de données entre différents systèmes.

### Utilisation en PHP

En PHP, les timestamps sont souvent utilisés pour la manipulation de dates et d'heures. Par exemple :

- La fonction `time()` retourne le timestamp actuel :
  
  ```php
    $now = time(); // Retourne le timestamp actuel
  ```

- La fonction `strtotime()` peut convertir une chaîne de date en timestamp :
  
  ```php
    $timestamp = strtotime("2023-01-01 00:00:00"); // Convertit la date en timestamp
  ```

- Les timestamps peuvent être utilisés pour formater des dates :
  
  ```php
    echo date("Y-m-d H:i:s", $timestamp); // Formate le timestamp en date lisible
  ```

- La fonction `mktime()` est utilisée pour créer un timestamp Unix représentant une date et une heure spécifiques. Cette fonction est particulièrement utile lorsque vous avez besoin de générer un timestamp pour une date et une heure spécifiques, plutôt que d'utiliser le timestamp actuel ou de convertir une chaîne de date existante.

  ```php
    mktime(hour, minute, second, month, day, year);
  ```

  - **hour** : Heure (de 0 à 23).
  - **minute** : Minutes (de 0 à 59).
  - **second** : Secondes (de 0 à 59).
  - **month** : Mois (de 1 à 12).
  - **day** : Jour du mois (de 1 à 31).
  - **year** : Année.
  
  Si les paramètres ne sont pas fournis, la fonction `mktime()` prend les valeurs par défaut de la date et de l'heure actuelles.

#### Exemples d'utilisation de `mktime()`

1. **Créer un Timestamp pour une Date et une Heure Spécifiques**

  Créons un timestamp pour le 1er janvier 2023 à 00:00:00.

  ```php
  $timestamp = mktime(0, 0, 0, 1, 1, 2023);
  echo $timestamp; // Affichera le timestamp pour le 1er janvier 2023 à 00:00:00
  ```

2. **Convertir un Timestamp en Date Lisible**

  Utilisons `date()` avec le timestamp créé par `mktime()`.

  ```php
  echo date("Y-m-d H:i:s", $timestamp); // Convertira le timestamp en format de date lisible
  ```

3. **Calculer un Jour dans le Futur ou le Passé**

  Supposons que vous vouliez savoir la date qu'il sera dans 30 jours.

  ```php
  $futureTimestamp = mktime(0, 0, 0, date("m"), date("d") + 30, date("Y"));
  echo date("Y-m-d", $futureTimestamp); // Affiche la date 30 jours plus tard
  ```

4. **Calculer l'Âge à partir de la Date de Naissance**

  Vous pouvez utiliser `mktime()` pour convertir une date de naissance en timestamp, puis le comparer avec le timestamp actuel pour calculer l'âge.

  ```php
  $birthDate = mktime(0, 0, 0, 5, 10, 1990); // Date de naissance : 10 mai 1990
  $currentDate = time(); // Timestamp actuel
  $age = floor(($currentDate - $birthDate) / (365.25 * 24 * 60 * 60));
  echo "Âge: " . $age; // Affiche l'âge
  ```
