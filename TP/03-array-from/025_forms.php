<?php
/*
  Le PHP sans formulaires, c'est comme un repas sans fromage.

  Les formulaires HTML peuvent envoyer des `headers` particuliers à des scripts PHP, indiquant une soumission de données
  Considérons un formulaire classique :
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaires</title>
</head>

<body>
  <form action="#" role="form" method="POST">
    Nom : <input type="text" name="nom">
    <br>
    Prénom : <input type="text" name="prenom">
    <br>
    <input type="submit" value="Envoyer">
  </form>

</html>
</body>
<?php
/*
  Une fois qu'on a cliqué sur "Envoyer", les informations du formulaire sont envoyées à la page spécifiée dans
  l'attribut "action" de la balise <form>.

  Si on veut que ce soit la même page qui reçoive les informations, il suffit d'indiquer `action="#"`

  Quand le serveur reçoit des informations issues d'un formulaire, il les place dans des variables superglobales, des tableaux.
  Ces variables sont accessibles depuis tous les scripts PHP qui seront interprétés durant le runtime (temps d'éxécution du module PHP
  avant l'envoi de la réponse au client)

  Deux tableaux sont disponibles dans le script PHP :
 */
$_GET;
$_POST;
/*
  Le serveur fournira un tableau $_GET, si la méthode du formulaire envoyé est `get` (comme dans le cas présent),
  ou un tableau $_POST, si la méthode choisie dans le formulaire HTML est `post`

  Ces deux méthodes ne fonctionnent pas sur le même principe :
  - Pour GET, les données sont envoyées au serveur directement dans l'url, sous la forme `page.php?nom=Polmard&prenom=Yves
  - Pour POST, les données sont envoyées sous forme de headers au serveur, et l'url ne s'en trouve pas modifiée.

  Par convention, lorsqu'on souhaite recevoir des informations du serveur (par exemple, un article de blog), on utilise
  plutôt la méthode `GET` ("obtenir").
  De même, par convention on utilise `POST` pour envoyer des informations à stocker sur le serveur.

  POST ne faisant pas apparaître dans l'URL les informations du formulaire, on utilise cette méthode lorsque les informations
  sont sensibles (mots de passe, etc.)

  A savoir également, concernant la méthode GET :
  - Impossible d'écrire une URL de plus de 2048 caractères : limite la taille des informations qu'on pourrait envoyer
  - Seulement des caractères ASCII
  - L'envoi de données par des formulaires GET est enregistré dans l'historique du navigateur, par défaut


  Depuis le script PHP qui a reçu les informations du formulaire, il faut accéder au tableau $_POST ou $_GET pour obtenir
  les données envoyées par le client.

  Par exemple, dans le cas présent, la page qui reçevra les données pourra accéder au champ 'Prénom' ainsi :
 */
$nom = '';
$prenom = '';

if($_POST && $_POST['nom'] && $_POST['prenom']) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  echo $nom . ' ' . $prenom;
}

/*	
    Les indices des tableaux $_GET et $_POST sont générés en se basant sur les attributs `name` des éléments HTML.

    Ainsi, le champ <input name="nombre" /> sera stocké, en PHP, dans $_POST['nombre'] ou $_GET['nombre']
*/
?>