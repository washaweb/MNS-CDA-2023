<?php
	/*

		1. Dans le fichier functions.php :
		Créez une fonction `the_content()` qui affiche le contenu d'un
		article, stocké dans la variable $currentArticle (voir le code
		ci-dessous)

		Cette fonction n'acceptera aucun argument.

		Complétez ce script pour afficher une page web simple et
		appelez la fonction `the_content()` au bon endroit.

		2. Créez également la fonction `the_title()` sur le même
		modèle, et appelez-la dans la page.
		Utilisez cette fonction pour changer le titre de la page web.

		3. Les fonctions `the_title()` et `the_content()` sont bien connues pour ceux qui font du dev Wordpress.
		
	 */

	require_once 'functions.php';

	$articles = array(
		0 => array(
			'id'		=> 14,
			'title'		=> 'Pénurie de tic-tacs en Norvège',
			'content'	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque consequuntur culpa unde magni nulla. Nobis error fugiat fuga quod, ex eius natus voluptatem nam, molestiae expedita harum nulla iusto eaque.',
		),
		1 => array(
			'id'		=> 23,
			'title'		=> 'Les carottes sur le banc de touche',
			'content'	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque consequuntur culpa unde magni nulla. Nobis error fugiat fuga quod, ex eius natus voluptatem nam, molestiae expedita harum nulla iusto eaque.',
		),
	);
  
  // l'article courant
	$currentArticle = $articles[1];
	// $GLOBALS['currentArticle'] = $articles[1];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php the_title(); //affiche le titre ?></title>
</head>

<body>
  <!-- affiche le titre entouré d'un titre h1  -->
  <h1><?php the_title();?></h1>
  <?php the_content(); //affiche le contenu entouré d'une paragraphe ?>
</body>

</html>