//Exercice1:
<?php
$number = [850, -90, 170, -18, 987, -576, 736];
$somme = 0;
for ($i = 0; $i < count($number); $i++) {
    $somme += $number[$i];  
}
echo"<h1>";
print_r($number);
echo"</h1>";
echo "<h1>The total sum is: $somme</h1>";
?>
//Exercice2:
<?php
$number = [85, 9, 17, 1, 98, 576, 36];
$somme = 0;
$newtable = [];
foreach ($number as $num) {
    if ($num > 10) {
        $somme += $num;
        $newtable[] = $num; 
    }
}
echo"</br>";
echo"<h1>";
print_r($newtable);
echo"</h1>";
echo "<h1></br>The total sum of the numbers is: $somme</br></h1>";
?>
//Exercice3:
<?php
$fruit = ["Apple", "Banana", "Apple", "Banana", "Kiwi", "Kiwi", "Apple", "Kiwi", "Apple"];
$fruit_counts = array_count_values($fruit);
foreach ($fruit_counts as $word => $count) {
    echo "<h1>$word: $count\n</h1>";
}
?>
//Exercice4:
<?php
$p = ["Ali", "Aya", "Kamal"];
$a = [19,20,10];
$majeur=[];
$muneur=[];
foreach ($a as $k => $v) {
    if ($a[$k] >= 18) {
        $majeur[] = $v;
    }
}
foreach ($p as $k => $v) {
    if ($a[$k] >= 18) {
        $mineur[] = $v;
    }
}
echo"<h1></br>Age</br></h1>";
echo"<h1>";
print_r($majeur);
echo"</h1>";
echo"<h1></br>Name</br></h1>";
echo"<h1>";
print_r($mineur);
echo"</h1>";
?>
//Exercice5:
<?php
$t = [12, 1, 0, 8];
$n = count($t);

for ($i = 0; $i < $n - 1; $i++) {
    $minIndex = $i;
    for ($j = $i + 1; $j < $n; $j++) {
        if ($t[$j] < $t[$minIndex]) {
            $minIndex = $j;
        }
    }
    $temp = $t[$i];
    $t[$i] = $t[$minIndex];
    $t[$minIndex] = $temp;
}
echo"<h1>";
print_r($t);
echo"</h1>";
?>

