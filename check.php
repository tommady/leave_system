<?php
include('connection.php');

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_name = $_SESSION['username'];
