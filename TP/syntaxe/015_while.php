<?php 

/*
  La boucle while prend une forme différente
*/
$i = 0;
while($i < 10) { //tant que $i < 10
  echo $i;
  $i++;
}

/*
  On peut ainsi plus facilement écrire des boucles dont on ne connaît pas à l'avance le nombre d'itérations
 */
// echo $i; // 10
$i = 0;
while(true) { //a priori, toujours vrai
  echo $i;

  if($i > 10) { //on peut mettre n'importe quelle condition ici...
    break; // Ce mot-clé signifie qu'on doit sortir de la boucle.
  }
  $i++;
}


/*
    On reverra une boucle de ce type quand on abordera la lecture des fichiers en PHP
    On écrira quelque chose du genre :

        while(FICHIER_PAS_FINI) {
                Continuer à lire le fichier. 
        }
*/


?>