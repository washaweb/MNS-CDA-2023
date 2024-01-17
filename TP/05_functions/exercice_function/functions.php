<?php 

// Écrire vos fonction ici, the_title() the_content()

function the_title() {
  global $currentArticle;
	echo $currentArticle['title'];
}

function the_content() {
  global $currentArticle;
  echo '<p>' . $currentArticle['content'] .'</p>';
}