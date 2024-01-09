<?php 

/*
 La boucle do...while est quasiment la même que while
 Seulement, là ou `while` ne s'éxécutera que si la condition spécifiée est vraie,
    `do...while` s'éxécutera au moins une fois.
    Lors du deuxième passage dans la boucle, s'il y en a un, la condition devra être réalisée pour que l'éxécution se poursuive

    Exemple :
 */

 $loop = false;
 while ($loop){
  echo 'LOOP<br>';
 }

/*
  Évidemment, PHP ne rentrera jamais dans la boucle.

  Considérons maintenant le cas de la boucle `do...while` :
 */

 $loop = false;
 do {
     echo 'LOOP<br>';
 } while ($loop);

/*
    PHP rentrera une et une seule fois dans cette derniere boucle.
    Des qu'il verra que la condition n'est pas réalisée, il abandonnera la boucle, et continuera l'interprétation du script.

    Meme si pour le moment, on a pas vraiment d'application pratique de cette boucle,
    on verra plus tard qu'elle est parfois très pratique pour etre certain que PHP passera au moins une fois dans la boucle
    avant de continuer à lire le script.
    (Par exemple, le premier passage dans la boucle `do...while` pourrait initialiser des variables globales, qui ne le seraient
    à aucun autre moment)
*/
?>