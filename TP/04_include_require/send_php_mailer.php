<?php 
// on inclut les variables de configuration pour l'envoi de mail
//----------------------------------
require_once('config.php');

// ici on inclus PHPMailer (suivre la doc)
//----------------------------------
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// ici notre traitement du formulaire
//----------------------------------

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
// Envoi de l'email avec PHPMailer
//----------------------------------
$mailer = new PHPMailer(true);

try {
    // Configuration du serveur
    $mailer->SMTPDebug = 2;                                       // Activer le débogage détaillé
    $mailer->isSMTP();                                            // Utiliser SMTP
    $mailer->Host       = $SMTP_SERVER;                           // Serveur SMTP vient de config.php
    $mailer->SMTPAuth   = true;                                   // Activer l'authentification SMTP
    $mailer->Username   = $SMTP_EMAIL;                             // SMTP username vient de config.php
    $mailer->Password   = $SMTP_PASSWORD;                         // SMTP password vient de config.php
    $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Activer le cryptage TLS
    $mailer->Port       = $SMTP_PORT;                             // Port TCP pour se connecter vient de config.php

    // Destinataires
    $mailer->setFrom($email, 'Formulaire de contact'); //ici on passe l'email du formulaire
    $mailer->addAddress('contact@washaweb.com', 'Jerome Poslednik');     // Ajouter un destinataire

    // Contenu de l'email
    $mailer->isHTML(true);                                  // Définir le format de l'email en HTML
    $mailer->Subject = $subject; //on passe le sujet du formulaire
    $mailer->Body    = '<p>Bonjour, vous avez re&ccedil;u un nouveau message :</p><p>' . $message . '</p><p>Ceci est un message envoy&eacute; depuis votre formulaire de contact.</p>'; //on passe le message du formulaire
    $mailer->AltBody = 'Bonjour, vous avez re&ccedil;u un nouveau message :' . $message; //ici l'équivalent en texte brut pour les clients mails qui ne comprennent pas l'HTML
    
    $mailer->send();
    echo 'Message envoyé';
} catch (Exception $e) {
    echo "Message non envoyé. Mailer Error: {$mailer->ErrorInfo}";
}

?>