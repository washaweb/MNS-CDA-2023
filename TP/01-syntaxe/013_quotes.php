<?php 
/*
  Il existe deux sortes de guillemets en PHP,
  qui toutes les deux définissent une chaine de caractères
*/

$chaine1 = 'voici une phrase';

$chaine2 = "voici une autre phrase";

// quand on utilise les guillements double, on peut insérer une variable directement dedans
$couleur = 'rouge';
$chaine3 = "Il arrive que le caméléon soit $couleur";

// Les 2 type de quotes peuvent être utilisées ensemble sans problème
$chaine4 = 'Aucun problème' . "avec ça.";

// En javascript, il y a également les backticks ` touche Altgr + 7
// console.log(`texte affiché ${mavariable} dans le texte`);

/* il est important de protéger vos guillements dans le texte dans certaines conditions : 
Par exemple, la chaine 
  C'est facile

  contient le caractère ` ' `
  Lorsqu'on veut écrire, en PHP, ce caractère, il faut :
      - Soit utiliser des guillemets doubles, pour qu'il n'y ait pas de confusion :
*/
$ma_chaine = "C'est facile";
/*
  - Soit entourer la chaine de guillemets simples, mais échapper les caractères qui pourraient mal être interprétés :
*/
$ma_chaine = 'C\'est facile';

/*
  De même, il faut échapper le caractère ` " ` quand il est placé entre des double-quotes.
*/
$maChaine = "Voici un \"échappement\"";

?>