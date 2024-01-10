<?php

/*
  La source d'informations la plus fiable sur PHP est, bien sur, la documentation officielle :
  https://php.net/docs.php

  On y trouve
  - La référence des fonctions :
  Leur nom, les arguments qu'elles acceptent en paramètre, ce qu'elles renvoient, des exemples pratiques et des pièges courants
  - Un guide sur la syntaxe du PHP
  - Les méthodes de configuration, etc.

  Quand on ne connait pas une fontion, ou qu'on a un doute sur les paramètres à lui donner, par exemple,
  il convient de consulter le manuel.


  Il arrive souvent que plusieurs paramètres ne soient pas obligatoires :

  int mktime ([ int $hour 	= date("H")
                [, int $minute 	= date("i")
                [, int $second 	= date("s")
                [, int $month  	= date("n")
                [, int $day    	= date("j")
                [, int $year   	= date("Y")
                [, int $is_dst 	= -1 ]]]]]]] )

  Ici, aucun paramètre n'est obligatoire. Il faudra en revanche respecter l'ordre des paramètres lors de l'appel de la fonction.

  http://php.net/manual/fr/function.mktime.php

  Cette définition de fonction indique qu'aucun paramètre n'est obligatoire.
  On peut l'appeler ainsi, a minima :
 */

mktime();

// Voici les différentes manières possibles de l'appeler :

mktime(0);         // Date du jour, mais à l'heure 0
mktime(0, 0);        // Date du jour, heure 0, minute 0
mktime(0, 0, 0);       // Date du jour, heure 0, minute 0, seconde 0 (minuit)
mktime(0, 0, 0, 1);       // Mois de janvier, numéro de jour et année en cours, heure, minute et seconde 0
mktime(0, 0, 0, 1, 1);      // Premier janvier de l'année en cours, heure, minute et seconde 0
mktime(0, 0, 0, 1, 1, 1970);    // Premier janvier 1970 à minuit
// Impossible de créer une date plus ancienne que celle-la !

/*
  On peut aussi choisir de ne spécifier que l'année.
  Dans ce cas, il faudra envoyer les valeurs par défaut à certains paramètres :
 */

mktime(date("H"), date("i"), date("s"), date("n"), date("j"), 2000); // La même date, même heure, mais en 2000