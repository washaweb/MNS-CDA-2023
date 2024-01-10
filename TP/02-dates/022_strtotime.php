<?php 
date_default_timezone_set('Europe/Paris');
/*
  La fonction strtotime transforme une date, ou un texte, en timestamp.
  Le texte doit être écrit en anglais.
 */

 $now_ts = strtotime('now'); //La variable contient un timestamp de l'instant présent, c'est identique à time();
 $now_ts = time();

 $ts2 = strtotime('12 October 2018'); //timestamp qui correspond à la date renseignée en anglais

 $in_one_hour = strtotime('+1 hour');
 echo date('H:i:s', $in_one_hour); // affiche l'heure dans 1 heure

  $ten_minutes_ago = strtotime('-10 minutes');
  $next_friday = strtotime('next Friday');
  echo '<br>';
  echo date('d m Y', $next_friday); // affiche vendredi prochain

/*
    Une liste exhaustive de ce que la fonction strtotime() accepte comme chaine peut être trouvée ici :
    Voir la documentation de strtotime pour trouver d'autres exemples : http://php.net/manual/fr/function.strtotime.php

    Il n'est bien sur pas utile de connaitre l'ensemble de ces formats, mais il faut connaitre le principe d'utilisation
    de la fonction strtotime.
*/

 
/*
 * On peut aussi utiliser un objet de type DateTime :
 */
$myDate = new DateTime('2024-02-10'); // 10 février 2024
$otherDate = new DateTime('+2 days'); // Timestamp de la date en cours +2 jours
$tomorrowDate = new DateTime('tomorrow'); // Timestamp de demain
echo '<br>';
// Pour afficher la date :
echo $myDate->format('d/m/Y');
echo '<br>';
echo $tomorrowDate->format('r');