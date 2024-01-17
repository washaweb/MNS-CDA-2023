<?php
//ENSEMBLE DE FONCTIONS QUI PERMETTENT DE SE CONNECTER AU SERVEUR MYSQL ET RÉCUPÉRER LES DONNEES, INSÉRER DES LIGNES ET SUPPRIMER DES LIGNES DANS LA BASE DE DE DONNEES

// PHP propose une classe qui contient tout ce qu'il faut pour faire des requêtes à une base de données.
// https://www.php.net/manual/fr/book.pdo.php

// on stocke les variables de connexion à l'extérieur pour ne pas les exposer
require_once('config.php');

// instantiation de variables pour l'affichage des erreurs
$error = false;
$errorMessages = [];


// connexion à la base de donnée
try {
  $pdo = new PDO("mysql:host=$MYSQL_DBHOST;port=$MYSQL_DBPORT;dbname=$MYSQL_DBNAME", $MYSQL_DBUSER, $MYSQL_DBPASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connecté\n";  
} catch (PDOException $e) {
    // si une erreur se produit, je gère moi-même l'affichage...
    $error = true;
    $errorMessages[] = "Erreur de connexion : " . $e->getMessage();
    exit();
}


/**
 * AJOUT d'un haiku dans la base de données
 * @param string $content le contenu du haiku
 * @param int $category_id la catégorie du haiku
 * @return bool true si l'ajout s'est bien passée, false sinon
 */
function add_haiku($content, $category_id) {
  global $pdo, $error, $errorMessages;

  // Filtrer et valider category_id
  $category_id = filter_var($category_id, FILTER_VALIDATE_INT);

  if (!$category_id) {
    $error = true;
    $errorMessages[] = 'Category ID invalide';
    return false; //on retourne false car il y a eu une erreur
  }
  if (!$content) {
    $error = true;
    $errorMessages[] = 'Vous n\'avez pas saisi de contenu';
    return false; //on retourne false car il y a eu une erreur, return arrête le traitement du reste de la fonction
  }

  // Préparation de la requête
  $stmt = $pdo->prepare("INSERT INTO haikus (category_id, content) VALUES (:category_id, :content)");

  // Liaison des paramètres
  $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT); //type INT
  $stmt->bindParam(':content', $content, PDO::PARAM_STR); //type STRING

  try {
      $stmt->execute();
      return true;
  } catch (PDOException $e) {
      $error = true;
      $errorMessages[] = "Erreur lors de l'insertion : " . $e->getMessage();
      return false;
  }
}


/**
 * SUPPRESSION d'un haiku de la base de données en fonction de son id
 * @param int $id l'identifiant de la ligne à supprimer
 * @return bool true si la suppression s'est bien passée, false sinon
 */
function delete_haiku($id) {
  global $pdo, $error, $errorMessages;

  // Filtrer et valider id
  $id = filter_var($id, FILTER_VALIDATE_INT);
  
  if (!$id) {
    $error = true;
    $errorMessages[] = 'l’ID est manquant';
    return false; //on retourne false car il y a eu une erreur
  }
    // SELECT AVEC DES PARAMETRES DYNAMIQUES
	$stmt = $pdo->prepare("DELETE FROM haikus WHERE id = :id");
	// Associer des valeurs aux placeholders
  // ici on précise le type de données des paramètres, en l'occurence un entier (un peu comme on ferait un filter_var() )
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	
  // Compiler et exécuter la requête
  try {
  $stmt->execute();
    return true;
  } catch (PDOException $e) {
    $error = true;
    $errorMessages[] = "Erreur lors de la suppression : " . $e->getMessage();
    return false;
  }
}


/**
 * RÉCUPÈRE un haiku dans la base de données
 * @param int $id du haiku
 * @return array un tableau contenant le haiku de type ['id' => int, 'category_id' => int, 'content' => string]
 */
function get_haiku($id) {
  global $pdo, $error, $errorMessages;

  // Filtrer et valider id
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if ($id === false) {
      die('ID invalide');
  }

  // Préparation de la requête
  $stmt = $pdo->prepare("SELECT * FROM haikus WHERE ID = :id");

  // Liaison des paramètres
  $stmt->bindParam(':id', $id, PDO::PARAM_INT); //type INT

  try {
      $stmt->execute();
      return $stmt->fetch();
  } catch (PDOException $e) {
    $error = true;
    $errorMessages[] = "Erreur lors de la requête : " . $e->getMessage();
    return false;
  }
}


