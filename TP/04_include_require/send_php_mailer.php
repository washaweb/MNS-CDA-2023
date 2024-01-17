<?php 
// on inclut les variables de configuration pour l'envoi de mail
//----------------------------------

// j'inclus ma bibliothèque de fonctions
require_once('functions.php');

// ici notre traitement du formulaire
//----------------------------------

// verifer si il y a une variable post d'envoyée
if ($_SERVER["REQUEST_METHOD"] != "POST") {
  echo 'il manque les données';
  exit;
}

// on vérifie s'il y a un sujet, et si oui on filtre la valeur
$subject = validateInput($_POST['subject'], 'Il manque le sujet du mail');
// on vérifie  s'il manque le message, et si oui on filtre la valeur
$message = validateInput($_POST['message'], 'Il n’y a pas de message dans votre envoi');
// on vérifie s'il y a un email
$email = validateEmail($_POST['email'], 'Il manque votre email.', 'l’e-mail est invalide');


if( displayErrors() ) exit;

// j'utilise la méthode d'envoi d'email de ma bibliothèque de fonctions
sendMail($subject, $message, $email);