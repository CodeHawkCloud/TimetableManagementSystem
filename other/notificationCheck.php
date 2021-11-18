<?php

    require_once '../3_Timetable/mysql_db_connection.inc.php';

    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];

        $sql = "SELECT * FROM notification 
                WHERE recipient_id = '$id' AND status = 'unseen'
                ORDER BY id DESC;";

        $result = $conn->query($sql);
        $checkResult = $result->num_rows;

        if ($checkResult > 0) {

            echo '<span class="badge bg-danger"><span class="sr-only"></span></span>';

        } else {

            echo '<span class="badge">';
        }
    }
    
?>