/**
 * RÉCUPÈRE UNE LISTE de tous les haikus par un mot clé recherché dans le content du haiku
 * @param str $search le(s) mot(s)-clé(s) recherché(s)
 * @return array|boolean un tableau contenant la liste des haikus de type [ 0 => ['id' => int, 'category_id' => int, 'content' => string], 1 => ['id' => int, 'category_id' => int, 'content' => string],...] ou false si aucun résultat
 */
function get_haikus_by_keyword($search) {
  global $pdo, $error, $errorMessages;

  // Filtrer et valider search
  $search = htmlspecialchars($search);

  if (!$search) {
    $error = true;
    $errorMessages[] = 'Aucun mot clé saisi';
    return; //on quitte la fonction sans terminer le programme
  }

  // Préparation de la requête search
  $stmt = $pdo->prepare("SELECT * FROM haikus WHERE content LIKE %:search%");

  // Liaison des paramètres
  $stmt->bindParam(':search', $search, PDO::PARAM_STR); //type String

  try {
    $stmt->execute();
    return $stmt->fetchAll(); //retourne un tableau contenant tous les résultats
  } catch (PDOException $e) {
    $error = true;
    $errorMessages[] = "Erreur lors de la requête : " . $e->getMessage();
    return false;  
  }
}


/**
 * RÉCUPÈRE UNE LISTE de tous les haikus de la base de données en fonction de leur id de catégorie
 * @param int $category_id du haiku
 * @return array|boolean un tableau contenant la liste des haikus de type [ 0 => ['id' => int, 'category_id' => int, 'content' => string], 1 => ['id' => int, 'category_id' => int, 'content' => string],...] ou false si aucun résultat
 */
function get_haikus_by_category($category_id) {
  global $pdo, $error, $errorMessages;

  // Filtrer et valider category_id
  $category_id = filter_var($category_id, FILTER_VALIDATE_INT);

  if ($category_id === false) {
    $error = true;
    $errorMessages[] = 'ID invalide';
    return; //on quitte la fonction sans terminer le programme
  }

  // Préparation de la requête
  $stmt = $pdo->prepare("SELECT * FROM haikus WHERE category_id = :category_id");

  // Liaison des paramètres
  $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT); //type INT

  try {
      $stmt->execute();
      return $stmt->fetchAll(); //retourne un tableau contenant tous les résultats
  } catch (PDOException $e) {
      $error = true;
      $errorMessages[] = "Erreur lors de la requête : " . $e->getMessage();
      return false;
  }
}



/**
 * Récupère les catégories de la base de données et génère un champ de formulaire HTML <select> avec les catégories
 * @param string $name le name/id du champ de formulaire HTML <select>, par défaut id="categories"
 * @param int $selected l'id de la catégorie pré-selectionnée
 * @return string le code HTML du champ de formulaire <select>
 */
function html_categories($name = 'category_id', $selected = NULL) {
  global $pdo, $error, $errorMessages;

  // On execute une query SQL
  $result = $pdo->query('SELECT * FROM categories');
  
  // si je n'ai pas d'erreur, j'affiche les résultats
  if($result->execute()) {
    echo ('<select class="form-select" name="'.$name.'" id="'.$name.'">');
    echo ('<option value="">Choisissez une catégorie</option>');
    foreach ($result->fetchAll() as $row) {
      // <option value="id">categorie</option>
      echo '<option' . ($selected == $row['id'] ? ' selected="selected"' : '') .' value="'. $row['id'] .'">'. $row['name'] .'</option>';
      // echo $row[0]. " ". $row[1]. "<br>"; //<<select -- on peut aussi utiliser les index pour accéder aux données
    }
    echo ('</select>');
  } else {
    $error = true;
    $errorMessages[] = "Erreur lors de la requête : " . $e->getMessage();
    return '<select class="form-select" id="'.$selectid.'"><option value="">Aucune catégorie...</option></select>'; //ici on retourne un select vide
  }
}