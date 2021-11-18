
<?php
    require_once '../3_Timetable/mysql_db_connection.inc.php';
    include_once '../dashboard_for_staff/loggedInCheck.php';

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM notification 
            WHERE recipient_id = '$id' AND status LIKE 'unseen'";

    $result = $conn->query($sql);
    $checkResult = $result->num_rows;

    echo '<li class="n-title">
            <p class="m-b-0">NEW</p>
          </li>';

    if ($checkResult > 0) {

        while ($row = $result->fetch_assoc()) {
            echo ' <li class="notification">
                  <div class="media">
                      <img class="img-radius" src="../assets/images/user/faculty.png" alt="Generic placeholder image">
                            <div class="media-body">
                                <p><strong>' .$row['category'].'</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>'.$row['time'].'</span></p>
                                <p>'.$row['message'].'</p>
                                
                            </div>
                      </div>
             </li>';
        }
    } else {
        echo '<li class="notification">
                <div class="media">
                    <div class="media-body">
                        <p>No New notifications...</p>
                    </div>
                </div>
            </li>';
    }


    if (isset($_GET['clearall'])) {

        $clearall = $_GET['clearall'];

        if ($clearall == "true") {

            $sql3 = "UPDATE notification SET status = 'cleared' WHERE recipient_id = '$id';";

            $conn->query($sql3);

            echo "<script> window.location.href = ' javascript: history.back() '; </script>";
        } else {
            echo "<script> window.location.href = ' javascript: history.back() '; </script>";
        }
    }
?>