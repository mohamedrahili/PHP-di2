<?php

$employes = [
    ["nom" => "Alice", "departement" => "IT", "salaire" => 3500.00, "age" => 30],
    ["nom" => "Bob", "departement" => "RH", "salaire" => 2500.00, "age" => 45],
    ["nom" => "Charlie", "departement" => "IT", "salaire" => 4000.00, "age" => 28],
    ["nom" => "Diane", "departement" => "Compta", "salaire" => 3000.00, "age" => 50],
    ["nom" => "Eve", "departement" => "RH", "salaire" => 2800.00, "age" => 38],
];

// calculer la masse salariale par département
function calculerMasseSalarialeParDepartement($employes) {
    $resultat = [];

    foreach ($employes as $employe) {
        $departement = $employe['departement'];
        $salaire = $employe['salaire'];

        if (!isset($resultat[$departement])) {
            $resultat[$departement] = 0;
        }

        $resultat[$departement] += $salaire;
    }

    return $resultat;
}

// calculer la moyenne d'âge par département
function calculerMoyenneAgeParDepartement($employes) {
    $resultat = [];
    $comptes = [];

    foreach ($employes as $employe) {
        $departement = $employe['departement'];
        $age = $employe['age'];

        if (!isset($resultat[$departement])) {
            $resultat[$departement] = 0;
            $comptes[$departement] = 0;
        }

        $resultat[$departement] += $age;
        $comptes[$departement]++;
    }

    foreach ($resultat as $departement => $sommeAge) {
        $resultat[$departement] = $sommeAge / $comptes[$departement];
    }

    return $resultat;
}

// Test des fonctions
$masseSalariale = calculerMasseSalarialeParDepartement($employes);
$moyenneAge = calculerMoyenneAgeParDepartement($employes);

// Affichage des résultats
echo "Masse salariale par département :\n";
print_r($masseSalariale);

echo "\nMoyenne d'âge par département :\n";
print_r($moyenneAge);

?>
