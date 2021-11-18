<?php

    include dirname(__FILE__).'/../../3_Timetable/mysql_db_connection.inc.php';

    class IUserProfileServiceImplementation
    {

        public function userProfileUpdateWithPass($staffId, $username, $email, $pass, $phone)
        {
            global $conn;

            $passW = md5($pass);

            $sql = "UPDATE staff SET User_Name='$username', Email='$email', Password = '$passW', Phone_Number = '$phone' WHERE Staff_ID = '$staffId';";

            $res = $conn->query($sql);

            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function userProfileUpdateWithoutPass($staffId, $username, $email, $phone)
        {
            global $conn;

            $sql = "UPDATE staff SET User_Name='$username', Email='$email', Phone_Number = '$phone' WHERE Staff_ID = '$staffId';";

            $res = $conn->query($sql);

            if($res){
                return true;
            }else{
                return false;
            }
        }

    }