<?php 
require_once('config.php');

// ici on inclus PHPMailer (suivre la doc)
//----------------------------------
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$error = false;
$errorMessages = [];
/**
 * fonction qui valide les données de l'input
 * @param $champ la valeur de l'input à tester
 * @param $message le message à afficher en cas d'erreur
 * @return $champ retourne le champ sanitisé
 */
function validateInput($champ, $message = 'Un champ est manquant') { // ici on définit une valeur par défaut à message
  global $error, $errorMessages;
  if(!isset($champ) || empty($champ) ) {
    $error = true;
    $errorMessages[] = $message; //on pousse un message dans le tableau des erreurs
  } else {
    $message = htmlentities($champ); //on sécurise la donnée
  }
  return $champ;
}

/**
 * fonction qui valide l'email
 * @param $email l'email à tester
 * @param $messageEmpty le message à afficher si le champ est vide
 * @param $messageInvalid le message à afficher si l'email n'est pas valide
 * @return $email retourn l'email sanitisé
 */
function validateEmail($mail, $messageEmpty, $messageInvalid) {
  global $error, $errorMessages;
  if(!isset($mail) || empty($mail) ) {
    $error = true;
    $errorMessages[] = $messageEmpty; //on pousse un message dans le tableau des erreurs
  } else {
    // on vérifie si l'email est valide, et si oui on filtre la valeur
    $email = filter_var($mail, FILTER_SANITIZE_EMAIL);
    // validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = true;
      $errorMessages[] = $messageInvalid;
    }
  }
}

/**
 * affiche des erreurs et returne true si il y a des erreurs
 * @return boolean true si il y a des erreurs, false si non
 */
function displayErrors() {
  global $error, $errorMessages;

  if($error) {
    // on affiche les erreurs
    echo '<ul class="errors">';
    foreach ($errorMessages as $errorMessage) {
      echo '<li>'.$errorMessage.'</li>';
    }
    echo '</ul>';
    return true;
  }
  return false;
}

function sendMail($subject, $message, $emailFrom, $emailTo = 'contact@washaweb.com', $emailToName = 'Jérôme Poslednik') {
  global $SMTP_SERVER, $SMTP_EMAIL, $SMTP_PASSWORD, $SMTP_PORT;
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
      $mailer->setFrom($emailFrom, 'Formulaire de contact'); //ici on passe l'email du formulaire
      $mailer->addAddress($emailTo, $emailToName);     // Ajouter un destinataire

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
}