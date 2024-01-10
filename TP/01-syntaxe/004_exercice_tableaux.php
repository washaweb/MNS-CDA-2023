<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <titl e>Exercice Tableaux</titl>
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
echo '<br>';
echo $vehicule['conducteur']['nom'], ' ', $vehicule['conducteur']['prenom'], '<br>';
print_r($vehicule['conducteur']['permis']);
echo '<br>';
echo $vehicule['finitions']['interieur']['type'];
echo '<br>';
echo $vehicule['finitions']['exterieur']['couleur'];
echo '<br>';
echo 'La puissance du véhicule est de ' . $vehicule['caracteristiques']['puissance'] . ' chevaux.';
echo '<br>';
$y = $vehicule['caracteristiques']['annee'];
echo "L\'Année du véhicule est $y";

?>

</body>

</html>