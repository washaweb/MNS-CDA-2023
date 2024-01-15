<?php 
  $page = [
    'title' => 'Mon site web dynamique',
    'description' => 'Ma super description'
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
      <li><a href="index.php">Accueil</a></li>
      <li><a href="a-propos.php">À propos</a></li>
      <li><a class="active" href="contact.php">Contact</a></li>
    </ul>

    <?php echo '<pre>';
    print_r($_SERVER);
    echo '</pre>';

     ?>
  </header>