<?php

class Employe {
    private $_matricule;
    protected $_nom;
    public $prenom;

    public function __construct($matricule, $nom, $prenom) {
        $this->setMatricule($matricule);
        $this->_nom = $nom;
        $this->prenom = $prenom;
    }

    public function getMatricule() {
        return $this->_matricule;
    }

    public function setMatricule($matricule) {
        if ($matricule > 0) {
            $this->_matricule = $matricule;
        } else {
            throw new Exception("Le matricule doit être un nombre positif");
        }
    }

    public function afficherInfo() {
        return "Le Matricule d'employe {$this->_nom} {$this->prenom} est {$this->getMatricule()}";
    }
}

class Manager extends Employe {
    private string $_service;

    public function __construct($matricule, $nom, $prenom, $service) {
        parent::__construct($matricule, $nom, $prenom);
        $this->_service = $service;
    }

    public function afficherInfo() {
        return "Le Matricule d'employe {$this->_nom} {$this->prenom} est {$this->getMatricule()} est sont service est {$this->_service}";
    }
}
$employe1 = new Employe(100, "Mohamed", "Ouahib");
echo $employe1->afficherInfo() . "<br>";

$employe1->setMatricule(200);
echo $employe1->afficherInfo() . "<br>";

?>
