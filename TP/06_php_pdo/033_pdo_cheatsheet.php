<?php

/**
 * Créer une connexion à la base de données :
 */

$strConnection = 'mysql:host=localhost;dbname=ma_base_de_donnees';
$pdo = new PDO($strConnection, 'login', 'mot de passe');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES \'UTF8\'');

/**
 * Autre façon d'écrire :
 */

$options = array(
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES \'UTF8\'',
);
$strConnection = 'mysql:host=localhost;dbname=ma_base_de_donnees';
$pdo = new PDO($strConnection, 'login', 'mot de passe', $options);

/**
 *
 *
 * On souhaite envoyer une requête à la base de données.
 * Quelle méthode utiliser ?
 *
 *
 *  +-------------------------------------------------------------------+-------------------------------------------------------+--------------------------------------------------------------------------------+
    |                                                                   |    Requête de création, mise à jour ou suppression    |                              Requête de sélection                              |
    +-------------------------------------------------------------------+-------------------------------------------------------+--------------------------------------------------------------------------------+
    | On utilise pas de données provenant du client (Formulaire, URL..) | $sql = 'MA REQUETE';                                  | $sql = 'MA requete';                                                           |
    |                                                                   | $pdo->exec($sql);                                     | $result = $pdo->query($sql);                                                   |
    |                                                                   |                                                       | $rows = $result->fetchAll(PDO::FETCH_ASSOC);                                   |
    |                                                                   |                                                       | // $rows est alors un tableau multidimensionnel                                |
    |                                                                   |                                                       | // On aurait aussi pu utiliser une boucle :                                    |
    |                                                                   |                                                       | // while($row = $result->fetch(PDO::FETCH_ASSOC)) { echo $row['ma_colonne']; } |
    +-------------------------------------------------------------------+-------------------------------------------------------+--------------------------------------------------------------------------------+
    | On utilise des données provenant d'une source extérieure          | $sql = 'MA REQUETE AVEC :variable1 et/ou :variable2'; | $sql = 'MA REQUETE AVEC :variable1 et/ou :variable2';                          |
    |                                                                   | $stmt = $pdo->prepare($sql);                          | $stmt = $pdo->prepare($sql);                                                   |
    |                                                                   | $stmt->bindParam(':variable1', $superVariable);       | $stmt->bindParam(':variable1', $superVariable);                                |
    |                                                                   | $stmt->bindParam(':variable2', $autreVariable);       | $stmt->bindParam(':variable2', $autreVariable);                                |
    |                                                                   | $stmt->execute();                                     | $stmt->execute();                                                              |
    |                                                                   |                                                       | $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);                                     |
    |                                                                   |                                                       | // $rows est alors un tableau multidimensionnel                                |
    |                                                                   |                                                       | // On aurait aussi pu utiliser une boucle :                                    |
    |                                                                   |                                                       | // while($row = $result->fetch(PDO::FETCH_ASSOC)) { echo $row['ma_colonne']; } |
    +-------------------------------------------------------------------+-------------------------------------------------------+--------------------------------------------------------------------------------+
 *
 * En résumé :
 *
 * Les données proviennent d'une source externe : Requête préparée
 * Sinon, si la requête est une requête de sélection : $pdo->query()
 * Sinon, si la requête ne doit rien retourner : $pdo->exec()
 *
 * Autres fonctions utiles :
 *
 *  $stmt->rowCount()
 *      renvoie le nombre d'enregistrements dans le rowset
 *
 *  $pdo->lastInsertId()
 *      renvoie l'identifiant de la dernière ligne insérée
 *
 *
 *
 * Lier des paramètres, dans une requête préparée :
 *
 * Méthode 1 :
 */

$login = $_POST['login']; // On imagine qu'on vient de recevoir un formulaire

$sql = 'SELECT lastname, firstname FROM users WHERE login = ?';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(1, $login);

$stmt->execute();
$infosUser = $stmt->fetchAll(PDO::FETCH_ASSOC);

/**
 * Méthode 2 :
 */
$login = $_POST['login']; // On imagine qu'on vient de recevoir un formulaire

$sql = 'SELECT lastname, firstname FROM users WHERE login = :userLogin';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':userLogin', $login);

$stmt->execute();
$infosUser = $stmt->fetchAll(PDO::FETCH_ASSOC);


/**
 * Quand on veut utiliser un paramètre numérique, comme un ID, par exemple, il faut utiliser un troisième paramètre
 * avec la fonction $stmt->bindParam :
 */
$id = $_GET['id']; // On imagine qu'on vient d'accéder à la page avec une URL du genre : page.php?id=101
// $id vaut '101'

$sql = 'SELECT lastname, firstname FROM users WHERE id = :userId';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':userId', $id, PDO::PARAM_INT);

$stmt->execute();
$infosUser = $stmt->fetchAll(PDO::FETCH_ASSOC);

/*
 * En utilisant PDO::PARAM_INT, PDO ne rajoutera pas de guillemets autour de l'identifiant.
 * Ce n'est en effet pas nécessaire puisqu'il s'agit d'un chiffre et non d'une chaine de caractères.
 */