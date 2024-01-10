<?php 
//Exercice 3
/*
  Ecrivez un script qui affiche la date à laquelle nous serons dans 
      - une semaine
      - un mois
      - un an
*/

$inOneWeek = strtotime('+1 week');
$inOneMonth = strtotime('+1 month');
$inOneYear = strtotime('+1 year');
?>


Dans une semaine, nous serons le <?php echo date('d/m/Y', $inOneWeek) ?>.<br>
Dans un mois, nous serons le <?php echo date('d/m/Y', $inOneMonth) ?>.<br>
Dans un an, nous serons le <?php echo date('d/m/Y', $inOneYear) ?>.<br>