//exercice 1
<?php
$largeur=20;
$longeur=10;
$surface=$longeur * $largeur;
echo "<h1>la surface de se rectangle est $surface</h1>";
?>
//exercice 2
<?php
$euro=2000;
$taux=$euro * 1.09;
echo "<h1>$euro egale a $taux en dollar</h1>";
?>
//exercice 3
<?php
$age1=20;
$age2=56;
if ( $age1 > $age2)
{
    echo "<h1>Le premier age $age1 est plus grand que le deuxieme age $age2</h1>";
}
else if ( $age1 < $age2)
{
    echo "<h1>Le le deuxieme age $age2 est plus grand que le premier age $age1 </h1>";
}
else {
    echo "<h1>Le premier age $age1 et le deuxieme age $age2 sont  egaux</h1>";
}
?>
//exercice 4
<?php
$motDePasse = 161718;
if ( $motDePasse==161718 )
{
    echo "<h1>Connexion reussie</h1>";
}
else {
    echo "<h1>Mot de passe incorrect</h1>";
}
?>
//exercice 5
<?php
$somme = 0; 

for ($i = 1; $i <= 10; $i++) { 
    $somme += $i; 
}
echo "La somme du nomber de 1 a 10 est: $somme";
?>
//exercice 6
<?php
$i=0;
while($i<=20){
    echo $i . "<br>";
    $i++;
}
?>
//exercice 7
<?php
$fruit = array("Apple", "Banana", "Orange", "Grape", "Strawberry", "Cherry", "Kiwi", "Pineapple", "Melon", "Peach");

echo "<h1>Here's a list of my favorite fruits:</h1>";
echo "<table border='1'>"; 

echo "<tr><th>Fruits</th></tr>"; 

foreach ($fruit as $vitamin) {
    echo "<tr><td>$vitamin</td></tr>"; 
}

echo "</table>"; 
?>
//exercice 8
<?php
$notes = array(8.5, 9, 17, 18, 9);
$somme = array_sum($notes); 
$compter = count($notes); 
$moyenne = $somme / $compter; 

echo "<table border='1'>"; 

echo "<tr><th>Notes</th>"; 
foreach ($notes as $note) {
    echo "<td>$note</td>"; 
}
echo "</tr>";

echo "<tr><th>Average</th><td colspan='" . $compter . "'>" . number_format($moyenne, 2) . "</td></tr>"; 

echo "</table>"; 
?>
//exercice 9
<?php
$people = array(
    array("first_name" => "Mohamed", "last_name" => "Ouahib", "id" => "Bk748648"),
    array("first_name" => "Dan", "last_name" => "Lok", "id" => "Bk748648"),
    array("first_name" => "Bill", "last_name" => "Gates", "id" => "Bk748648")
);

echo "<table border='1'>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>ID</th>
  </tr>";

foreach ($people as $Entrepreneur) {
    echo "<tr>
      <td>{$Entrepreneur['first_name']}</td>
      <td>{$Entrepreneur['last_name']}</td>
      <td>{$Entrepreneur['id']}</td>
    </tr>";
}

echo "</table>";
?>
//exercice 10
<?php
$items = array("Creatine" => 300, "Meat" => 100, "Milk" => 10, "Fish" => 500);
$total = 0;

echo "<table border='1'>
  <tr>
    <th>Item</th>
    <th>Price</th>
  </tr>";

foreach ($items as $item => $price) {
    echo "<tr>
      <td>$item</td>
      <td>$$price</td>
    </tr>";
    $total += $price;
}

echo "<tr>
    <th>Total</th>
    <td>$$total</td>
  </tr>";

echo "</table>";
?>
//exercice 11
<?php
$people = array(
    array("Employee Name" => "Mohamed Ouahib", "poste" => "CEO", "salary" => "Everything"),
    array("Employee Name" => "Dan Lok", "poste" => "Marketing Manager", "salary" => "100000"),
    array("Employee Name" => "Bill Gates", "poste" => "Director", "salary" => "400000")
);

echo "<table border='1'>
  <tr>
    <th>Employee Name</th>
    <th>Poste</th>
    <th>Salary</th>
  </tr>";

foreach ($people as $Employee) {
    echo "<tr>
      <td>{$Employee['Employee Name']}</td>
      <td>{$Employee['poste']}</td>
      <td>{$Employee['salary']}</td>
    </tr>";
}

echo "</table>";
?>
//exercice 12
<?php
$items = array(
    "Creatine" => array("price" => 300, "quantity" => 3),
    "Meat" => array("price" => 100, "quantity" => 5),
    "Milk" => array("price" => 10, "quantity" => 30),
    "Fish" => array("price" => 500, "quantity" => 5)
);

$total = 0;

echo "<table border='1'>
  <tr>
    <th>Item</th>
    <th>Quantity</th>
    <th>Price</th>
  </tr>";

foreach ($items as $item => $details) {
    $price = $details['price'];
    $quantity = $details['quantity'];
    
    echo "<tr>
      <td>$item</td>
      <td>$quantity</td>
      <td>$$price</td>
    </tr>";
    
    $total += $price * $quantity;  
}

echo "<tr>
    <th>Total</th>
    <td colspan='2'>$$total</td> 
  </tr>";

echo "</table>";
?>
