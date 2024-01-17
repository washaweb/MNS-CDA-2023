<?php
/*
  Quelques exercices pratiques sur les chaines de caractères :

  Créez le code PHP qui permet de réaliser ces opérations :

  1. Un formulaire HTML comportant un champ de texte, Le formulaire pointera sur la même page pour traiter les résultas en PHP.
  2. Les boutons `submit` envoient la chaine entrée, et qui affiche dans un <div> le résultat du traitement de cette chaine.
  3. Le premier submit renvoie la chaine en majuscules
  3. le second la chaine en minuscules
  4. le troisième ajouter une majuscule à chaque mot
  5. Le quatrième ajouter une majuscule, mais seulement au début de la chaine.
  6. Le cinquième n'affichera la chaine que jusqu'au caractère '.' (point) non inclus
  - Utilisez pour cela la fonction `explode`.
  - Utilisez maintenant la fonction `strpos` et `substr` pour produire le même résultat.
  7. Bonus : Créez pour finir le dernier submit affiche les deux premiers mots de la chaine entrée, séparés par un tiret ("-")
  S'il n'y a pas assez de mots, affichez le message "Entrez au moins deux mots"
 */
?>
<html lang="fr">

<head>
  <title>Chaines</title>
</head>

<body>
  <form action="#" method="post">
    <!-- champ de texte en entrée -->
    <input type="text" id="string" name="string">
    <!-- différentes actions : -->
    <input type="submit" name="upper" value="Majuscules">
    <input type="submit" name="lower" value="Minuscules">
    <input type="submit" name="ucwords" value="Maj. pour les mots">
    <input type="submit" name="ucfirst" value="Maj. pour la phrase">
    <input type="submit" name="normalize" value="Maj. pour la phrase, le reste en minuscules">
    <input type="submit" name="truncate" value="Tronquer">
    <!-- bonus -->
    <input type="submit" name="separate" value="Deux premiers mots">
  </form>

  <h3>Résultat</h3>
  <p><?php echo $newString; // Définissez $newString en haut de la page ?></p>
</body>

</html>