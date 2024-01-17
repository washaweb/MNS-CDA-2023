<?php
/*
  [Étape 1]
    Utilisez le tableau $colorsObjectsList défini ci-dessous pour produire une table HTML correspondant à ce modèle :

  +---------------+--------------------+
  | Couleurs      | Objets             |
  +---------------+--------------------+
  | Rouge         | Camion de pompiers |
  +---------------+--------------------+
  | Rouge         | Tomates            |
  +---------------+--------------------+
  | Rouge         | Piment rouge       |
  +---------------+--------------------+
  | Jaune         | Canari             |
  +---------------+--------------------+
  | Jaune         | Citron             |
  +---------------+--------------------+
  | Noir          | Corbeau            |
  +---------------+--------------------+
  | Noir          | Ardoise            |
  +---------------+--------------------+
  | Noir          | Encre              |
  +---------------+--------------------+

*/

$colorsObjectsList = [
    0 => [
        'color' => 'Rouge',
        'objects' => [
            'Tomate',
            'Camion de pompiers',
            'Piment rouge',
        ]
    ],
    1 => [
        'color' => 'Jaune',
        'objects' => [
            'Canari',
            'Citron',
        ]
    ],
    2 => [
        'color' => 'Noir',
        'objects' => [
            'Corbeau',
            'Ardoise',
            'Encre',
        ]
    ]
];


/*

  [Étape 2 - Bonus]
    1. Produisez maintenant le tableau ci-dessous (notez que certaines cases sont vides) :
 
  +---------------+--------------------+
  | Couleurs      | Objets             |
  +---------------+--------------------+
  | Rouge         | Camion de pompiers |
  +---------------+--------------------+
  |               | Tomates            |
  +---------------+--------------------+
  |               | Piment rouge       |
  +---------------+--------------------+
  | Jaune         | Canari             |
  +---------------+--------------------+
  |               | Citron             |
  +---------------+--------------------+
  | Noir          | Corbeau            |
  +---------------+--------------------+
  |               | Ardoise            |
  +---------------+--------------------+
  |               | Encre              |
  +---------------+--------------------+


    2. Affichez un message après le tableau : "Il y a 3 objets de couleur 'Rouge', 2 objets de couleur 'Jaune' et 3 objets de couleur 'Noir'"
    Ce message sera construit automatiquement en fonction de la composition du tableau


 */