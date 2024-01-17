<?php

/*
    1. Créer une page web ainsi qu'un formulaire d'ajout d'un livre dans une bibliothèque.
            Les champs à créer :
                    - Titre
                    - Auteur
                    - ISBN
                    - Année de parution
                    - Maison d'édition
            Le formulaire se chargera toujours sur la même page.

    2. Lorsque le formulaire est validé, vérifiez les champs en fonction du type de données de chacun :
                    - Titre : Obligatoire
                    - Auteur : Obligatoire
                    - ISBN : Au moins 13 caractères, pas plus de 18
                    - Année de parution : 4 caractères exactement, obligatoire
                    - Maison d'édition : Pas obligatoire, mais si une chaine est renseignée, elle doit être longue d'au moins 4 caractères
            Si le formulaire est correct, affichez un message et n'affichez plus le formulaire.
            Ajoutez un lien pour réafficher le formulaire.

    3. Faites en sorte qu'un message d'erreur s'affiche à côté de chacun des champs mal renseignés,
            précisant la règle de validation.
            Par exemple
                    "L\'ISBN doit être compris entre 10 et 18 caractères."

    4. Les valeurs précédentes, si elles sont valides, doivent rester inscrites dans les champs

    Faites en sorte que la longueur des champs soit évaluée correctement. On ne devrait pas, par exemple, pouvoir écrire
            "  85" en guise d'année. Les caractères d'espacement ne doivent pas compter dans le compte de 4.
            Appliquez ce principe à chacun des champs dont la longueur est contrôlée.
*/