<?php
$cnx = new PDO('mysql:host=localhost;dbname=todo_list', 'root', '');
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$tasks = null;
$success = null;
$error = null;

// Assuming the tasks ID is passed via the URL (e.g., edit_tasks.php?id=123)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch task details for the given ID
    $stmt = $cnx->prepare("SELECT * FROM tasks WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $tasks = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$tasks) {
        $error = "Task with ID $id not found.";
    }
}

// Update task details if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];

    // Validate priority value
    $valid_priorities = ['Low', 'Medium', 'High'];
    if (!in_array($priority, $valid_priorities)) {
        $error = "Invalid priority value.";
    } else {
        // Update the task in the database
        $sql = "UPDATE tasks SET title = :title, description = :description, deadline = :deadline, priority = :priority, status = :status WHERE id = :id";
        $stmt = $cnx->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':description' => $description,
            ':deadline' => $deadline,
            ':priority' => $priority,
            ':status' => $status
        ]);

        // Set success message
        $success = "Task updated successfully!";
        header("Location: home.php"); 
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit tasks</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: 500;
        }
        input[type="number"],
        input[type="text"],
        input[type="date"]{
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 96%;
        }
        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .error {
            color: #dc3545;
            font-size: 14px;
            text-align: center;
        }
        .success {
            color: #28a745;
            font-size: 14px;
            text-align: center;
        }
        .back-link {
            display: block;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit tasks</h1>
        
        <?php if (isset($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <?php if ($tasks): ?>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?= htmlspecialchars($tasks['id']) ?>">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($tasks['title']) ?>" required>

                <label for="description">Description:</label>
                <input type="text" id="description" name="description" value="<?= htmlspecialchars($tasks['description']) ?>" required>

                <label for="deadline">Deadline:</label>
                <input type="date" id="deadline" name="deadline" value="<?= htmlspecialchars($tasks['deadline']) ?>" required>

                <label for="priority">Priority:</label>
                <select name="priority" id="priority" required>
                    <option <?= $tasks['priority'] == 'Low' ? 'selected' : '' ?>>Low</option>
                    <option <?= $tasks['priority'] == 'Medium' ? 'selected' : '' ?>>Medium</option>
                    <option <?= $tasks['priority'] == 'High' ? 'selected' : '' ?>>High</option>
                </select>

                <label for="status">Status:</label>
                <select name="status" id="status" required>
                <option <?= $tasks['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option <?= $tasks['status'] == 'In Progress' ? 'selected' : '' ?>>Progressing</option>
                <option <?= $tasks['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>

                </select>

                <button type="submit" name="update" class="btn">Update Task</button>
            </form>
            <?php if (isset($success)): ?>
                <p class="success"><?= htmlspecialchars($success) ?></p>
            <?php endif; ?>
        <?php else: ?>
            <p class="error">Task not found. Please check the ID or try again later.</p>
        <?php endif; ?>
        
        <a href="home.php" class="back-link">Back to Home</a>
    </div>
</body>
</html>
