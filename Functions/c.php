<?php
$table1 = [17, -9, -17, 36, 17, 9, 118];
$table2 = [17, -9, -118, 87, 36, 17, 118, -10];
$table3=[];

foreach ($table2 as $v) {
    if (!in_array($v, $table1)) {
        $table3[] = $v;
    }
}
foreach ($table1 as $v) {
    if (!in_array($v, $table2)) {
        $table3[] = $v;
    }
}

print_r($table3);
echo "<br>"
?>
