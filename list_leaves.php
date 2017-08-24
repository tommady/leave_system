<?php
    include("check.php");
    include("db.php");
?>

<!doctype html>
<html>
        <head>
                <meta charset="utf-8">
                <title>List Leaves</title>
        </head>

        <body>
                <?php
                $sql = "SELECT start_time, end_time, period, reason, start_time_when, end_time_when, leave_why FROM leaves WHERE name='$user_name'";
                $result = mysqli_query($db, $sql);

                echo "total:" . mysqli_num_rows($result) . "rows <br>";
                echo "<table border='4' cellspacing='0'>";

                echo "<tr>";
                echo "<th>Leave Why</th>";
                echo "<th>Start Time</th>";
                echo "<th>End Time</th>";
                echo "<th>Period</th>";
                echo "<th>Reason</th>";
                echo "<th>Start Time When</th>";
                echo "<th>End Time When</th>";
                echo "</tr>";

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['leave_why'] . "</td>";
                    echo "<td>" . $row['start_time'] ."</td>";
                    echo "<td>" . $row['end_time'] . "</td>";
                    echo "<td>" . $row['period'] . "</td>";
                    echo "<td>" . $row['reason'] . "</td>";
                    echo "<td>" . $row['start_time_when'] . "</td>";
                    echo "<td>" . $row['end_time_when'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                mysqli_close($db);
                ?>
        </body>
</html>
