<?php 
date_default_timezone_set('Europe/Paris');
/*
  La fonction `mktime` renvoie un timestamp correspondant aux valeurs qui lui sont envoyées.
  Ce timestamp peut ensuite être utilisé, par exemple, par la fonction `date`

  `mktime` prend comme arguments, dans l'ordre :
  - L'heure
  - Le nombre de minutes
  - Le nombre de secondes
  - Le numéro du mois
  - Le numéro du jour
  - L'année
 */

 $timestamp1 = mktime(10, 30, 0, 1, 10, 2024);
 $timestamp2 = mktime(0, 0, 0, 2, 2, 2026);

echo date('Y-m-d H:i:s', $timestamp1) . '<br>';
echo date('d m Y', $timestamp2) . '<br>';