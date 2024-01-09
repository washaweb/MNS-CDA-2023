<?php

	/*
	
	Vous devez creer une page web présentant les caractéristiques d'un personnage imaginaire,
	issu d'un jeu de role.

	Les informations du personnage seront enregistrees dans des variables.

	On y trouvera :

	- Une image d'avatar
	- Le nom (dans une variable)
	- Le prénom (dans une variable)
	- Un tableau de caractéristiques (dans une variable, on utilisera un tableau associatif)


	*/

<?php

$vehicule = [
	'conducteur' => [
		'nom' => 'John',
		'prenom' => 'Doe',
		'permis' => ['B', 'A'],
	],
	'caracteristiques' => [
		'couleur' => 'rouge',
		'annee' => 2020,
		'puissance' => 4,
	],
	'finitions' => [
		'interieur' => [
			'type' => 'cuir',
			'couleur' => 'brun'
		],
		'exterieur' => [
			'attache_remorque' => true,
			'couleur' => 'rouge',
			'vitres' => 'teintées',
		],
	],
];

/*
À l'aide des commandes echo et print_r, affichez les caractéristiques suivantes du véhicule :

- nom et prénom du conducteur
- Tous les permis du conducteurs
- type de finition intérieur
- couleur de finition extérieure
- puissance et année du véhicule
*/