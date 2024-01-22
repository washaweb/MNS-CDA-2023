<?php
	/*
		PDO a trois modes d'envoi d'erreur.
		Selon le paramètre passé, il affichera, ou
		n'affichera pas, les erreurs renvoyées par
		la base de données :

    	PDO::ERRMODE_SILENT
    		Valeur par défaut, PDO n'affichera aucune 
    		erreur tout seul, il faudra nous-même 
    		vérifier chaque résultat et regarder le 
    		contenu de $pdo->errorInfo();

    	PDO::ERRMODE_WARNING
    		Affiche des warnings PHP

    	PDO::ERRMODE_EXCEPTION
    		Lance des exceptions.


		On précise la façon dont PDO va traiter les
		erreurs de la base de données grace à l'appel :

	 */
	
	$pdo = new PDO('mysql:host=localhost;port=8889;dbname=haiku');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //<< on précise que PDO doit lancer des exceptions