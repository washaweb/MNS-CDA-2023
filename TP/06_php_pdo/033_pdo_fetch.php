<?php

/*
  Une fois la méthode PDO::query()
  appelée, un curseur est placé sur le premier
  enregistrement du jeu de résultat (rowset).

  La fonction PDO::fetch() renvoie un
  enregistrement placé sous le curseur, et
  si on est arrivé au bout de la table, renvoie
  false.

  On peut donc tester si on est arrivé au bout du
  rowset.

  Il nous faudra boucler sur ce rowset
  pour afficher tous les résultats, par exemple :

 */

$sql = 'SELECT title, year FROM movies;';
$stmt = $pdo->query($sql);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['title'] . '<br>';
    echo $row['year'];
}

/*
  Il est également possible de récupérer tous
  les enregistrements d'un coup avec
  PDO_Statement::fetchAll()
 */

$sql = 'SELECT * FROM clients';
$stmt = $pdo->query($sql);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($results);

/*
  Le tableau $results contiendra un tableau
  associatif multidimensionnel.

  On peut donc l'utiliser comme un autre tableau:
 */

echo $results[0]['firstname'];
// Affichera le prénom du premier client

/*
  La méthode PDO_Statement::fetchColumn()
  permet de récupérer la seule valeur d'une
  colonne de l'enregistrement suivant.
 */

$sql = 'SELECT * FROM clients';
$stmt = $pdo->query($sql);

$result = $stmt->fetchColumn(3);
echo "Adresse : $result";

// On fetche la colonne No 3, c'est à dire l'adresse du client
	
	