<?php

/*
  Il est possible de spécifier un fetch
  mode par défaut, avec la méthode
  PDO::setAttribute.

 */

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// Par défaut, notre PDO nous renverra des tableaux
// associatifs.

/*
    Premier paramètre : 
    PDO::ATTR_DEFAULT_FETCH_MODE
            C'est une constante qui signifie que
            l'on souhaite changer la "configuration"
            de PDO

    Deuxième :

    C'est le fetch mode.
    Il en existe de nombreux : http://php.net/manual/fr/pdostatement.fetch.php

    Les principaux sont

    PDO::FETCH_OBJ
            Qui renvoie des objets anonymes
            (sans classe)

    PDO::FETCH_CLASS et
    PDO::FETCH_INTO
            Placent les résultats dans des objets
            d'une classe qu'on spécifiera

    PDO::FETCH_ASSOC
            Renverra des tableaux associatifs

    PDO::FETCH_BOTH
            Renverra des tableaux combinés
            (associatifs et numériques)


    On utilisera le mode le plus adapté
    en fonction de ce que l'on souhaite
    faire de nos données.

 */