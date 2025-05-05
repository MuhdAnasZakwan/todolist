<?php
    // Remove session
    unset($_SESSION["user"]);

    // Redirect
    header("Location: /");
    exit;
?>