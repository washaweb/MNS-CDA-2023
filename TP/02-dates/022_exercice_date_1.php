<?php
//Exercice 1
/*
  À l'aide de la fonction date(), affichez dans une liste la date du jour, sous différentes formes :

      1. 10/10/2024
      2. 2024-10-10
      3. Le 10/10 à 10h30
      4. Il est exactement 10:30 et 35 seconde(s)
        Bonus : Prenez en compte le "s" qui apparaîtra uniquement au pluriel
*/

echo '<ol>';
  // 1.
  echo '<li>' . date('d/m/Y') . '</li>';
  
  // 2.
  echo '<li>' . date('Y-m-d') . '</li>';
  
  // 3.
  echo '<li>' . 'Le ' . date('m/d') . ' à ' . date('H') . 'h' . date('i') . '</li>';
  
  // 3b.
  echo '<li>' .date('\L\e m/d \à H\hi') . '</li>';
  
  // 4.
  echo '<li>Il est exactement ' . date('H:i') . ' et ' . date('s') . ' seconde(s)</li>';
  
  // 4b. prise en compte du s des secondes
  $secondes = date('s');
  echo '<li>Il est exactement ' . date('H:i') . ' et ' . $secondes . ' seconde' . ($secondes > 1 ? 's' : '') . '</li>';

echo '</ol>';
  