<?php
$e = [2, 3, 4, 1];

function find($n, $e) {
    foreach ($e as $v) {
        if ($n == $v) { 
            return true;
        }
        else{
            return false;
        }
    }
}
print(find(2, $e) ? "true" : "false");
    
function sum($e) {
 $s = 0;
    foreach ($e as $v) {
        $s += $v; 
    }
    return $s;
}

echo "<h2>Sum of elements: " . sum($e) . "</br></h2>"; 

function avreg($e) {
    $s = sum($e); 
    $m = count($e);
    $avreg=$s/$m;
        return $avreg ;
}

echo "<h2>The average of elements: " . avreg($e) . "</br></h2>"; 

function reverse($e) {
    $reversed = [];
    for ($i = count($e) - 1; $i >= 0; $i--) {
        $reversed[] = $e[$i];
    }
    return $reversed;
}

echo "<h2>The reverse version of the table:</h2></br>"; 
print_r(reverse($e));

$e = [2, 3, 4, 1];
$t = 0; 
$sum = function ($e) use ($t) {
    foreach ($e as $v) {
        $t += $v; 
    }
    return $t;
};

echo "<h2><br>The sum of the numbers is: " . $sum($e)."</h2>"; 

?>