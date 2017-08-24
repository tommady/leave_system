<?php
    include("check.php");
?>

<!doctype html>
<html>
        <head>
                <meta charset="utf-8">
                <title>Apply Leave</title>
        </head>

        <body>
                <h1>請假單</h1>
                <form action="apply_leave_control.php" method="post" name="leaveform" id="leaveform">

                        <label for="leavewhy">假別:</label>
                        <select name="leavewhy" class="leavewhy" id="leavewhy" dir="ltr" lang="zh" >
                                <option value="personal_leave">事假</option>
                                <option value="sick_leave">病假</option>
                                <option value="annual_leave">特休</option>
                                <option value="menstruation_leave">生理假</option>

                        </select>

                        <br>

                        <p>請假日期：</p>
                                開始:<input type="date" name="leavetime_start" id="leavetime_start">
                                <select name="leavetime_start_when" id="leavetime_start_when">
                                        <option value="morning">早上</option>
                                        <option value="afternoon">下午</option>
                                </select>

                                結束:<input type="date" name="leavetime_end" id="leavetime_end">
                                <select name="leavetime_end_when" id="leavetime_end_when">
                                        <option value="morning">早上</option>
                                        <option value="afternoon">下午</option>
                                </select>

                        <br>

                        <p>請假事由: <br/><textarea name="leavewhy_txt"></textarea></p>

                        <input type="submit" name="submit">
                </form>
        </body>
</html>
