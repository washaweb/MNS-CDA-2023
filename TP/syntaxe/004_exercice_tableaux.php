<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercice Tableaux</title>
</head>

<body>
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


?>

</body>

</html>