<?php
    include("check.php");
?>

<!doctype html>
<html>
        <head>
                <meta charset="utf-8">
                <title>Home</title>
        </head>

        <body>
                <h1 class="hello">Hello, <em><?php echo $user_name;?>!</em></h1>
                <br><br><br>
                <a href="logout.php" style="font-size:18px">Logout</a>
                <br><br><br>
                <a href="apply_leave_view.php" style="font-size:18px">Apply Leave</a>
                <br><br><br>
                <a href="list_leaves.php" style="font-size:18px">List Leaves</a>
        </body>
</html>
