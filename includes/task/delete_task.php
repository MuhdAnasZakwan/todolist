<?php
    // Connect to Database
    $database = connectToDB();

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
    header("Location: /");
    exit;
?>