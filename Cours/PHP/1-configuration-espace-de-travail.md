# Configurer son espace de travail

XAMPP (ou MAMP, WAMP, LAMP, selon votre système d'exploitation) est un ensemble d'outils open-source qui permet de configurer un environnement de développement local pour le développement de sites web en PHP. Voici comment configurer XAMPP pour créer des sites en PHP sur votre ordinateur :

## 1. Télécharger et Installer XAMPP :

1. Rendez-vous sur le site officiel de XAMPP : https://www.apachefriends.org/index.html.
2. Téléchargez la version de XAMPP compatible avec votre système d'exploitation (Windows, macOS, Linux).
3. Suivez les instructions d'installation pour installer XAMPP sur votre ordinateur. Pendant l'installation, vous pouvez choisir les composants à installer, mais généralement, Apache (un serveur web), MySQL (une base de données), PHP (le langage de script), et phpMyAdmin (une interface pour gérer MySQL) sont inclus.

## 2. Démarrer les Services :

Après avoir installé XAMPP, lancez l'application XAMPP Control Panel. Vous verrez une liste des services tels qu'Apache et MySQL. Cliquez sur le bouton "Start" à côté de chaque service pour les démarrer. Vous pouvez également les configurer pour qu'ils se lancent automatiquement au démarrage de votre ordinateur.

## 4. Créer un Répertoire de Travail

Créez un répertoire (dossier) dans lequel vous stockerez vos fichiers PHP et sites web. Par exemple, vous pouvez créer un dossier nommé "htdocs" dans le répertoire d'installation de XAMPP, généralement situé dans "C:\xampp\htdocs" sur Windows, "/Applications/XAMPP/htdocs" sur macOS, ou "/opt/lampp/htdocs" sur Linux.

Sur mac, il est indispensable de modifier le dossier racine servi par le serveur, car par défaut, il est configuré dans le dossier application du Mac, qui nécessite des autorisations spéciales et qui pourront posser problème pour la suite de vos futurs développements. Il est donc nécessaire de modifier celui-ci dans la configuration d'apache :

- Ouvrir le fichier suivant `/Applications/XAMPP/xamppfiles/etc/httpd.conf`
- Rechercher le `DocumentRoot`

```sh
DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs"
<Directory "/Applications/XAMPP/xamppfiles/htdocs">
```

Il faut modifier pour le dossier Sites de votre dossier utilisateur, dans l'exemple ci-dessous, remplacer `<votreutilisateur>` par le nom de votre dossier utilisateur: 

```sh
DocumentRoot "/Users/<votreutilisateur>/Sites"
<Directory "/Users/<votreutilisateur>/Sites">
```

> Attention on ne change pas le ServerRoot !!

## 5. Créer un Site Web en PHP

Maintenant, vous pouvez créer des fichiers PHP dans le répertoire "htdocs" que vous venez de créer. Par exemple, créez un fichier "index.php" avec le code suivant :

```php
<!DOCTYPE html>
<html>
<head>
    <title>Mon Site PHP</title>
</head>
<body>
    <h1>Bienvenue sur mon site PHP !</h1>
    <?php
    echo "Bonjour, monde !";
    ?>
</body>
</html>
```

Le code PHP s'execute dans une page HTML, à l'aide d'une balise de code ouvrante `<?php` et fermante `?>`.
Tout le code à l'intérieur de ces balises sera interprété par le programme php du serveur.
Il est donc primordial de bien travailler dans un environnement serveur qui execute Apache, PHP et MySQL, sans quoi le code ne serait pas interprété.

## 6. Accéder à Votre Site Localement

Ouvrez un navigateur web et entrez l'URL `http://localhost/nom-du-dossier/index.php`, où "nom-du-dossier" est le nom du répertoire où vous avez placé votre fichier "index.php". Vous devriez voir votre site PHP localement.

## 7. Gérer la Base de Données

Si votre site PHP nécessite une base de données, vous pouvez utiliser phpMyAdmin pour créer et gérer des bases de données MySQL. Accédez à phpMyAdmin en entrant l'URL `http://localhost/phpmyadmin` dans votre navigateur.

C'est ainsi que vous pouvez configurer un environnement de développement local avec XAMPP pour créer et tester des sites en PHP. Vous pouvez ensuite développer, tester et déboguer vos sites web en toute sécurité sur votre ordinateur avant de les déployer sur un serveur en ligne.

## Ressources et documentation

> Documentation officielle sur [php.net](https://www.php.net/manual/fr/)
> [PHP The Right Way](https://phptherightway.com/)
