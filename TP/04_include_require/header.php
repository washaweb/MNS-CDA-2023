<?php 
  $page = [
    'title' => 'Mon site web dynamique',
    'description' => 'Ma super description',
    'nav' => [
      'index.php' => 'Accueil',
      'a-propos.php' => 'A Propos',
      'contact.php' => 'Contact',
      // compléter ce tableau avec les liens vers les autres pages de votre site
    ],
    'current' => basename($_SERVER['PHP_SELF']),
  ];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page['title']; ?></title>
  <meta name="description" content="<?= $page['description']; ?>">

  <style>
  .active {
    color: red;
  }
  </style>
</head>

<body>
  <header>
    <h1><?= $page['title']; ?></h1>

    <ul class="menu">
      <!-- remplacer ces li, par du code php qui affiche les liens de navigation, utiliser une condition pour tester si on est sur la page courante, dans ce cas, ajouter la classe active -->
      <?php 
        foreach ($page['nav'] as $key => $value) {
          // exemple 1
          /*
           $active ='';
          if($key === $page['current']) {
             $active = ' class="active"';
          }
          echo '<li><a'.$active.' href="'. $key. '">'. $value. '</a></li>';
          */
          
          // exemple 2
          echo '<li><a'.($key === $page['current'] ? ' class="active"':'').' href="'. $key. '">'. $value. '</a></li>';
        }
      ?>
      <!-- <li><a href="index.php">Accueil</a></li>
      <li><a href="a-propos.php">À propos</a></li>
      <li><a class="active" href="contact.php">Contact</a></li> -->
    </ul>
  </header>