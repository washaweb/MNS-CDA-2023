<?php

/*
  Souvent, on a besoin de vérifier si la saisie qui a été effectuée dans le formulaire est cohérente.
  On ne devrait pas pouvoir, par exemple, entrer une date de naissance au lieu d'une adresse mail.

  Pour cette raison il est crucial de savoir valider et filtrer les données issues de formulaires.

  Il existe des fonctions utiles pour cela en PHP, on en a examiné certaines :
 */

// Renvoie `true` si la variable est vide, `false` dans le cas contraire.
empty($variable);
/*
  La fonction `empty` permet facilement de vérifier si un champ a bien été rempli.
  Si le champ du formulaire a été envoyé vide, le client envoie tout de même le nom du champ, mais la valeur
  associée dans le tableau $_POST ou $_GET en PHP sera une chaine vide.

  On peut ainsi vérifier si un champ a bien été renseigné.

  Il est parfois utile de vérifier la longueur d'une chaîne, c'est à dire le nombre de caractères qui la
  composent.
 */
// Obtenir le nombre de caractères composant la chaine
$passwordLength = strlen( $_POST['pass'] );

// On vérifiera certainement la longueur ainsi :
if ($passwordLength < 8) {
  echo 'Le mot de passe doit faire 8 caractères au minimum.';
}

// Ou encore
$nameLength = strlen( $_POST['name'] );
if ($nameLength < 2 || $nameLength > 50) {
    echo 'Le nom doit comporter entre 2 et 50 caractères.';
}

/*
  La fonction `trim` ("tailler") permet de retirer les espaces existant avant et après un mot.
  Exemple :
 */
$string = "   Bonjour tout le monde!    ... Ca va bien ?   ";
$string = trim($string);
// $string vaut maintenant "Bonjour tout le monde!    ... Ca va bien ?"
/*
    La fonction `trim` supprime les espaces au début et à la fin de la chaine, pas ceux entre les mots.
    La fonction retire tous les caractères "invisibles", comme les tabulations, les caractères "Nouvelle ligne", etc
    \n => new line
    \t => tabulation
    \r => retour chariot
 */