<?php
    /*
        1. Créez une fonction `echoElementsInCustomTags` qui
        affiche chacun des éléments d'un tableau passé en
        paramètre, dans un élément HTML dont le type est passé
        en paramètre.

        On appelera cette fonction comme ceci :

        $elements = array('poissons', 'oiseaux', 'dinosaures');
        echoElementsInCustomTags($elements, 'p');

        -> Cet appel devrait afficher trois paragraphes, 
        dont chacun contiendra un élément du tableau $elements


        2. Modifiez cette fonction pour que, si le tag HTML
        n'est pas spécifié, les variables s'affichent dans 
        un élément <div>.

        Bonus
        3. Autorisez un troisième paramètre, $wrapper, qui déterminera si 
        les éléments doivent être contenus dans un parent.
        Par défaut, les éléments n'auront pas de parent.
        
        Exemple d'appel : echoElementsInCustomTags($array, 'li', 'ul');
     
        4. Faites en sorte que des classes CSS puissent être passées pour chacun des 
        éléments du tableau.

     */