# Connexion à une base de donnée

Pour réaliser une connexion à une base de données, php dispose d'une classe PDO (PHP Data Objects) qui simplifie vos connexions.

## Connexion à une Base de Données avec PDO

```php
// il est important de capturer les erreurs éventuelles avec un try...catch, de cette manière, s'il y a une erreur, elle sera capturée et remplacer par notre propre gestion des erreur :

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ma_base', 'mon_user', 'mon_mot_de_passe');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connecté\n";
} catch (PDOException $e) {
    // si une erreur se produit, je gère moi-même l'affichage...
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

// une fois qu'on a terminé nos requêtes, on ferme la connexion !
$pdo = null;
```

Ici, remplacez `'localhost'`, `'ma_base'`, `'mon_user'` et `'mon_mot_de_passe'` par vos informations de connexion.

## Préparer et Exécuter une Requête

Les requêtes préparées sont un moyen efficace de protéger votre application contre les injections SQL.

```php
$stmt = $pdo->prepare("SELECT * FROM ma_table WHERE id = :id");
$stmt->execute(['id' => $idRecherche]);
```

Ici, `:id` est un paramètre nommé. Vous pouvez également utiliser des paramètres positionnels en utilisant des points d'interrogation (`?`).

## Récupérer un Total de Lignes

Pour obtenir le nombre total de lignes retournées par une requête :

```php
$nombreDeLignes = $stmt->rowCount();
```

## Récupérer le Contenu d'une Ligne

Pour récupérer une seule ligne :

```php
$ligne = $stmt->fetch(PDO::FETCH_ASSOC);
if ($ligne) {
    // Traiter la ligne
}
```

## Insérer un ou plusieurs contenus avec des requêtes préparées

```php
  $stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
  // on protège toujours l'insertion de nouvelle données avec bindParam
  $stmt->bindParam(':name', $name); //remplace la valeur de :name avec une valeur échapée de la variable $name
  $stmt->bindParam(':value', $value); //remplace la valeur de :value avec une valeur échapée de la variable $value

  // insertion d'une ligne
  $name = 'one';
  $value = 1;
  $stmt->execute();

  // insertion d'une autre ligne avec des valeurs différentes
  $name = 'two';
  $value = 2;
  $stmt->execute();
```

## Récupérer la Totalité des Lignes

Pour récupérer toutes les lignes correspondant à une requête :

```php
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultats as $ligne) {
    // Traiter chaque ligne
}
```

## Bonnes Pratiques

Voici quelques bonnes pratiques à suivre lors de l'utilisation de PDO pour interagir avec une base de données en PHP :

1. **Utiliser des Requêtes Préparées** : Toujours utiliser des requêtes préparées pour protéger votre application contre les injections SQL. Ne jamais insérer directement des variables dans vos requêtes SQL.

2. **Gestion des Erreurs** : Configurer PDO pour qu'il lance des exceptions en cas d'erreur (`PDO::ERRMODE_EXCEPTION`). Cela facilite la détection et le traitement des erreurs.

   ```php
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   ```

3. **Fermeture des Connexions** : Bien que PHP ferme automatiquement la connexion à la base de données à la fin de l'exécution du script, il est recommandé de fermer explicitement votre connexion ou vos statements si vous n'en avez plus besoin.

4. **Données Sensibles** : Ne jamais exposer les détails de connexion à la base de données dans votre code. Utilisez des fichiers de configuration externes ou des variables d'environnement pour stocker ces informations.

5. **Validation des Données** : Toujours valider et/ou nettoyer les données reçues des utilisateurs avant de les utiliser dans vos requêtes.

6. **Utilisation de fetch Modes** : Utiliser les modes de récupération (`fetch modes`) appropriés selon vos besoins. Par exemple, `PDO::FETCH_ASSOC` pour récupérer les résultats sous forme de tableau associatif.

7. **Transactions** : Utiliser des transactions si vous exécutez plusieurs requêtes qui doivent être traitées comme une seule opération unitaire. Cela assure l'intégrité des données.

   ```php
   $pdo->beginTransaction();
   // Exécution des requêtes
   $pdo->commit();
   ```

8. **UTF-8 Encoding** : Pour éviter les problèmes d'encodage, spécifiez l'encodage UTF-8 lors de la connexion à la base de données.

   ```php
   $pdo = new PDO("mysql:host=localhost;dbname=ma_base;charset=utf8", "mon_user", "mon_mot_de_passe");
   ```

En suivant ces pratiques, vous pouvez assurer que votre interaction avec la base de données est sécurisée, efficace et robuste.

- Documentation PDO : https://www.php.net/manual/fr/ref.pdo-mysql.php
- Pas à pas PDO dans la doc PHP: https://www.php.net/manual/fr/intro.pdo.php
- Pour aller plus loin: https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/914293-accedez-aux-donnees-en-php-avec-pdo

