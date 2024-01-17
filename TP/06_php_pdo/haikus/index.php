<?php 
  // on inclut les fonctions
  require_once('functions.php');
  include('inc/header.php');
  
  $success = false;

  // on définit une catégorie par défaut
  if (!$_POST ) $_POST['category_id'] = 1;

  // si un formulaire est soumis...
  if($_POST) {

    $results = get_haikus_by_category($_POST['category_id']);

    if($results) {
      $success = true;
      
      // echo '<pre>';
      // print_r($results);
      // echo '</pre>';
      
      // on compte le nombre de résultats
      $count = count($results);
      // on sélectionne une ligne aléatoirement dans le tableau
      $random_haiku = $results[rand(0, $count)];
    }
  }
?>
<h1 class="h2 mb-2">Afficher un Haiku</h1>

<form action="" method="POST">

  <!-- gestion des erreurs -->
  <?php if($error){ ?>
  <div class="alert alert-danger my-4" role="alert">
    <?php 
      // affichage des erreurs
      foreach ($errorMessages as $errorMessage) {
        echo $errorMessage .'<br>';
      } ?>
  </div>
  <?php } ?>

  <div class="form-group mb-4">
    <label class="form-label" for="category_id">Sélectionnez une catégorie:</label>
    <?php html_categories('category_id', $_POST ? $_POST['category_id'] : null); //crée le select pour les catégories ?>
  </div>

  <button type="submit" class="btn btn-success">Afficher</button>

</form>
<!-- fin du formulaire -->

<!-- affichage du Haiku -->

<div class="card mt-5">
  <div class="card-body">

    <blockquote class="blockquote mb-0">
      <?php if($success && $random_haiku) {
        echo '<p class="display-4 text-center">'.$random_haiku['content'].'</p>';
        } else {
        echo '<p class="pt-2 mb-0 blockquote-footer">Sélectionnez une catégorie</p>';
      } ?>
    </blockquote>

  </div>
</div>



<?php 
  include 'inc/footer.php';
?>