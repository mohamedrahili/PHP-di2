<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=todo_list;charset=utf8';
$user = 'root';
$password = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$pdo = new PDO($dsn, $user, $password, $options);

// Création de la table si elle n'existe pas
$pdo->exec("CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    priority ENUM('Basse', 'Moyenne', 'Haute') NOT NULL,
    deadline DATE NOT NULL,
    status ENUM('En attente', 'En cours', 'Terminée') DEFAULT 'En attente'
)");

// Ajout d'une tâche
if (isset($_POST['add_task'])) {
    $stmt = $pdo->prepare("INSERT INTO tasks (title, description, priority, deadline) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['title'], $_POST['description'], $_POST['priority'], $_POST['deadline']]);
}

// Mise à jour d'une tâche
if (isset($_POST['update_task'])) {
    $stmt = $pdo->prepare("UPDATE tasks SET title=?, description=?, priority=?, deadline=?, status=? WHERE id=?");
    $stmt->execute([$_POST['title'], $_POST['description'], $_POST['priority'], $_POST['deadline'], $_POST['status'], $_POST['id']]);
}

// Suppression d'une tâche
if (isset($_POST['delete_task'])) {
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id=?");
    $stmt->execute([$_POST['id']]);
}

// Récupération des tâches triées
$tasks = $pdo->query("SELECT * FROM tasks ORDER BY FIELD(priority, 'Haute', 'Moyenne', 'Basse'), deadline ASC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
        }
        .task-card {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }
        .btn-primary {
            background: #ff4081;
            border: none;
        }
        .btn-primary:hover {
            background: #f50057;
        }
        .btn-danger {
            background: #d50000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Gestion des Tâches</h1>
        <div class="card p-3 mb-4 task-card">
            <form method="post">
                <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Titre" required>
                </div>
                <div class="mb-3">
                    <textarea name="description" class="form-control" placeholder="Description"></textarea>
                </div>
                <div class="mb-3">
                    <select name="priority" class="form-select">
                        <option value="Basse">Basse</option>
                        <option value="Moyenne">Moyenne</option>
                        <option value="Haute">Haute</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="date" name="deadline" class="form-control" required>
                </div>
                <button type="submit" name="add_task" class="btn btn-primary w-100">Ajouter</button>
            </form>
        </div>
        <h2 class="text-center">Liste des Tâches</h2>
        <?php foreach ($tasks as $task): ?>
            <div class="card task-card mb-3">
                <div class="card-body">
                    <h5 class="card-title"> <?= htmlspecialchars($task['title']) ?> </h5>
                    <p class="card-text"> Priorité : <strong> <?= $task['priority'] ?> </strong></p>
                    <p class="card-text"> Échéance : <?= $task['deadline'] ?> </p>
                    <p class="card-text"> Statut : <?= $task['status'] ?> </p>
                    <form method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?= $task['id'] ?>">
                        <select name="status" class="form-select d-inline w-auto">
                            <option <?= $task['status'] == 'En attente' ? 'selected' : '' ?>>En attente</option>
                            <option <?= $task['status'] == 'En cours' ? 'selected' : '' ?>>En cours</option>
                            <option <?= $task['status'] == 'Terminée' ? 'selected' : '' ?>>Terminée</option>
                        </select>
                        <button type="submit" name="update_task" class="btn btn-success btn-sm">Modifier</button>
                        <button type="submit" name="delete_task" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
