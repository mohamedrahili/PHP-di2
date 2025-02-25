<?php
$dsn = 'mysql:host=localhost;dbname=todo_list;charset=utf8';
$user = 'root';
$password = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_task'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $priority = trim($_POST['priority']); // Trim to avoid leading/trailing spaces
    $deadline = trim($_POST['deadline']);

    // Validate that all required fields are filled
    if (!empty($title) && !empty($priority) && !empty($deadline)) {
        // Normalize the priority value
        $valid_priorities = ['Low', 'Medium', 'High'];
        if (!in_array(ucfirst(strtolower($priority)), $valid_priorities)) { // Normalize input to match the array
            echo "Invalid priority selected.";
        } else {
            // Prepare and execute the insert query
            $stmt = $pdo->prepare("INSERT INTO tasks (title, description, priority, deadline) VALUES (?, ?, ?, ?)");

            if ($stmt->execute([$title, $description, $priority, $deadline])) {
                header("Location: home.php?success=" . urlencode("Task added successfully"));
                exit();
            } else {
                echo "Error: Unable to add task.";
            }
        }
    } else {
        echo "All fields are required!";
    }
}
?>
