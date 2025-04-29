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
    $label_name = $_POST["label_name"];

    // Check empty
    if (empty($label_name)) {
        echo "Please fill up the task name";
    } else {
        // 3. Add student name to table
        // 3.1 - SQL Command(recipe)
        $sql = "INSERT INTO todos (`label`) VALUES (:label)";
        // 3.2 - prepare SQL query(prep material)
        $query = $database->prepare($sql);
        // 3.3 - execute SQL query(cook)
        $query->execute([
            "label" => $label_name
        ]);

        // Redirect user back to index
        header("Location: index.php");
        exit;
    }
?>