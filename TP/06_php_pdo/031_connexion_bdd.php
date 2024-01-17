<?php

// PHP propose une classe qui contient tout ce qu'il faut pour faire des requêtes à une base de données.
// https://www.php.net/manual/fr/book.pdo.php

// on stocke les variables de connexion à l'extérieur pour ne pas les exposer
require_once('config.php');

// connexion à la base de donnée

// PDO("mysql:host=localhost;port=8889;dbname=haiku", 'root', 'root');
try {
  $connexion = new PDO("mysql:host=$MYSQL_DBHOST;port=$MYSQL_DBPORT;dbname=$MYSQL_DBNAME", $MYSQL_DBUSER, $MYSQL_DBPASS);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connecté\n";
    
} catch (PDOException $e) {
    // si une erreur se produit, je gère moi-même l'affichage...
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

function print_categories() {
  global $connexion;

  // On execute une query SQL
  $result = $connexion->query('SELECT * FROM categories');

  // var_dump($result->execute()); //permet de voir si la requête va s'exécuter correctement
  // var_dump($result->fetch()); //retourne le résultat que de la première ligne
  // var_dump($result->fetchAll()); //retourne tous les résultats
  
  // si je n'ai pas d'erreur, j'affiche les résultats
  if($result->execute()) {
    echo ('<select id="categories">');
    echo ('<option value="">Choisissez une catégorie</option>');
    foreach ($result->fetchAll() as $row) {
      // <option value="id">categorie</option>
      echo '<option value="'. $row['id'] .'">'. $row['name'] .'</option>';
      // echo $row[0]. " ". $row[1]. "<br>"; //<<select -- on peut aussi utiliser les index pour accéder aux données
    }
    echo ('</select>');
  }
}

print_categories();