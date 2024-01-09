<?php
/*
  Le tableau suivant contient des noms d'articles (Source : programmation.developpez.com)
 */

$articlesTypes = array(
    'RAD Solution Pack',
    'IBM rend possible le débogage des applications Cloud Node.js',
    'Sortie de Qt Creator 3.5.1',
    'Le premier compilateur C++ fête ses 30 ans',
    'Justice : Le défendeur peut-il examiner le code source d\'un logiciel propriétaire qui l\'incrimine ?'
);

/*
  1. En se basant sur le code HTML ci-dessous, afficher chaque titre d'article dans un élément #article-header

  2. Dans chaque élément div.panel-body, générer un "texte de remplissage" de 50 mots. Exemple : "accordéon accordéon accordéon accordéon..."
 */
?>
<html lang="fr">
    <head>
        <title>Articles</title>
        <style>
            h1 {
                text-align:center;
                margin-bottom: 50px;                
            }
            h2 {
                margin-top:0;
            }
            #articles article {
                width: 600px;
                margin: 10px auto;
                padding:20px;
                border: solid 1px #c1c1c1;
                border-radius: 6px;
            }
        </style>
    </head>
    <body>
        <section id="articles">
            <h1>Articles</h1>
            
            <article>
                <header>
                    <h2>Titre de l'article</h2>
                </header>
                Contenu de l'article
            </article>
            
            <article>
                <header>
                    <h2>Titre de l'article</h2>
                </header>
                Contenu de l'article
            </article>
            
            <article>
                <header>
                    <h2>Titre de l'article</h2>
                </header>
                Contenu de l'article
            </article>
            
        </section>
    </body>
</html>

