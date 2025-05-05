<?php
    // Start Session (if page include $_SESSION)
    session_start();

    // Remove session
    unset($_SESSION["user"]);

    // Redirect
    header("Location: /");
    exit;
?>