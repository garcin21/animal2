<?php

// Définition d'une interface IAnimal qui obligera toute classe qui l'implémente
// à définir les méthodes faireUnSon() et manger().
interface IAnimal {
    public function faireUnSon();
    public function manger();
}

// Classe abstraite Animal implémentant l'interface IAnimal.
// Cette classe sert de base pour tous les types d'animaux.
abstract class Animal implements IAnimal {
    // Propriété protégée pour stocker le nom de l'animal.
    // Protégée signifie qu'elle est accessible dans les classes dérivées.
    protected $nom;

    // Constructeur pour initialiser l'animal avec un nom.
    public function __construct($nom) {
        $this->nom = $nom;
    }
}

// Classe Lion qui hérite de la classe Animal.
class Lion extends Animal {
    // Implémentation de la méthode faireUnSon spécifique au Lion.
    public function faireUnSon() {
        return "{$this->nom} rugit.";
    }

    // Implémentation de la méthode manger spécifique au Lion.
    // Lance une exception si le lion s'appelle "Simba" et n'a pas faim.
    public function manger() {
        if ($this->nom == "Simba") {
            throw new Exception("Simba n'a pas faim maintenant.");
        }
        return "{$this->nom} mange de la viande.";
    }
}

// Classe Girafe qui hérite de la classe Animal.
class Girafe extends Animal {
    // Implémentation de la méthode faireUnSon spécifique à la Girafe.
    public function faireUnSon() {
        return "{$this->nom} émet des sons doux.";
    }

    // Implémentation de la méthode manger spécifique à la Girafe.
    public function manger() {
        return "{$this->nom} mange des feuilles.";
    }
}

// Classe Elephant qui hérite de la classe Animal.
class Elephant extends Animal {
    // Implémentation de la méthode faireUnSon spécifique à l'Éléphant.
    public function faireUnSon() {
        return "{$this->nom} barrit.";
    }

    // Implémentation de la méthode manger spécifique à l'Éléphant.
    public function manger() {
        return "{$this->nom} mange des branches.";
    }
}

// Fonction principale qui crée des instances de Lion, Girafe, et Éléphant,
// et itère sur ces instances pour afficher leurs comportements.
function main() {
    // Création d'instances de chaque classe d'animaux avec des noms spécifiques.
    $simba = new Lion("Simba");
    $zoe = new Girafe("Zoe");
    $elly = new Elephant("Elly");

    // Stockage des instances dans un tableau pour itération.
    $animaux = array($simba, $zoe, $elly);

    // Boucle pour appeler les méthodes faireUnSon et manger sur chaque animal.
    foreach ($animaux as $animal) {
        echo $animal->faireUnSon() . "\n";  // Affiche le son que l'animal fait.
        try {
            echo $animal->manger() . "\n";  // Tente de faire manger l'animal.
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage() . "\n";  // Gestion des exceptions si elles surviennent.
        }
    }
}

// Appel de la fonction main pour exécuter le code.
main();
?>
