<?php
    // Database info
    $host = "127.0.0.1";
    $database_name = "todolist";
    $database_user = "root";
    $database_password = "";

    // PDO (PHP Database Object)
    $database = new PDO("mysql:host=$host;dbname=$database_name", $database_user, $database_password);

    // Data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check Error
    if ( empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Everything is required";
    } else if ($password !== $confirm_password) {
        echo "Unmatched password";
    } else {
        // Create account
        // SQL Command
        $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password)";
        // Prepare SQL Query
        $query = $database->prepare($sql);
        // Execute SQL Query
        $query->execute([
            "name" => $name,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    // Redirect
    header("Location: login.php");
    exit;
?>