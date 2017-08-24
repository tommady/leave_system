<?php
session_start();
include("db.php");

if (isset($_POST["submit"])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo "Both fields are required.";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($db, $username);
        $password = mysqli_real_escape_string($db, $password);

        $sql = "SELECT id FROM user WHERE name='$username' and password='$password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            header("location: home.php");
        } else {
            echo "Incorrect username or password.";
        }
    }
}
