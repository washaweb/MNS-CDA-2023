<?php

/*
  La fonction `include` permet d'inclure un fichier dans le script courant.
  Il s'agit généralement d'un autre script PHP

  Comme la fonction `echo`, il n'est pas nécessaire de préciser les
  parenthèses dans l'appel de la fonction.

  La fonction `require` fait quasiment le même travail
  (voir plus loin pour la différence entre ces deux fonctions)

 */

include 'functions.php';
// Le contenu du fichier functions.php sera rappatrié ici et interprété.
ma_fonction();


/*
  On peut inclure n'importe quel type de script PHP, jusqu'à une
  page HTML classique :
 */
// include 'article.html';


/*
  Exemple pratique :

  A l'aide de cette fonction, il est par exemple possible d'inclure
  des parties d'une page web :
 */

require 'header.php';
// Ce fichier pourrait contenir le doctype, la partie <head>, etc.
// On pourrait aussi afficher un en-tête commun au site

/*
  Le contenu de la page
 */

require 'footer.php';
// Ce fichier pourrait contenir la fermeture de la balise
// <body>, et d'autres informations, comme les mentions 
// légales, etc. communes au reste du site.

/*
  Exemples d'usage de la fonction `include` ou `require` :

  - Ajouter un contenu statique à une page web, qu'on
  retrouve sur plusieurs pages

  - Déclarer des fonctions ou des classes, pour augmenter
  la lisibilité du code


  À la différence de la fonction `include`, la fonction
  `require` émet une erreur fatale lorsque le fichier
  appelé n'existe pas. (quand `include` ne produit qu'un
  warning)


  Il est également possible d'utiliser les fonctions
  `require_once` et `include_once`.
  Ces fonctions vérifient que le fichier n'aie pas déjà
  été inclus dans le script. Si c'est le cas, elle ne
  l'inclueront pas une deuxième fois.

  Cela peut être très utile, par exemple lorsque les
  fichiers à inclure contiennent des déclarations de
  fonctions (PHP ne permettant pas de déclarer
  plusieurs fois la même fonction)
 */

require_once 'functions.php';

// ...

require_once 'functions.php';
// Cette ligne n'aura aucun effet.