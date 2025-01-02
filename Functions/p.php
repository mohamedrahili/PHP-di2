<?php
$tnote = ["English" => 12, "Russian" => 8, "Arabic" => 9, "French" => 0];
$somme = 0;
$count = count($tnote);
$notemax = max($tnote);
$notemin = min($tnote);
foreach ($tnote as $note) {
  $somme += $note;
  if ($note > $notemax) {
    $notemax = $note;
  }
  if ($note < $notemin) {
    $notemin = $note;
  }
}
$average = $somme / $count;
$valid=0;
$invalid=0;
echo "<h1>The average mark is: $average</h1>";
echo "<h1>The highest mark is: $notemax</h1>";
echo "<h1>The lowest mark is: $notemin</h1>";
foreach ($tnote as $subject => $mark) {
  if ($mark >= 10) {
    $valid++;
  } else {
    $invalid++;
  }
}
echo "<h1>The number of valid subject is $valid</h1>";
echo "<h1>The number of invalid subject is $invalid</h1>";
echo"<hr>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$mohamed = ["first_name" => "Mohamed", "last_name" => "Ouahib", "age" => 18];
$dan = ["first_name" => "Dan", "last_name" => "Lok", "age" => 40];
$bill = ["first_name" => "Bill", "last_name" => "Gates", "age" => 58];
$people = [$mohamed, $dan, $bill];
$youngest = $people[0]; 
$oldest = $people[0]; 
foreach ($people as $person) {
  if ($person["age"] < $youngest["age"]) {
    $youngest = $person;
  }
  if ($person["age"] > $oldest["age"]) {
    $oldest = $person;
  }
}
echo "<h1>The Youngest one is {$youngest['first_name']} {$youngest['last_name']} with age {$youngest['age']}</h1>";
echo "<h1>The Oldest one is {$oldest['first_name']} {$oldest['last_name']} with age {$oldest['age']}</h1>";
?>
