<?php
    include 'header.php';
    session_destroy();
    session_start();
    header('location:login1.php');
    exit();
?>