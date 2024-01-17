<?php
    /*
        De meme que l'exercice précédent, créez une page manage_types.php

        Faites en sorte que, si le genre entré par l'utilisateur existe déjà, il ne soit pas entré en base de données.
        On affichera dans ce cas une erreur à l'utilisateur.
        On créera une fonction pour cela : typeExists($type)

        Elle acceptera un nom de type (entré par l'utilisateur)
        et renverra un booléen pour signifier si un type existe déjà en base de données ou pas.
        On utilisera cette fonction au niveau des vérification des autres champs du formulaire.
    */

    if(typeExists('Science-Fiction')) {
        echo 'Déjà présent';
    }