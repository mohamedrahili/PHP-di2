<?php
$producte=[
   ['id' => 1, 'name' => 'creatine', 'price' => 300, 'stock' => 200],
   ['id' => 2, 'name' => 'whey protein', 'price' => 1000, 'stock' => 100],
   ['id' => 3, 'name' => 'pre-workout', 'price' => 200, 'stock' => 150],
   ['id' => 4, 'name' => 'bcaa', 'price' => 400, 'stock' => 150]
];
$client=[
    ['id' => 1, 'name' => 'Mohamed Ouahib', 'email' => 'mohamedouahib@gmail.com'],
    ['id' => 2, 'name' => 'Dan Lok', 'email' => 'danlok@gmail.com'],
    ['id' => 3, 'name' => 'Eddie Hall', 'email' => 'eddiahall@gmail.com']
];
$commande=[
    [
        'id' => 1,
        'id_client' => 1,
        'id_product' => 1,
        'stock' => 5,
        'date' =>'30/01/2024'
    ],
];
function showproduct($producte){
    foreach ($producte as $product) {
        echo "We have ".$product['stock'] ." item of ". $product['name'] ." that cost ". $product['price'] ."$". '<br>';
        }
}

function addnewproduct($producte,$id,$name,$price,$stock){
   foreach ($producte as $produit) {
    if ($produit['id'] == $id) {
        echo "This product already exist";
        return;
      }
   }
   $producte[] = ['id' => $id, 'name' => $name, 'price' => $price, 'stock' => $stock];
   echo "The product was added\n";
}

function findproduct($producte, $id) {
    foreach ($producte as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null; 
}

function addclient($client,$id,$name,$email){
    foreach ($client as $clients) {
        if ($clients['id'] == $id) {
            echo "This client already exist";
            return;
          }
       }
       $client[]= ['id' => $id, 'name' => $name, 'email' => $email];
       echo "The client was added\n";
}

function passer_commande(&$commande, $id, $id_client, $id_product, $stock, $date) {
    foreach ($commande as $command) {
        if ($command['id'] == $id) {
            echo "This commande already exists";
            return;
        }
    }
    $commande[] = ['id' => $id , 'id_client' => $id_client , 'id_product'=> $id_product, 'stock' => $stock , 'date' => $date];
    echo "Commande was added";
}

function showcommandehestory($commande) {
    foreach ($commande as $command) {
        echo "Client ID: " . $command['id_client'] . " ordered Product ID: " . $command['id_product'] . " with quantity: " . $command['stock'] . " on " . $command['date'] . "<br>";
    }
}

echo showproduct($producte);
echo addnewproduct($producte, 10, 'meet', 200, 150);
echo "<br>";
echo addclient($client, 3, 'Eddie Hall', 'eddiahall@gmail.com');
echo "<br>";
passer_commande($commande, 2, 2, 3, 10, '02/12/2024');
echo "<br>";
echo showcommandehestory($commande);
?>