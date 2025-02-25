<?php
$cnx = new PDO('mysql:host=localhost;dbname=todo_list', 'root', '');
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $cnx->prepare("SELECT * FROM tasks WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $stmt = $cnx->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header("Location: home.php");  
        exit;
    } else {
        echo "Task with ID $id not found.";
    }
} else {
    echo "No task ID provided.";
}
?>
