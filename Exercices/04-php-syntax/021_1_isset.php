<?php
/*
 * On doit souvent manipuler dans des scripts PHP des variables dont on est pas certain de l'existence, par exemple après une requête en base de données.
 * La fonction `isset` permet de vérifier si une variable existe bien.
 * Ce code risque de générer des erreurs, rendez-le sûr à l'aide de la fonction isset()
 */

$nom = 'Preteur';
$prenom = 'Jacques';
$profession;
$age = 42;
?>
<html lang="fr">
    <head>
        <title>Isset</title>
    </head>
    <body>
        <div class="container">
            Nom : <?php echo $nom ?><br>
            Prénom : <?php echo $prenom ?><br>
            Profession : <?php echo $profession ?><br>
            Nationalité : <?php echo $nationalite ?><br>
            Age : <?php echo $age ?><br>
        </div>
    </body>
</html>