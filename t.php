<?php
$table = [17, -9, -17, -118, 87, -87, 36, 17, 9, 118, -10];
$compter = 0;
$negativetable = [];
$transformedNegatives = [];

for ($i = 0; $i < count($table); $i++) {
    $compter++; 

    if ($table[$i] < 0) {
        $negativetable[] = $table[$i]; 
        $transformedNegatives[] = $table[$i] * -1; 
    }
    else {
        $transformedNegatives[] = $table[$i]; 
    }
}

echo "<h2>Negative table to positive table:</h2>";
for ($i = 0; $i < count($negativetable); $i++) {
    echo "<p>The number {$negativetable[$i]} equal {$transformedNegatives[$i]} as a positive number</p>";
}

echo "<h2>Number Count:</h2>";
$transformedNegatives_counts = array_count_values($transformedNegatives);
foreach ($transformedNegatives_counts as $number => $count) {
    echo "<p>The Number $number is repeated $count Times\n<p>";
}

echo "<h2>This Table Is Not Sort :</h2>";
echo"<p>";
print_r($transformedNegatives);
echo"</p>";

$n=count($transformedNegatives);
for ($i = 0; $i < $n - 1; $i++) {
    $min = $i;
    for ($j = $i + 1; $j < $n; $j++) {
        if ($transformedNegatives[$j] < $transformedNegatives[$min]) {
            $min = $j;
        }
    }
    $tabletrie = $transformedNegatives[$i];
    $transformedNegatives[$i] = $transformedNegatives[$min];
    $transformedNegatives[$min] = $tabletrie;
}

echo "<h2>This Table Is Sort :</h2>";
echo"<p>";
print_r($transformedNegatives);
echo"</p>";
?>
