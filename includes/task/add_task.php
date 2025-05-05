<?php
    // Connect to Database
    $database = connectToDB();

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
        header("Location: /");
        exit;
    }
?>