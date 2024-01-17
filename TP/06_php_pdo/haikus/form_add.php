<?php 
  // on inclut les fonctions
  require_once('functions.php');
  include('inc/header.php');
  
  // traitement du formulaire
  $success = false;

  // si un formulaire est soumis...
  if($_POST) {
    // on récupère les valeurs des champs du formulaire pour les passer à la fonction add_haiku()
    // celle-ci retourne true si l'insertion s'est bien passée, false sinon
    if ( add_haiku( $_POST['content'], $_POST['category_id']) ) {
      $success = true;
      $_POST = null; //on vidange le formulaire une fois enregistré
    }
  }
?>
<h1 class="h2 mb-2">Ajouter un nouvel Haiku</h1>

<!-- début du formulaire -->
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
    Votre enregistrement a été ajouté avec succès!<br>
    <!-- pour recréer un formulaire vide, il suffit de recharger la page sans envoyer le formulaire -->
    <a class="btn btn-success mt-2" href="form_add.php">Ajouter à nouveau</a>
  </div>
  <?php } ?>

  <div class="form-group mb-4">
    <label class="form-label" for="category_id">Sélectionnez une catégorie:</label>
    <?php html_categories('category_id', $_POST ? $_POST['category_id'] : null); //crée le select pour les catégories ?>
  </div>
  <div class="form-group mb-4">
    <label class="form-label" for="content">Votre Haiku :</label>
    <textarea class="form-control" name="content" id="content"
      rows="10"><?php echo $_POST ? $_POST['content'] : '' ?></textarea>
  </div>

  <button type="submit" class="btn btn-success">Ajouter</button>

</form>
<!-- fin du formulaire -->
<?php 
  include 'inc/footer.php';
?>