<?php
    // Connect to Database
    $database = connectToDB();

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