<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercice isset</title>
</head>

<body>
  <?php
/*
 * On doit souvent manipuler dans des scripts PHP des variables dont on est pas certain de l'existence, par exemple après une requête en base de données.
 * La fonction `isset` permet de vérifier si une variable existe bien.
 * Ce code risque de générer des erreurs, rendez-le sûr à l'aide de la fonction isset()
 */
$article = array(
    'id' => 23,
    'title' => 'Les souris seraient-elle en réalité maîtres du monde ?',
    'content' => 'Lorem ipsum dolor sit amet, et eliptir consec dei lorem ipsum dolor sit amet et eliptir consec dei ... ',
);
?>
  <h1><?php echo isset( $article['title'] ) ? $article['title'] : 'Pas de titre.' ?></h1>
  <p>

    <?php if( isset( $article['thumbnail'] ) ): ?>
    <img src="<?php echo $article['thumbnail'] ?>" />
    <?php endif; ?>

    <?php echo isset( $article['content'] ) ? $article['content'] : 'Pas de contenu.' ?>
  </p>
</body>

</html>