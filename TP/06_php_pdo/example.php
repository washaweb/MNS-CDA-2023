<?php 
// on stocke les variables de connexion à l'extérieur pour ne pas les exposer
require_once('config.php');

// connexion à la base de donnée
try {
  $pdo = new PDO("mysql:host=$MYSQL_DBHOST;port=$MYSQL_DBPORT;dbname=$MYSQL_DBNAME", $MYSQL_DBUSER, $MYSQL_DBPASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // si une erreur se produit, je gère moi-même l'affichage...
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

//ensuite je peux utiliser $pdo
//pour exécuter directement une requete SQL :
echo $pdo->exec('DELETE FROM haikus WHERE id=12;'); //retourne le nombre de lignes affectées

// pour éxécuter une query (SELECT), puis fair le fetch()
// fetch récupère un seul élément
$stmt = $pdo->query('SELECT * FROM haikus WHERE id=13;');
$result = $stmt->fetch(PDO::FETCH_ASSOC); // retourne la première ligne de la requête, sous la forme d'un tableau associatif
echo '<pre>';
print_r($result);
echo '</pre>';
echo '<hr>';


// fetchALl récupère toutes les lignes
$stmt = $pdo->query('SELECT * FROM haikus WHERE category_id=1;');
$results = $stmt->fetchAll(PDO::FETCH_ASSOC); // retourne toutes les lignes de la requête, sous la forme d'un tableau associatif
echo '<pre>';
echo print_r($results);
// pour utiliser le format JSON:
// echo json_encode($results);
echo '</pre>';