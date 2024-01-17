<?php

// Utiliser maintenant une requete préparée :
// $prep->bindValue(2, $lastname); pour lier les paramètres à la requête

function addClient($lastname, $firstname, $adresseRue, $adresseCp, $adresseVille) {
    global $pdo;

    $query = "INSERT INTO client(lastname, firstname, adresse_rue, adresse_cp, adresse_ville) VALUES('$lastname', '$firstname', '$adresseRue', '$adresseCp', '$adresseVille')";

    $pdo->exec($query);
}