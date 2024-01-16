<?php

/*
    Créez un petit jeu en PHP :

    Le jeu du plus ou moins.

    Le serveur génère un nombre aléatoire compris entre 1 et 100.

    L'utilisateur est invité à entrer un nombre.

    Le serveur indique si le nombre entré est inférieur ou
    supérieur au sien.

    Une fois que l'utilisateur a trouvé le nombre, un message
    est affiché, indiquant le nombre de tentatives qu'il aura
    fallu.

    On créera une fonction `testerNombre($nombreUtilisateur, $nombreATrouver)`
    qui renverra trois valeurs différentes, selon le cas :
        1 : le nombre entré est encore trop petit
        -1 : le nombre entré est encore trop grand
        0 : le nombre entré est correct

    Pour obtenir un nombre aléatoire en PHP, cherchez dans la 
    documentation la fonction appropriée.


    Deuxième étape :
    - Filtrez et nettoyez les saisies utilisateur :
        on attend rien d'autre qu'un nombre.
    - Faites en sorte qu'on puisse voir tous les essais déjà réalisés, ainsi que le message "trop grand" ou "trop petit" à côté de chaque essai.

        On pourra utiliser des tableaux d'éléments HTML dans le formulaire :
        <input type="hidden" name="mon-tableau[]" value="Première valeur" />
        <input type="hidden" name="mon-tableau[]" value="Deuxième valeur" />
        <input type="hidden" name="mon-tableau[]" value="Troisième valeur" />

        => Ces éléments, placés dans un formulaire envoyé en POST, seront reçues ainsi par PHP :
        $_POST['mon-tableau'] => array(
            0 => "Première valeur"
            1 => "Deuxième valeur"
            2 => "Troisième valeur"
        )

    - Affichez le temps écoulé entre le début et la fin de la partie.

*/