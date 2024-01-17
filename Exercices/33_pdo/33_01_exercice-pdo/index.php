<?php

    require_once 'connection.php';
    require_once 'functions.php';

    if(isset($_POST['add-client'])) {
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $address = $_POST['address'];
        $zip = $_POST['zip'];
        $city = $_POST['city'];
        addClient($lastname, $firstname, $address, $zip, $city);
    }

?><!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout d'un client</title>
</head>
<body>
    J'ajoute un client.
    <form method="POST" action="#">
        Nom : <input type="text" name="lastname" />
        Prénom : <input type="text" name="firstname" />
        Adresse : <input type="text" name="address" />
        Code postal : <input type="text" name="zip" />
        Ville : <input type="text" name="city" />
        <button type="submit" name="add-client">Ajouter !</button>
    </form>
</body>
</html>