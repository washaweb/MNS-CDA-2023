<?php
	/*
		Il est possible d'effectuer des requêtes
		grace à l'objet PDO, sans passer par 
		PDO_Statement :
	 */
	
	$sql = 'INSERT INTO bugs (user_id, label, date) ' .
			 'VALUES(14, "Description", "2015-11-08");';

	$pdo->exec($sql);

	/*
		On s'en sert généralement lorsqu'aucune donnée
		envoyée à la base ne provient d'une saisie
		utilisateur.

		Une requête de mise à jour :
	*/

	$bugId = 5;
	$sql = 	'UPDATE FROM bugs ' .
			 	'SET status = "resolved" ' .
			 	'WHERE bug_id = ' . $bugId;

	$pdo->exec($sql);

	/*
		La concaténation, dans ce cas, est plus
		simple à mettre en oeuvre que l'utilisation
		d'une requete préparée.

		Dans ce cas précis, on envoie que l'ID
		(numérique) à la base de données.

		Les variables ne sont pas échappées, avec
		PDO::exec(). C'est au programmeur de s'en 
		charger.

		PDO::exec() retourne le nombre de lignes 
		affectées.
		Par exemple, on peut écrire :
	 */

	$sql = 	'UPDATE FROM users ' .
			 	'SET login = "nono452" ' .
			 	'WHERE users.id = 42';

	$nbRows = $pdo->exec($sql);

	echo 'Nombre de lignes modifiées : ' . $nbRows;

	/*
		On peut par exemple tester si les modifications
		qu'on vient de spécifier ont été prises en 
		compte :
	 */
	
	if($nbRows > 0) {
		echo 'L\'utilisateur a bien été modifié';
	} else {
		echo 'Aucun utilisateur n\'a été trouvé, avec cet ID';
	}