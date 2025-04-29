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

    // data from input
    $task_id = $_POST["task_id"];

    // 3. Delete student name to table
    // 3.1 - SQL Command(recipe)
    $sql = "DELETE FROM todos WHERE id = :id";
    // 3.2 - prepare SQL query(prep material)
    $query = $database->prepare($sql);
    // 3.3 - execute SQL query(cook)
    $query->execute([
        "id" => $task_id
    ]);

    // Redirect user back to index
    header("Location: index.php");
    exit;
?>