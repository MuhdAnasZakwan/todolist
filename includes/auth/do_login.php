<?php
    $database = connectToDB();
 
    // Data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check Error
    if ( empty($email) || empty($password)) {
        echo "Everything is required";
    } else {
        // Get data by email
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

        // If Fetch Empty
        if ($user) {
            // Check Password
            if (password_verify($password, $user["password"])) {
                $_SESSION["user"] = $user; // Store data in session

                // Redirect
                header("Location: /");
                exit;
            } else {
                echo "Wrong password";
            }
        } else {
            echo "Sign up first lah";
        }
    }
?>