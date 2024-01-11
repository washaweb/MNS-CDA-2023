# Erreurs en PHP

PHP signale des erreurs en reponse à un certaines nombres de conditions d'erreurs internes. Ceux-ci peuvent être utilisés pour indiquer une multitude de problèmes différents, et peuvent être affichées et/ou enregistrées dans l'historique selon les besoins.

Chaque erreur que PHP génère comprend un type. Une liste de ces types d'erreur est disponible, ainsi qu'une brève description de leur comportement et leurs cause possible.

## Gestion des erreurs en PHP

Si aucun gestionnaire d'erreur n'est définit, PHP gèrera les erreurs qui se produise selon sa configuration. Quelles erreurs seront signalées et lesquels seront ignorées sont contrôler par la directive `php.ini` `error_reporting` ou lors de l'exécution du script en appelant `error_reporting()`. Il est toutefois fortement recommandé de configurer la directive, car certaines erreurs peuvent se produire avant que l'exécution du script débute.

**Dans un environnement de développement**, la directive `error_reporting` devrait toujours être configurée avec `E_ALL`, afin d'être informé et corriger les problèmes relevés par PHP. 

**En production** il est possible configurer la directive avec un niveau moins verbeux tel que `E_ALL & ~E_NOTICE & ~E_DEPRECATED`, mais généralement `E_ALL` reste approprié car il peut fournir des avertissements en avance à des problèmes potentiels.

Comment PHP traite ces erreurs dépend de deux directive `php.ini` supplémentaire. `display_errors` détermine si le message d'erreur est affiché dans la sortie du script.

> **Ceci devrait toujours être désactivé dans un environnement de production**, car le message d'erreur peut contenir des informations confidentielles, tel que les mots de passe de base de données. Cependant il est souvent utile d'activer cette directive lors du développement, car ceci assure un signalement immédiat des problèmes.

En plus d'afficher les erreurs, PHP peut enregistrer les erreurs quand la directive `log_errors` est activée. Toutes les erreurs seront alors enregistrées dans le fichier ou syslog défini par `error_log`. Ceci est extrêmement utile dans un environnement de production, car les erreurs qui se produisent seront enregistrées, et des rapports pourront être générés en s'appuyant sur ces erreurs.

> https://www.php.net/manual/fr/language.errors.basics.php
> https://www.php.net/manual/fr/language.errors.php7.php

## Gestion des erreurs de l'utilisateur

L'utilisateur peut aussi définir une gestion des erreurs personnalisée en utilisant le [gestionnaire d'exceptions de php](https://www.php.net/manual/fr/reserved.exceptions.php) ou plus simplement avec une fonction `set_error_handler()` [voir la doc ici](https://www.php.net/manual/fr/function.set-error-handler.php).