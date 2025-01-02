<?php
////Exercice 1:
$t = [2,7,11,15,9];
function findsum($t, $target){
    $pair = [];
        for ($i = 0; $i < count($t); $i++) {
            for ($j = $i+1; $j < count($t); $j++) {
                if ($t[$i] + $t[$j] == $target) {
                    $pair = [$i, $j];
                }
            }
        }
        return $pair;
}
print_r(findsum($t, 9));
////Exercice 2:
function ispalindrom($str){
        $str1 = strrev($str);
        $str2 = $str1;
        if ($str2 == $str) {
            return true;
            }
            else {
            return false;
            }
}
echo"<br>";
echo ispalindrom("radar");
////Exercice 3:
$a = [2,7,11,15,9];
function plusgrand($a){
    $max = $a[0];
    for ($i = 1; $i < count($a); $i++) {
        if ($a[$i] > $max) {
            $max = $a[$i];
        }
    }    
    return $max;
}
echo"<br>";
echo plusgrand($a);
////Exercice 4:
function charFrequency($str){
    $freq = array();
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if (array_key_exists($char, $freq)) {
            $freq[$char]++;
            }
            else
            {
                $freq[$char] = 1;
            }
    }
    return $freq;
}
$result = charFrequency("Hello World");
echo "<br>";
print_r($result);
?>
