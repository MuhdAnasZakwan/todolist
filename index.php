<?php
    // Decide page load
    // Start Session (if page include $_SESSION)
    session_start();

    // $_SERVER
    $path = $_SERVER["REQUEST_URI"];
    var_dump($path);

    if ($path == "/login") {
        require "login.php";
    } else if ($path == "/signup") {
        require "signup.php";
    } else if ($path == "/logout") {
        require "signup.php";
    } else {
        require "home.php";
    }
?>