<?php

/*
  Meme consigne que précédemment, corrigez le code à l'aide de la fonction isset()
 */


$couleursFruits = array(
    'rouge' => 'tomate',
    'jaune' => 'citron',
    'orange' => 'orange',
);

$fruitsEnStock = array(
    'pomme' => 12,
    'poire' => 12,
    'citron' => 4,
    'cerise' => 30,
    'tomate' => 6,
    'pêche' => 5,
);

foreach ($couleursFruits as $couleur => $fruit) {
    echo 'Le fruit ' . $fruit . ' est généralement ' . $couleur . '.<br>';
    echo 'Il se trouve que j\'en ai ' . $fruitsEnStock[$fruit] . ' en stock.<br><br>';
}
