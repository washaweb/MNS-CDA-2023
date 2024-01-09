<?php 

// les méthodes print_r, var_dump et die sont très utiles pour débugger vos scripts :
$var = array(
	'pomme' => 'cool',
	'autres' => array(
		'poire' => 'cool aussi',
		'courgette' => 'moins cool'
  )
);

// les balises <pre> permettent de formatter correctement le code,
// tous les caractères d'espaces, tabulations, retour à la ligne... sont respectés et affichés
echo '<pre>';
print_r($var); 
echo '</pre>';

echo '<pre>';
var_dump($var); //fonctionne avec tous les types de variables
echo '</pre>';



// mourir avec une dernière parole...
die('Dites à Charlie que j\'ai enterré le trésor près du... haaaa.');

// la fonction die() met fin au script PHP
die();

exit; //ici de même, le programme est interrompu, le prochain code ne sera plus exécuté

echo 'toto';

?>
<h1>pas affiché à cause du exit;</h1>