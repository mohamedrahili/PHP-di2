<?php
$movies = [
    ["Movie name" => "War Dogs", "Director" => "Todd Phillips", "Year" => "2016", "Duration" => "114"],
    ["Movie name" => "The Big Short", "Director" => "Adam McKay", "Year" => "2015", "Duration" => "120"],
    ["Movie name" => "The Gentlemen", "Director" => "Guy Ritchie", "Year" => "2020", "Duration" => "130"],
    ["Movie name" => "The Godfather", "Director" => "Francis Ford Coppola", "Year" => "1972", "Duration" => "175"]
];

echo "<table border='1'>
  <tr>
    <th>Movie name</th>
    <th>Director</th>
    <th>Year</th>
    <th>Duration</th>
  </tr>";

$total_duration = 0;  
foreach ($movies as $films) {
    echo "<tr>
      <td>{$films['Movie name']}</td>
      <td>{$films['Director']}</td>
      <td>{$films['Year']}</td>
      <td>{$films['Duration']}</td>
    </tr>";
    $total_duration += $films['Duration'];
}

echo "</table>"; 
$total_hours = floor($total_duration / 60);
$remaining_minutes = $total_duration % 60;

echo "<h2>The total duration is $total_hours hours and $remaining_minutes minutes.</h2>";

function recent_film($movies) {
    $recent = null;
    foreach ($movies as $film) {
        if ($film['Year'] >= 2010) {
            if ($recent === null || $film['Year'] > $recent['Year']) {
                $recent = $film;
            }
        }
    }
    return $recent; 
}

$recent_movie = recent_film($movies);
if ($recent_movie) {
    echo "<h2><br>{$recent_movie['Movie name']} is a new movie produced in {$recent_movie['Year']}</h2>";
}

function old_film($movies) {
    $old = null;
    foreach ($movies as $film) {
        if ($film['Year'] < 2010) {
            if ($old === null || $film['Year'] > $old['Year']) {
                $old = $film;
            }
        }
    }
    return $old; 
}

$old_movie = old_film($movies);
if ($old_movie) {
    echo "<h2><br>{$old_movie['Movie name']} is an old movie produced in {$old_movie['Year']}</h2>";
}
?>
