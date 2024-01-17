<?php
/*
	Objectif : Créer un formulaire permettant d'ajouter un client en base de données.
	On pourra utiliser une base de données existante.
	Les champs nécessaires, au minimum, sont le nom et le prénom.

	Étape 1 : Formulaire et validation
	Un champ pour le nom, un autre pour le prénom
	Tous les deux devront être des compris entre 2 et 10 caractères
	On utilisera une seule page pour afficher et soumettre le formulaire

	Étape 2 : Ajout en base de données
	Si l'utilisateur a cliqué sur le bouton de soumission et qu'aucune erreur n'a été relevée dans le formulaire,
	on ajoutera l'utilisateur en base de données dans une base de donnée 'myusers'.
	On utilisera pour cela une requête préparée.

	Bonus : Pour ceux qui veulent : créer une fonction pour cela : addClient($firstname, $lastname)

*/

?>
<html>

<body>
  <form action="#" method="POST">
    <input type="text" name="lastname" placeholder="Nom de famille">
    <input type="text" name="firstname" placeholder="Prénom">
    <input type="submit" name="add_client">
  </form>
</body>

</html>