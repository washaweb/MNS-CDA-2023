<?php 
    
//Exercice 2
/*
Ecrivez un script qui vous dit "Bonjour", "Bonsoir" ou "Bonne nuit" en fonction de l'heure qu'il est actuellement.
*/

$heure = date('H');

if($heure >= 7 && $heure <= 16) {
    echo 'Bonjour';
} elseif($heure > 16 && $heure < 22) {
    echo 'Bonsoir';
} elseif($heure >= 22 || $heure < 7) {
    echo 'Bonne nuit';
}