# Conditions et opérations booléennes

En PHP, les conditions et les opérations booléennes sont utilisées pour prendre des décisions dans votre code en fonction de l'évaluation de certaines expressions.

## Conditions en PHP

Les conditions en PHP sont généralement exprimées à l'aide des structures de contrôle `if`, `else if`, et `else`. Elles vous permettent d'exécuter un bloc de code si une expression conditionnelle est évaluée comme vraie (true), ou un autre bloc de code si elle est évaluée comme fausse (false).

Voici un exemple d'utilisation d'une condition `if` en PHP :

```php
$age = 20;

if ($age >= 18) {
    echo "Vous êtes majeur.";
} else {
    echo "Vous êtes mineur.";
}
```

Dans cet exemple, la condition vérifie si la variable `$age` est supérieure ou égale à 18. Si c'est le cas, le message "Vous êtes majeur" est affiché. Sinon, le message "Vous êtes mineur" est affiché.

## Opérations Booléennes en PHP

Les opérations booléennes sont utilisées pour combiner ou inverser des expressions conditionnelles. Les opérations booléennes courantes en PHP sont les suivantes :

- `&&` (ET logique) : L'opérateur `&&` renvoie vrai (true) si les deux expressions qu'il combine sont vraies.
- `||` (OU logique) : L'opérateur `||` renvoie vrai si au moins l'une des expressions combinées est vraie.
- `!` (NON logique) : L'opérateur `!` inverse le résultat de l'expression, passant de vrai à faux ou de faux à vrai.

Voici un exemple d'utilisation d'opérations booléennes en PHP :

```php
$age = 20;
$estEtudiant = true;

if ($age >= 18 && $estEtudiant) {
    echo "Vous êtes majeur et étudiant.";
} elseif ($age >= 18) {
    echo "Vous êtes majeur mais non étudiant.";
} else {
    echo "Vous êtes mineur.";
}
```

Dans cet exemple, nous utilisons l'opérateur `&&` pour vérifier deux conditions en même temps : si l'âge est supérieur ou égal à 18 et si la personne est étudiante. Si les deux conditions sont vraies, le premier message est affiché. Sinon, nous utilisons un `elseif` pour vérifier si la personne est majeure sans être étudiante. Enfin, si aucune des conditions n'est vraie, le message "Vous êtes mineur" est affiché.

Les opérations booléennes et les conditions sont couramment utilisées pour contrôler le flux d'exécution de votre programme en fonction des données et des circonstances, ce qui les rend essentielles pour la programmation en PHP.
