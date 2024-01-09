<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get Type d'une variable</title>
</head>

<body>
  <?php 
    // La fonction gettype() permet d'obtenir le type de la variable passée en paramètre.

    $prenom = 'Johana';
    $nom = 'Dupont';
    $annee_naissance = 1990;
    $poids = 65.5;

    echo 'prenom est de type ' . gettype($prenom) . '<br>';
    echo 'nom est de type ' . gettype($nom) . '<br>';
    echo 'annee_naissance est de type ' . gettype($annee_naissance) . '<br>';
    echo 'poids est de type ' . gettype($poids) . '<br>';
    
  ?>
</body>

</html>