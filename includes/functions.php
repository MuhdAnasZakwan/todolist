<?php
    // Connect to Database
    function connectToDB () {
        // Database info
        $host = "127.0.0.1";
        $database_name = "todolist";
        $database_user = "root";
        $database_password = "";
    
        // PDO (PHP Database Object)
        $database = new PDO("mysql:host=$host;dbname=$database_name", $database_user, $database_password);
        

        return $database;
    };
?>