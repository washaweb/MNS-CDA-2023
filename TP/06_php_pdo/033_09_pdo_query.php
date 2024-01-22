<?php

/*
  PDO::query() ressemble à PDO::exec(),
  à la différence que

  - PDO::exec() ne retournera que le nombre
  de lignes affectées par notre requete SQL,
  alors que

  - PDO::query() retournera un rowset
  (c'est à dire un ensemble de lignes)


  On pourra boucler sur ce rowset et effectuer
  les opérations que l'on souhaite, comme les
  afficher, attribuer les données à des variables,
  etc.


  Fonctionnement de PDO::query() :

 */

$movieId = 85;
$sql = 'SELECT title, year FROM movies WHERE id = ' . $movieId;
$result = $pdo->query($sql);

/*
  La requête a maintenant été éxécutée,
  et PDO n'attend que de pouvoir nous renvoyer les
  résultats.

  Pour le moment, les résultats ont bien été obtenus,
  mais il faut utiliser la fonction
  PDO_Statement::fetch() pour les afficher ou
  les utiliser.
 */

$row = $result->fetch(PDO::FETCH_ASSOC);
echo $row['title'];
echo $row['year'];

/*
  La fonction PDO::fetch() récupère le premier
  élément qui est renvoyé par MySQL.

  On doit lui passer un mode de fetch :

  PDO::FETCH_ASSOC nous renvoie des
  tableau associatifs.


  Le pointeur de la requete est maintenant placé
  sur le premier enregistrement renvoyé.

  On peut appeler la méthode PDO_Statement::fetch()
  une deuxième fois, pour faire avancer le
  pointeur à la case suivante :
 */

$nextRow = $stmt->fetch(PDO::FETCH_ASSOC);

echo $row['title'];
// Affichera le titre du deuxième enregistrement 
	// renvoyé.
	
	