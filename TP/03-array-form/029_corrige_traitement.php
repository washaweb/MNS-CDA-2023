<?php 

if($_POST) {
$nom = $_POST['nom'];
$marque = $_POST['marque'];
$chevaux = $_POST['chevaux'];
$puissance = $_POST['puissance'];
$typeboite = $_POST['typeboite'];

if(empty($nom) ){
  echo "Une erreur est survenue, le champ nom est vide.<br>";
}
if(empty($marque) ){
  echo "Une erreur est survenue, le champ marque est vide.<br>";
}
if(empty($chevaux) ){
  echo "Une erreur est survenue, le champ chevaux est vide.<br>";
}
if(empty($puissance) ){
  echo "Une erreur est survenue, le champ puissance est vide.<br>";
}
if(empty($typeboite) ){
  echo "Une erreur est survenue, le champ typeboite est vide.<br>";
}

if(!empty($nom) && !empty($marque) && !empty($chevaux) && !empty($puissance) && !empty($typeboite) ){
  echo "Le véhicule a bien été ajouté en base de données.<br>";
}
} else {
  echo "Pas de formulaire envoyé.<br>";
}

// --------------------- autre solution ---------------------
echo '<hr>';

// je vérifie que post est bien envoyé
if($_POST) {
  // print_r($_POST);
  // on stocke un boolean pour gérer les cas d'erreur
  $error = false;

  // tant qu'il y a des données dans le POST...
  foreach ($_POST as $key => $value) {
    // je boucle sur chaque donnée, avec sa clé et sa valeur
    // si la valeur ext vide
    if( empty($value) ) {
      echo "Une erreur est survenue, le champ $key est vide.<br>";
    };
    // si error n'est pas à false, je mets la valeur du test (si le champs est vide, passe l'erreur à true)
    if(!$error) $error = empty($value);
  }
  // si erreur est true, çà veut dire que j'ai au moins un champ vide
  if(!$error) {
    echo 'Le véhicule a bien été ajouté en base de données.<br>';
  }
  // si pas de post, j'affiche une erreur
} else {
  echo "Pas de formulaire envoyé.";
}
?>