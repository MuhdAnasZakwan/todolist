<?php
    // Connect to Database
    // 1. database info
    $host = "127.0.0.1";
    $database_name = "todolist";
    $database_user = "root";
    $database_password = "";

    // 2. Connect PHP with MYSQL database
    // PDO (PHP Database Object)
    $database = new PDO("mysql:host=$host;dbname=$database_name", $database_user, $database_password);

    $task_id = $_POST["task_id"];
    $completed = $_POST["completed"];

    if ($completed == 0) {
        // 3.1 - SQL Command(recipe)
        $sql = "UPDATE todos SET completed = 1 WHERE id = :id";
    } else {
        $sql = "UPDATE todos SET completed = 0 WHERE id = :id";
    }

    // 3.2 - prepare SQL query(prep material)
    $query = $database->prepare($sql);
    // 3.3 - execute SQL query(cook)
    $query->execute([
        "id" => $task_id
    ]);

    // Redirect user back to index
    header("Location: /");
    exit;
?>