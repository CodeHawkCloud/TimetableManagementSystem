<?php

    include dirname(__FILE__).'/../services/IUserProfileServiceImplementation.php';
    include dirname(__FILE__).'/../../3_Timetable/mysql_db_connection.inc.php';

    if(isset($_POST['update_profile'])){

        $IUserImp  = new IUserProfileServiceImplementation();

        $myRes = false;
        $userCount = 0;
        $emailCount = 0;

        $myId = $_GET['update_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $phone = $_POST['phonenumber'];

        //check queries
        global $conn;
        $sql = "SELECT * FROM staff";
        $res = $conn->query($sql);


        while ($row=$res->fetch_assoc()){

            if(strcmp($row['Staff_ID'],$myId)==0){
                continue;
            }

            if(strcmp($username,$row['User_Name'])==0){
                $userCount++;
            }
            if(strcmp($email,$row['Email'])==0){
                $emailCount++;
            }

        }

        if( $userCount > 0 || $emailCount > 0) {

            $url = "../userProfile.php?updateUserSuccess=false&userC=" . $userCount . "&emailC=" . $emailCount . "&myId=" . $myId;
            header("Location:" . $url);
            exit();

        }else{

            if(strcmp($pass,"")==0){

                $myRes = $IUserImp->userProfileUpdateWithoutPass($myId,$username,$email,$phone);

            }else{
                $myRes = $IUserImp->userProfileUpdateWithPass($myId,$username,$email,$pass,$phone);
            }

        }

        if($myRes){
            $url = "../userProfile.php?updateUserSuccess=true&myId=".$myId;
            header("Location:" . $url);
            exit();
        }


    }
