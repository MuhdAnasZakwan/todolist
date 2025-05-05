<?php
    $database = connectToDB();

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
        // Check Exist
        // SQL Command
        $sql = "SELECT * FROM users WHERE email = :email";
        // Prepare SQL Query
        $query = $database->prepare($sql);
        // Execute SQL Query
        $query->execute([
            "email" => $email
        ]);
        // Fetch (only to get data first row only)
        $user = $query->fetch();
        if ($user) {
            echo "Already sign in lah";
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
            // Redirect
            header("Location: /login");
            exit;
        }
    }
?>