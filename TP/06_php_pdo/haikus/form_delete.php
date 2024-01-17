<?php 
  // on inclut les fonctions
  require_once('functions.php');
  include('inc/header.php');
  
  $success = false;

  // si un formulaire est soumis...
  if($_POST) {
    // on récupère les valeurs des champs du formulaire pour les passer à la fonction delete_haiku()
    // celle-ci retourne true si la suppression s'est bien passée, false sinon
    if ( delete_haiku( $_POST['haiku_id']) ) {
      $success = true;
      $_POST = null; //on vidange le formulaire une fois enregistré
    }
  }
?>

<h1 class="h2 mb-2">Supprimer un Haiku</h1>

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

  <?php if($success) { ?>
  <div class="alert alert-success my-4" role="alert">
    Votre enregistrement a été supprimé avec succès!<br>
    <a class="btn btn-success mt-2" href="form_select.php">Retour à la liste</a>
  </div>
  <?php } ?>

  <div class="form-group mb-4">
    <label class="form-label" for="haiku_id">Saisir un id de haiku à supprimer :</label>
    <input type="number" id="haiku_id" name="haiku_id" class="input-form" />
  </div>

  <button type="submit" class="btn btn-danger">Supprimer</button>

</form>
<!-- fin du formulaire -->
<?php 
  include 'inc/footer.php';
?>