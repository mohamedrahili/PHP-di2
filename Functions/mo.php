<?php
$price = [850, -90, 170, -18, 987, -576, 736];
$somme = 0;
$compter = 0;
$max = $price[0];
$min = $price[0];
$positiveNumbers = [];
$negativeNumbers = [];
$transformedNegatives = [];

for ($i = 0; $i < count($price); $i++) {
    $somme += $price[$i]; 
    $compter++; 

    if ($price[$i] > $max) {
        $max = $price[$i]; 
    }

    if ($price[$i] < $min) {
        $min = $price[$i]; 
    }
    if ($price[$i] >= 0) {
        $positiveNumbers[] = $price[$i]; 
    } else {
        $negativeNumbers[] = $price[$i]; 
        $transformedNegatives[] = abs($price[$i]); 
    }
}

$average = $somme / $compter;
echo "<h1>The number of prices is: $compter</h1>";
echo "<h1>The total price is: $somme</h1>";
echo "<h1>The biggest price is: $max</h1>";
echo "<h1>The lowest price is: $min</h1>";
echo "<h1>The average price is: $average</h1>";

echo"<h2>The Positive number are:</h2><br>";
foreach ($positiveNumbers as $positive) {
    echo "<p>$positive</p>";
}

echo"<h2>The Negative number are:</h2><br>";
foreach ($negativeNumbers as $negative) {

    echo "<p>$negative</p>";
}

echo "<h2>Negative numbers to positive numbers:</h2>";
for ($i = 0; $i < count($negativeNumbers); $i++) {
    echo "<p>Negative number: {$negativeNumbers[$i]} becomes positive: {$transformedNegatives[$i]}</p>";
}
?>
