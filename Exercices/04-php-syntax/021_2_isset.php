<?php
/*
  Meme consigne que l'exercice précédent, corrigez ce code à l'aide de la fonction isset
 */

$article = array(
    'id' => 23,
    'title' => 'Les souris seraient-elle en réalité maîtres du monde ?',
    'content' => 'Lorem ipsum dolor sit amet, et eliptir consec dei lorem ipsum dolor sit amet et eliptir consec dei ... ',
);
?>
<html lang="fr">
    <head>
        <title>Isset 2</title>
    </head>
    <body>
        <h1><?php echo $article['title'] ?></h1>
        <p>
            <img src="<?php echo $article['thumbnail'] ?>" />
            <?php echo $article['content'] ?>
        </p>
    </body>
</html>