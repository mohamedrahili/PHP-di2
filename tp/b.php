<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $libble = $_POST['libble'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $total = $price * $quantity;

    echo "POST: <br>";
    echo "Libble: $libble<br>";
    echo "Price: $price<br>";
    echo "Quantity: $quantity<br>";
    echo "Total Cost: $total";
}
else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $libble = $_GET['libble'];
    $price = $_GET['price'];
    $quantity = $_GET['quantity'];

    $total = $price * $quantity;

    echo "Get: <br>";
    echo "Libble: $libble<br>";
    echo "Price: $price<br>";
    echo "Quantity: $quantity<br>";
    echo "Total Cost: $total";
}
else {
    echo "Invalid request method.";
}
?>
