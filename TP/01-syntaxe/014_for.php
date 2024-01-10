<?php 

/*
  Les boucles permettent de répéter des actions un certain nombre de fois
  Idem qu'en JS
*/
for ($i=0; $i < 10; $i++) { 
  echo $i . '<br>';
}

$commande = array(
  'element 1',
  'element 2',
  'element 3',
  'element 4'
);

$nombre_de_commandes = count($commande);
//$c =  4

for ( $i = 0; $i < $nombre_de_commandes; $i++ ) { 
  echo $commande[ $i ] . '<br>';
}

?>