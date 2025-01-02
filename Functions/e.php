<?php
$t = [[1, 2], [3, 5, 6]]; 
$s = [];  
$f = [];  

function mohamed($t, &$s, &$f) {
    foreach ($t as $k => $v) {
        if ($k === 1) {
            $sum = array_sum($v);  
            $s[] = [$sum];  
        } else {
            $s[] = $v;
        }
        
        foreach ($v as $a) {
            $f[] = $a;
        }
    }
    return [$s, $f];
}

list($s, $f) = mohamed($t, $s, $f);
echo "<h2>t = ";
print_r($t);  
echo "<h2><br>";

echo "<h2>s = ";
print_r($s);  
echo "</h2><br>";

echo "<h2>f = ";
print_r($f); 
echo "</h2>";
?>

