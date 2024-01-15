<?php 
/*
  La fonction `filter_var` effectue deux choses :
  - Le nettoyage des données de tous les
  caractères interdits
  - La validation : vérifie si les données correspondent
  au type que l'on attend.
*/

// Par exemple, le code ci-dessous enlèvera tous les tags HTML
// d'une chaine :

$string = '<h1>Je suis un titre</h1>';
$sanitarizedString = htmlspecialchars($string); //échape les caractères HTML

echo html_entity_decode($sanitarizedString); //effectue l'opération de décodage (pour avoir à nouveau des caractères html valides)

$textString = strip_tags($string); //enlève tous les caractères HTML

// Allow <p> and <a>
$text ="<p><a href=\"https://www.google.com\">test avec un <strong>strong</strong> et un <em>em</em></a></p><h2>test</h2>";

// permet de conserver cetains tags (en deuxième paramètre ou précise les tags à conserver) :
echo strip_tags($text, '<p><a>');


// $sanitarizedString = filter_var($string, FILTER_SANITIZE_STRING); //<-- déprécié au profit de htmlspecialcars

echo $sanitarizedString;
echo '<br>';
echo $textString;

// valider une adresse ip

$ip = '192.168.0.1'; //ip v4
$ip = '3FFE:FFFF:0:CD30:0:0:0:0'; //ip v6

$validIP = filter_var($ip, FILTER_VALIDATE_IP);
echo '<br>';
if ($validIP) {
  echo 'L\'IP est valide';
} else {
  echo 'L\'IP n\'est pas valide';
}

echo '<br>';

// valider un email

$mail = 'm<script>o mo@echanson.eu';
$filteredMail = filter_var($mail, FILTER_VALIDATE_EMAIL); // ne passe pas le filtre de validation

$filteredMail = filter_var($mail, FILTER_SANITIZE_EMAIL);  // ça enlève les caractères interdits

echo $filteredMail;

echo '<br>';

$url = 'http://www.example.com/<script>a/newfile.txt';
$filteredUrl = filter_var($url, FILTER_SANITIZE_URL);
echo $filteredUrl;

/*
  En général, on combine les opérations de filtrage et de validation.
  - On commence par retirer les caractères inutiles, généralement
  involontairement ajoutés (comme les espacements)
  - On vérifie la validité de la chaine, une fois filtrée.

  La fonction filter_var effectue les deux actions, selon le
  paramètre qui lui est envoyé.

  Exemple :
 */

 if (isset($_POST['email'])) {
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "$email est une adresse valide.<br/>";
  } else {
      echo "$email n'est pas une adresse valide.<br/>";
  }
}

// Liste des filtres de validation : http://php.net/manual/fr/filter.filters.validate.php
// Liste des filtres de nettoyage : http://php.net/manual/fr/filter.filters.sanitize.php


?>