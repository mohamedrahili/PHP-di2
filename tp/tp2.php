<?php

interface PaiementInterface {
    public function effectuerPaiement();
}

abstract class Paiement implements PaiementInterface {
    protected float $montant;
    protected string $devise;

    public function __construct(float $montant, string $devise) {
        $this->montant = $montant;
        $this->devise = $devise;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function getDevise() {
        return $this->devise;
    }
}

class PaiementCarteBancaire extends Paiement {
    private string $numeroCarte;
    private string $nomTitulaire;

    public function __construct(float $montant, string $devise, string $numeroCarte, string $nomTitulaire) {
        parent::__construct($montant, $devise);
        $this->numeroCarte = $numeroCarte;
        $this->nomTitulaire = $nomTitulaire;
    }

    public function effectuerPaiement(): void {
        echo "Paiement de {$this->montant} {$this->devise} effectué par carte bancaire (Titulaire : {$this->nomTitulaire}. Numero : {$this->numeroCarte}).<br>";
    }
}

class PaiementPayPal extends Paiement {
    private string $adresseEmail;

    public function __construct(float $montant, string $devise, string $adresseEmail) {
        parent::__construct($montant, $devise);
        $this->adresseEmail = $adresseEmail;
    }

    public function effectuerPaiement() {
        echo "Paiement de {$this->montant} {$this->devise} effectué via PayPal (Email : {$this->adresseEmail}).<br>";
    }
}

class PaiementVirementBancaire extends Paiement {
    private string $iban;
    private string $nomBeneficiaire;

    public function __construct(float $montant, string $devise, string $iban, string $nomBeneficiaire) {
        parent::__construct($montant, $devise);
        $this->iban = $iban;
        $this->nomBeneficiaire = $nomBeneficiaire;
    }

    public function effectuerPaiement() {
        echo "Paiement de {$this->montant} {$this->devise} effectué par virement bancaire (IBAN : {$this->iban}, Bénéficiaire : {$this->nomBeneficiaire}).<br>";
    }
}

function traiterPaiement(PaiementInterface $paiement) {
    $paiement->effectuerPaiement();
}

$paiementCarte = new PaiementCarteBancaire(100.50, 'EUR', '1234567890123456', 'Mohamed');
traiterPaiement($paiementCarte);

$paiementPayPal = new PaiementPayPal(200.75, 'USD', 'user@example.com');
traiterPaiement($paiementPayPal);

$paiementVirement = new PaiementVirementBancaire(300, 'MAD', 'MA6401155500000000054321123', 'Entreprise XYZ');
traiterPaiement($paiementVirement);

?>