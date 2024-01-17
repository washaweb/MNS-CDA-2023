<?php
    /*
     * utilisez le fichier sql-dumps/sports.sql pour créer votre BDD
     *
     * En utilisant le formulaire de cette page, faites en sorte que chaque clic sur un des boutons incrémente le nombre de votes en base de données, chaque vote doit incrémenter la catégorie pour laquelle l'utilisateur a voté.
     * 
     * Une fois le formulaire envoyé, à la place du formulaire, afficher les nombres de votes pour chacune des catégories, dans la même page.
     * Astuce: le formulaire doit être affiché uniquement si la variable $_POST a été envoyée.
     */
?>
<!doctype html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Votes</title>
</head>

<body>
  <form action="#" method="POST">
    <button type="submit" name="1">Voter pour le tennis</button>
    <button type="submit" name="2">Voter pour le football</button>
    <button type="submit" name="3">Voter pour le basketball</button>
  </form>
</body>

</html>