<?php

// Définition d'une interface IAnimal qui obligera toute classe qui l'implémente
// à définir les méthodes faireUnSon() et manger().
interface IAnimal {
    public function faireUnSon();
    public function manger();
}

// Classe abstraite Animal implémentant l'interface IAnimal.
abstract class Animal implements IAnimal {
    protected $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }
}

class Lion extends Animal {
    public function faireUnSon() {
        return "{$this->nom} rugit.";
    }

    public function manger() {
        if ($this->nom == "Simba") {
            throw new Exception("Simba n'a pas faim maintenant.");
        }
        return "{$this->nom} mange de la viande.";
    }
}

class Girafe extends Animal {
    public function faireUnSon() {
        return "{$this->nom} émet des sons doux.";
    }

    public function manger() {
        return "{$this->nom} mange des feuilles.";
    }
}

class Elephant extends Animal {
    public function faireUnSon() {
        return "{$this->nom} barrit.";
    }

    public function manger() {
        return "{$this->nom} mange des branches.";
    }
}

// Classe Autruche qui hérite de la classe Animal.
class Autruche extends Animal {
    public function faireUnSon() {
        return "{$this->nom} émet un bruit de sifflement.";
    }

    public function manger() {
        return "{$this->nom} picore des vers dans la terre.";
    }

    // Méthode spécifique à l'Autruche
    public function courir() {
        return "{$this->nom} court rapidement.";
    }

    public function picorer() {
        return "{$this->nom} picore des vers dans la terre.";
    }
}

// Fonction principale qui crée des instances de chaque animal et affiche leurs comportements.
function main() {
    $simba = new Lion("Simba");
    $zoe = new Girafe("Zoe");
    $elly = new Elephant("Elly");
    $olga = new Autruche("Olga");

    $animaux = array($simba, $zoe, $elly, $olga);

    foreach ($animaux as $animal) {
        echo $animal->faireUnSon() . "\n";
        try {
            echo $animal->manger() . "\n";
            if ($animal instanceof Autruche) {
                echo $animal->courir() . "\n";
                echo $animal->picorer() . "\n";
            }
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage() . "\n";
        }
    }
}

main();
?>
