<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire voiture</title>
</head>

<body>
  <form action="029_corrige_traitement.php" method="POST">
    <p>
      <label for="nom">Nom du véhicule</label>
      <input type="text" name="nom" id="nom">
    </p>
    <p>
      <label for="marque">Marque du véhicule</label>
      <select name="marque" id="marque">
        <option value="">Choisissez...</option>
        <option value="renault">Renault</option>
        <option value="peugeot">Peugeot</option>
        <option value="tesla">Tesla</option>
        <option value="citroen">Citroën</option>
        <option value="volvo">Volvo</option>
      </select>
    </p>
    <p>
      <label for="chevaux">Chevaux du véhicule</label>
      <input type="number" name="chevaux" id="chevaux">
    </p>
    <p>
      <label for="puissance">Puissnace du véhicule</label>
      <input type="number" name="puissance" id="puissance">
    </p>
    <p>
      <label for="typeboite">Type de boite du véhicule</label>
      <select name="typeboite" id="typeboite">
        <option value="">Choisissez...</option>
        <option value="auto">Automatique</option>
        <option value="manu">Manuelle</option>
      </select>
    </p>
    <p>
      <button type="submit">Envoyer</button>
    </p>
  </form>
</body>

</html>