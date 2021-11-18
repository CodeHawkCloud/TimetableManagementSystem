<?php

function getUsername($ID) {

    include '../3_Timetable/mysql_db_connection.inc.php';

    $sql1 ="SELECT User_Name FROM staff WHERE Staff_ID LIKE '$ID'";

    global $conn;

    $result1 = $conn->query($sql1);

    if (!$result1) {
        $conn->error;
    } else {
        $row1 = $result1->fetch_assoc();
        $num1 = $result1->num_rows;

        if ($num1 > 0) {
            $uname = $row1['User_Name'];
            return $uname;
        }
    }

}
?>