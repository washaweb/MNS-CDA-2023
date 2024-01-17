<?php

$error = false;
$errorMessages = [];

// dans ce code, j'exécute une logique de validation de données pour le sujet
// if(!isset($_POST['subject']) || empty($_POST['subject']) ) {
//   $error = true;
//   $errorMessages[] = 'Il manque le sujet du mail'; //on pousse un message dans le tableau des erreurs
// } else {
//   $subject = htmlentities($_POST['subject']); //on sécurise la donnée
// }

// dans ce code, j'exécute la même logique de validation de données pour le message

// if(!isset($_POST['message']) || empty($_POST['message']) ) {
//   $error = true;
//   $errorMessages[] = 'Il n’y a pas de message dans votre envoi.'; //on pousse un message dans le tableau des erreurs
// } else {
//   $message = htmlentities($_POST['message']); //on sécurise la donnée
// }

// les fonctions servent à éviter la duplication du code, et à simplifier la lecture, à organiser le code et à éviter les erreurs.


// un fontion se déclare avec le mot clé function, elle peut contenir des paramètre et retourne une valeur (ici rien : void)
/**
 * fonction qui valide les données de l'input
 * @param $champ la valeur de l'input à tester
 * @param $message le message à afficher en cas d'erreur
 * @return void void signifie que la fonction n'a pas de retour
 */
 function validateInput($champ, $message = 'Un champ est manquant') { // ici on définit une valeur par défaut à message
  global $error, $errorMessages; //les variables externes à la fonction doivent être déclarées comme venant de l'espace global, sinon on aura un warning
  if(!isset($champ) || empty($champ) ) {
    $error = true;
    $errorMessages[] = $message; //on pousse un message dans le tableau des erreurs
  } else {
    $message = htmlentities($champ); //on sécurise la donnée
  }
}

// pour lancer une fonction, on doit l'appeler et remplir ses arguments :
validateInput($_POST['subject'], 'Il manque le sujet du mail');
validateInput($_POST['message'], 'Il n’y a pas de message dans votre envoi');

// on peut avoir des paramètres par défaut, pour éviter de remplir tous les arguments
validateInput($_POST['nom']);

validateInput(''); // Un champ est manquant



// On peut faire des fonctions qui retourne quelque chose
// on teste si oui ou non l'email est valide (retourne un boolean true||false)

/**
 * fonction qui valide l'email
 * @param $email l'email à tester
 * @return boolean true si l'email est valide, false si non
 */
function emailIsInvalid($email) {
  $err = false;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err = true;
  }
  return $err;
}

if(emailIsInvalid($_POST['email'])) {
  $error = true;
  $errorMessages[] = 'Votre email est invalide';
}


// on peut faire des fonctions dites récursives, çad qu'elle s'appelle elle-même
// ce genre de fonction est souvent utilisée pour faire des boucles de parcours de dossiers / sous-dossiers, etc.
function exempleRecursif($n) {
  $n += 10;
  echo $n;
  if($n < 10000) {
    exempleRecursif($n); //si je ne fais pas de condition pour l'arrêter, ça va faire une boucle infinie
  }
}

exempleRecursif(0);


// On peut utiliser ... pour accéder aux arguments d'une fonction (nombre variable d'arguments)
/** 
 * fonction qui retourne la somme de tous les arguments passés
 * @param INT,FLOAT $numbers les nombres à sommer
*/
function sum(...$numbers) {
  $nb = 0;
  foreach ($numbers as $number) {
    $nb += $number;
  }
  return $nb;
}
echo sum(1,2,3,4);


// Voir la portée des variables ici
// https://www.php.net/manual/fr/language.variables.scope.php