<?php

    $userID = $_SESSION['id'];
    
    $sql = "SELECT pic_location
            FROM institute_management_system.student 
            WHERE id = '$userID'";

    $result = $conn->query($sql);
    $checkResult = $result->num_rows;

    if ($checkResult > 0) {

        $row = $result->fetch_assoc();
        echo '<img src="'.$row['pic_location'].'" class="img-radius wid-40" alt="User-Profile-Image">';

    } else {

        echo '<img src="../assets/images/user/avatar-1.jpg" class="img-radius wid-40" alt="User-Profile-Image">';

    }
?>