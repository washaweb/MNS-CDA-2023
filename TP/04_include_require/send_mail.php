<?php 

// verifer si il y a une variable post d'envoyée
if ($_SERVER["REQUEST_METHOD"] != "POST") {
  echo 'il manque les données';
  exit;
}

$error = false;
$errorMessages = [];

// on vérifie s'il y a un sujet, et si oui on filtre la valeur
if(!isset($_POST['subject']) || empty($_POST['subject']) ) {
  $error = true;
  $errorMessages[] = 'Il manque le sujet du mail'; //on pousse un message dans le tableau des erreurs
} else {
  $subject = htmlentities($_POST['subject']); //on sécurise la donnée
}

// on vérifie  s'il manque le message, et si oui on filtre la valeur
if(!isset($_POST['message']) || empty($_POST['message']) ) {
  $error = true;
  $errorMessages[] = 'Il n’y a pas de message dans votre envoi.'; //on pousse un message dans le tableau des erreurs
} else {
  $message = htmlentities($_POST['message']); //on sécurise la donnée
}

// on vérifie s'il y a un email
if(!isset($_POST['email']) || empty($_POST['email']) ) {
  $error = true;
  $errorMessages[] = 'Il manque votre email.'; //on pousse un message dans le tableau des erreurs
} else {
  // on vérifie si l'email est valide, et si oui on filtre la valeur
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  // validation de l'email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $errorMessages[] = 'l’e-mail est invalide';
  }
}

if($error) {
  // on affiche les erreurs
  echo '<ul class="errros">';
  foreach ($errorMessages as $errorMessage) {
    echo '<li>'.$errorMessage.'</li>';
  }
  echo '</ul>';
  exit; // ne pas oublier d'arrêter le script en cas d'erreur
}

// envoi du mail
//-------------------------------------------
// si tout est OK, il faut envoyer un email avec comme destinataire l'administrateur, et insérer les données du formulaire

// Adresse e-mail de l'expéditeur
$headers = 'From: webmaster@example.com' . "\r\n" .
'Reply-To: webmaster@example.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

// Envoi de l'email
if (mail($email, $subject, $message, $headers)) {
echo "Email envoyé avec succès à $email";
} else {
echo "Échec de l'envoi de l'email";
}
?>