<?php
	/*
		PDO : PHP Data Object
		
		On ne se connecte pas en passant un tableau 
		ou des paramètres indépendants, mais en utilisant
		un DSN : 

		http://php.net/manual/fr/ref.pdo-mysql.connection.php

		Data Source Name

		Il "résume" les paramètres de connexion à la base
		
		On utilisera la classe PDO et la classe PDOStatement
		pour accéder à la base de données.

		PDO  			: L'accès à notre base de données
		PDOStatement 	: Des requêtes que nous allons envoyer
	 */
	
	$strConnection = 'mysql:host=localhost;port=8889;dbname=haiku';
  // on utilise un
	$pdo = new PDO($strConnection, 'root', 'root');

	/*
		On peut maintenant exécuter des requêtes sur cet
		objet :
	 */

  // DELETE
	$query = 'DELETE FROM haikus WHERE id=12;';
	$pdo->exec($query);
  
  // SELECT AVEC DES PARAMETRES DYNAMIQUES
	$stmt = $pdo->prepare("SELECT * FROM haikus WHERE category_id = ?");
	// Associer des valeurs aux placeholders
	$stmt->bindParam(1, $category_id);
  $category_id = 1;
	// Compiler et exécuter la requête
  $stmt->execute();


	/*
		Avantages de la requete préparée
			- plus sure
			- meilleures performances

		Particulierement utile, surtout si on
		veut insérer plusieurs lignes, par exemple.
		Dans ce cas, plutot que de faire plusieurs
		INSERT, on préparera la requête, et on l'utilisera,
		par exemple, dans une boucle.

	 */

  // // INSERT AVEC DES PARAMETRES DYNAMIQUES
	$stmt = $pdo->prepare("INSERT INTO haikus (id, category_id, content) VALUES (?, ?, ?)");
	// Associer des valeurs aux placeholders
	$stmt->bindParam(1, $id);
	$stmt->bindParam(2, $category_id);
	$stmt->bindParam(3, $content);
  $id = 12;
  $category_id = 1;
	$content = 'Herbe verte fraîche, Rosée scintille au matin, Éclat de nature.';	
	// Compiler et exécuter la requête
  $stmt->execute();



  // MULTIPLES INSERT AVEC LES MËMES PARAMETRES DYNAMIQUES
	$stmt = $pdo->prepare("INSERT INTO haikus (category_id, content) VALUES (?, ?)");
	$stmt->bindParam(1, $category_id);
	$stmt->bindParam(2, $content);

	// insertion d'une ligne
	$category_id = 1;
	$value = 'Ciel rose du matin, insectes qui bourdonnent, rivère qui coule.';	
  $stmt->execute();
	
  // insertion d'une autre ligne avec la même ligne de prepare
  $category_id = 24;
	$value = 'Crépuscule de Phaaze, Monde de corruption, Fin du Phazon.';
	$stmt->execute();


	