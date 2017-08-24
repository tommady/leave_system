<?php
session_start();

if (isset($_SESSION['username'])) {
    header("location: home.php");
}
?>

<!DOCTYPE html>
<html>
        <head>
                <title>Leave System</title>
        </head>

        <body>
                <h1>Leave System Login</h1>
                <h2>Login Form</h2>
                <form action="login.php" method="post">
                        <label>UserName :</label>
                        <input id="name" name="username" placeholder="username" type="text">
                        <label>Password :</label>
                        <input id="password" name="password" placeholder="**********" type="password">
                        <input name="submit" type="submit" value=" Login ">
                </form>
        </body>
</html>
