# POO (suite)

## méthode __construct

La méthode `__construct()` dans une classe PHP est un constructeur, une fonction spéciale qui est automatiquement appelée lorsqu'un nouvel objet est créé à partir d'une classe. Son principal objectif est d'initialiser les propriétés de l'objet ou d'exécuter toute autre configuration nécessaire lors de la création de l'objet.

Voici quelques points clés concernant la méthode `__construct()` :

1. **Nom du Constructeur** : Le nom `__construct()` est un nom magique en PHP pour les constructeurs. Avant PHP 5, les constructeurs avaient le même nom que la classe, mais cette pratique est désormais obsolète.

2. **Initialisation des Propriétés** : Le constructeur est souvent utilisé pour passer des valeurs aux propriétés de l'objet lors de sa création.

3. **Exécution Automatique** : Le constructeur est automatiquement appelé sans que vous ayez besoin de l'appeler explicitement, dès qu'un nouvel objet est créé.

4. **Paramètres** : Le constructeur peut avoir des paramètres, ce qui vous permet de personnaliser l'initialisation de l'objet.

Voici un exemple simple :

```php
class Personne {
    public $nom;
    public $age;

    public function __construct($nom, $age) {
        $this->nom = $nom;
        $this->age = $age;
    }

    public function afficherInfos() {
        echo "Nom : " . $this->nom . ", Age : " . $this->age;
    }
}

$personne = new Personne("Alice", 30);
$personne->afficherInfos(); // Affiche : Nom : Alice, Age : 30
```

Dans cet exemple :

- La classe `Personne` a un constructeur qui prend deux paramètres : `$nom` et `$age`.
- Lorsqu'un nouvel objet `Personne` est créé, le constructeur est appelé avec les valeurs fournies (`"Alice"` et `30`).
- Le constructeur initialise les propriétés de l'objet avec ces valeurs.

Utiliser des constructeurs pour l'initialisation des objets rend votre code plus propre, plus lisible et mieux organisé.

## L'héritage des classes

L'héritage est un concept fondamental de la programmation orientée objet. Il permet à une classe (appelée classe enfant) d'hériter des propriétés et méthodes d'une autre classe (appelée classe parent). Cela facilite la réutilisation du code et améliore la structure du programme.

Voici un exemple simple pour illustrer l'héritage en PHP :

### Classe Parent

Imaginons une classe de base nommée `Vehicule`. Cette classe a des propriétés communes à tous les véhicules, comme le nombre de roues et une méthode pour afficher ces informations.

```php
class Vehicule {
    protected $roues;

    public function __construct($nbRoues) {
        $this->roues = $nbRoues;
    }

    public function afficherInfos() {
        echo "Ce véhicule a " . $this->roues . " roues.";
    }
}
```

### Classe Enfant

Maintenant, créons une classe `Voiture` qui hérite de la classe `Vehicule`. La classe `Voiture` aura toutes les propriétés et méthodes de `Vehicule`, et on peut y ajouter des propriétés et méthodes spécifiques à `Voiture`.

```php
class Voiture extends Vehicule {
    private $marque;

    public function __construct($marque) {
        parent::__construct(4); // Appel du constructeur du parent
        $this->marque = $marque;
    }

    public function afficherMarque() {
        echo "La marque de la voiture est " . $this->marque . ".";
    }
}
```

### Utilisation

Créons une instance de `Voiture` et utilisons ses méthodes, y compris celles héritées de `Vehicule`.

```php
$maVoiture = new Voiture("Toyota");
$maVoiture->afficherInfos(); // Affiche : Ce véhicule a 4 roues.
$maVoiture->afficherMarque(); // Affiche : La marque de la voiture est Toyota.
```

Dans cet exemple :

- `Vehicule` est la classe parent. Elle a une propriété (`$roues`) et une méthode (`afficherInfos()`).
- `Voiture` est la classe enfant qui hérite de `Vehicule`. Elle a sa propre propriété (`$marque`) et méthode (`afficherMarque()`), et elle utilise également la propriété et la méthode de `Vehicule`.
- Lorsque nous créons un objet `Voiture`, il a accès aux méthodes de la classe parent `Vehicule` (comme `afficherInfos()`) en plus de ses propres méthodes.

L'héritage permet donc de construire des structures de classes hiérarchiques, rendant le code plus organisé, réutilisable et facile à maintenir.
