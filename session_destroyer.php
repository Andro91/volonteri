<?php
    session_start();
    session_unset();
    unset($_SESSION['userid']);
    unset($_SESSION['name']);
    session_destroy();
    header("Location: index.php"); 
    exit;
?>