<?php
date_default_timezone_set('Europe/Paris');
// je créer une variable globale par convention en Majuscule
$DATE_FORMAT_DEFAULT = 'l, H:i';
/*
  La fonction date($format, $timestamp) est incontournable.

  Elle permet de formater l'affichage des dates.

  La fonction prend en premier argument le format de la date, sous forme d'une chaine de caractères.
  Le deuxième argument est un `timestamp`, le nombre de secondes écoulées depuis le 1/1/70.
  Par défaut, le timestamp est celui d'aujourd'hui.
  Il peut être récupéré grâce à la fonction time();

  Pour les différentes options de format, voir http://php.net/manual/fr/function.date.php
 */

// stocker une date précise
$date1 = date('10/01/2024');

// affiche la date du jour
$date2 = date('d/m/Y');
// tableau de références des valeurs acceptées pour formater une date:
// https://www.php.net/manual/fr/datetime.format.php

echo $date1 . '<br>';
echo $date2 . '<br>';

// jours du mois avec 0 initial 01, 31
$date3 = date('d');

// jours du mois sans le 0 initial 1, 31
$date3 = date('j');

// mois avec le 0 initial 01, 12
$date3 = date('m');

// mois sans le 0 initial 1, 12
$date3 = date('n');

// année 
$date3 = date('Y');

// nom du jour
$date3 = date('l');

// L'heure minute seconde
$date3 = date('H i s');

// Renvoie une chaine du genre "Thu, 21 Dec 2000 16:01:07 +0200"
$date3 = date('r');

// Renvoie le timestamp
$date3 = date('U');

// date($format, $timestamp)
echo $date3 . '<br>';
// formatage d'une date à partir de son timestap
// on a réglé la variable $DATE_FORMAT_DEFAULT en haut du document avec un affichage 'l, H:i'
echo date($DATE_FORMAT_DEFAULT, $date3);