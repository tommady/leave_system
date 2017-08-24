<?php
include("check.php");
include("db.php");

if (isset($_POST["submit"])) {
    if (empty($_POST["leavewhy"]) ||
        empty($_POST["leavetime_start"]) ||
        empty($_POST["leavetime_start_when"]) ||
        empty($_POST["leavetime_end"]) ||
        empty($_POST["leavetime_end_when"])) {
        echo "Fields are required.";
    } else {
        $leavewhy = $_POST['leavewhy'];
        $leavetime_start = $_POST['leavetime_start'];
        $leavetime_start_when = $_POST['leavetime_start_when'];
        $leavetime_end = $_POST['leavetime_end'];
        $leavetime_end_when = $_POST['leavetime_end_when'];
        $leavewhy_txt = $_POST['leavewhy_txt'];

        $leavewhy = stripslashes($leavewhy);
        $leavetime_start = stripslashes($leavetime_start);
        $leavetime_start_when = stripslashes($leavetime_start_when);
        $leavetime_end = stripslashes($leavetime_end);
        $leavetime_end_when = stripslashes($leavetime_end_when);
        $leavewhy_txt = stripslashes($leavewhy_txt);

        $name_db = mysqli_real_escape_string($db, $user_name);
        $leavewhy_db = mysqli_real_escape_string($db, $leavewhy);
        $leavetime_start_db = mysqli_real_escape_string($db, $leavetime_start);
        $leavetime_start_when_db = mysqli_real_escape_string($db, $leavetime_start_when);
        $leavetime_end_db = mysqli_real_escape_string($db, $leavetime_end);
        $leavetime_end_when_db = mysqli_real_escape_string($db, $leavetime_end_when);
        $leavewhy_txt_db = mysqli_real_escape_string($db, $leavewhy_txt);

        $sql = "SELECT vacation FROM vacations WHERE vacation >= '$leavetime_start' && vacation <= '$leavetime_end'";
        $result = mysqli_query($db, $sql);
        $vacations = mysqli_num_rows($result);

        $leavetime_start = date_create($leavetime_start);
        $leavetime_end = date_create($leavetime_end);
        $interval = date_diff($leavetime_start, $leavetime_end);
        $period = $interval->days + 1 - $vacations;

        if ($leavetime_start_when == "afternoon") {
            $period -= 0.5;
        }
        if ($leavetime_end_when == "morning") {
            $period -= 0.5;
        }

        echo "leave why:" . $leavewhy . "<br>";
        echo "leave time start:" . $leavetime_start->format('Y-m-d') . "<br>";
        echo "leave time start when:" . $leavetime_start_when . "<br>";
        echo "leave time end:" . $leavetime_end->format('Y-m-d') . "<br>";
        echo "leave time end when:" . $leavetime_end_when . "<br>";
        echo "leave why txt:" . $leavewhy_txt . "<br>";
        echo "vacations:" . $vacations . "<br>";
        echo "leave interval:" . $period . " days<br>";

        $sql = "INSERT INTO leaves (name, start_time, end_time, period, reason, start_time_when, end_time_when, leave_why) VALUES ('$name_db', '$leavetime_start_db', '$leavetime_end_db', '$period', '$leavewhy_txt_db', '$leavetime_start_when_db', '$leavetime_end_when_db', '$leavewhy_db')";
        if (mysqli_query($db, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($db);
