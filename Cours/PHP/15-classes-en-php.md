# POO en PHP

## Déclaration d'une classe

Les classes en PHP sont fondamentales pour la programmation orientée objet (POO). Une classe est un modèle qui définit la structure et le comportement des objets que vous pouvez créer à partir de cette classe. Voici un aperçu des concepts clés liés aux classes en PHP :

1. **Définition d'une classe** : Pour définir une classe en PHP, utilisez le mot-clé `class`, suivi du nom de la classe. Par exemple :
   
   ```php
   class Personne {
       // Propriétés et méthodes seront définies ici
   }
   ```

2. **Propriétés** : Les propriétés d'une classe sont des variables qui stockent des données spécifiques à chaque objet créé à partir de cette classe. Vous pouvez déclarer les propriétés à l'intérieur de la classe. Par exemple :

   ```php
   class Personne {
       public $nom;
       public $age;
   }
   ```

3. **Méthodes** : Les méthodes sont des fonctions définies à l'intérieur de la classe. Elles représentent le comportement de l'objet. Par exemple :

```php
   class Personne {
       public $nom;
       public $age;

       public function afficherInfos() {
           echo "Nom : " . $this->nom . ", Age : " . $this->age;
       }
   }
```

4. **Instanciation d'objets** : Pour créer un objet à partir d'une classe, utilisez l'opérateur `new`. Par exemple :

   ```php
   $personne1 = new Personne();
   ```

5. **Accès aux propriétés et aux méthodes** : Vous pouvez accéder aux propriétés et aux méthodes d'un objet en utilisant l'opérateur `->`. Par exemple :

   ```php
   $personne1->nom = "Alice";
   $personne1->age = 30;
   $personne1->afficherInfos();
   ```

6. **Constructeur** : Vous pouvez définir un constructeur en PHP pour initialiser les propriétés lors de la création d'un objet. Le constructeur a le nom `__construct`. Par exemple :

   ```php
   class Personne {
       public $nom;
       public $age;

       public function __construct($nom, $age) {
           $this->nom = $nom;
           $this->age = $age;
       }
   }
   ```

Les classes en PHP permettent d'organiser le code de manière modulaire, de créer des objets réutilisables et d'appliquer des concepts de la programmation orientée objet tels que l'encapsulation, l'abstraction, l'héritage et le polymorphisme.

## La portée des variables dans une classe

- Les variables déclarées dans une classe sont accessibles par tous les membres (propriétés et méthodes) de la classe. **Leur portée est donc la classe entière**.
- Le mot-clé `$this` fait référence à l'instance courante de la classe. Il permet d'accéder aux propriétés et méthodes de l'objet courant depuis l'intérieur de la classe.

```php
class Voiture {

  public $marque;

  public function démarrer() {
    $this->marque = "Toyota"; 
    // ici on accède à $marque qui se trouve dans la même classe Voiture
  }

}

$voiture1 = new Voiture();
$voiture1->démarrer();
// après avoir instantié la classe, on peut accéder à la variable $marque:
echo $voiture1->marque; // affiche "Toyota"
```

Le mot-clé `$this` permet aussi d'appeler une méthode de la classe depuis une autre méthode.

```php
class Voiture {
  public function démarrer() {
    // on appelle la méthode faireBruitMoteur de la même classe
    $this->faireBruitMoteur(); 
  }

  private function faireBruitMoteur() {
    // code pour faire du bruit
  }
}
```

## Fonctions privées, publiques et statiques

### public

Les fonctions publiques sont accessibles partout, à l'intérieur et à l'extérieur de la classe. Par défaut, les fonctions définies dans une classe PHP sont publiques. On peut aussi utiliser le mot-clé `public` pour les déclarer explicitement :

```php
class MaClasse {

  public function maFonctionPublique() {
    // code de la fonction 
  }

}
```

### private

Les fonctions privées en PHP sont des fonctions qui ne peuvent être appelées qu'à l'intérieur de la classe où elles sont définies. Elles ne sont pas accessibles de l'extérieur de la classe. Pour déclarer une fonction privée, on utilise le mot-clé `private` :

```php
class MaClasse {

  private function maFonctionPrivee() {
    // code de la fonction
  }

}
```

Pour appeler `maFonctionPrivee()`, il faut le faire à l'intérieur de la classe `MaClasse`.

Par contre on peut appeler `maFonctionPublique()` de n'importe où dans le code.

```php

class MaClasse {

  private function maFonctionPrivee() {
    // code de la fonction
  }

  // ici la méthode publique peut faire référénce à la fonction privée car elles font parties de la même classe
  public function maFonctionPublique(){
    $this->maFonctionPrivee();
  }
}

$instance = new maClasse();

$instance->maFonctionPrivee(); //<-- ici génère une erreur car la fonction est privée
$instance->maFonctionPublique(); // ici ça fonctionne car on appelle une fonction publique qui appelle la fonction privée

```

### protected

Les Fonctions protégées (`protected`) : Ces méthodes sont accessibles à l'intérieur de la classe **et par les classes qui en héritent**. 
Elles ne sont pas accessibles directement depuis l'extérieur de la classe.

```php
class Exemple {
    protected function methodeProtegee() {
        echo "Je suis accessible dans la classe et ses sous-classes.";
    }
}

class SousClasse extends Exemple {
    public function tester() {
        $this->methodeProtegee(); // Valide
    }
}

$obj = new SousClasse();
$obj->tester(); // Valide

$obj->methodeProtegee(); //non valide car protected
```

### static

Une méthode statique peut être appelée **sans créer une instance de la classe**. 
Elle est accessible en utilisant le nom de la classe suivi de l'opérateur de résolution de portée `::`.

```php
class MaClasse {

  public static function maFonctionStatique() {
    // code de la fonction
  }

}
// pour appeler une fonction statique, pas besoin d'instantier une classe (avec le mot clé new), mais la syntaxe est différente :
MaClasse::maFonctionStatique();
```
