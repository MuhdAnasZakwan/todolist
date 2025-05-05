<?php
    // Decide page load
    // Start Session (if page include $_SESSION)
    session_start();

    require "includes/functions.php";

    // $_SERVER
    $path = $_SERVER["REQUEST_URI"];

    /*
    Pages Route
    - localhost:1111 -> pages/home.php
    - localhost:1111/login -> pages/login.php
    - localhost:1111/logout -> pages/logout.php
    - localhost:1111/signup -> pages/signup.php

    Action Route
    - localhost:1111/auth/login -> includes/auth/do_login.php
    - localhost:1111/auth/signup -> includes/auth/do_signup.php
    - localhost:1111/task/add -> includes/task/add_task.php
    - localhost:1111/task/delete -> includes/task/delete_task.php
    - localhost:1111/task/update -> includes/task/update_task.php
    */

    switch ($path) {
        default:
            require "pages/home.php";
            break;

        // Pages Route
        case '/login':
            require "pages/login.php";
            break;
        case '/signup':
            require "pages/signup.php";
            break;
        case '/logout':
            require "pages/logout.php";
            break;

        // Action Route
        case '/auth/login':
            require "includes/auth/do_login.php";
            break;
        case '/auth/signup':
            require "includes/auth/do_signup.php";
            break;
        case '/task/add':
            require "includes/task/add_task.php";
            break;
        case '/task/update':
            require "includes/task/update_task.php";
            break;
        case '/task/delete':
            require "includes/task/delete_task.php";
            break;
    }
?>