<?php

include 'getDBconn.php';

class User
{
        public $db;
        /*** for registration process ***/
        public function __construct()
        {
                include 'getDBconn.php';
                global $conn;
                $this->db = $conn;
        }


        /*** for login process ***/

        public function check_login($emailusername, $password)
        {

                $password = md5($password);

                $sql2 = "SELECT Staff_ID, Administrator from staff WHERE Email='$emailusername' or User_Name='$emailusername' and Password='$password'";

                //checking if the username is available in the table

                $result = mysqli_query($check =  $this->db, $sql2);

                $user_data = mysqli_fetch_array($result);

                $count_row = $result->num_rows;


                if ($count_row == 1) {

                        // this login var will use for the session thing
                        $_SESSION['login'] = true;

                        $_SESSION['Staff_ID'] = $user_data['Staff_ID'];

                        if ($user_data['Administrator'] == "True") {

                                $_SESSION['Administrator'] = "True";
                        } else {
                                $_SESSION['Administrator'] = "False";
                        }


                        return true;
                } else {

                        return false;
                }
        }

        /*** for showing the username or fullname ***/

        public function get_fullname($Staff_ID)
        {

                $sql3 = "SELECT User_Name FROM staff WHERE Staff_ID = '$Staff_ID'";

                $result = mysqli_query($this->db, $sql3);

                $user_data = mysqli_fetch_array($result);

                echo $user_data['User_Name'];
        }

        /*** starting the session ***/

        public function get_session()
        {

                return $_SESSION['login'];
        }

        public function user_logout()
        {

                $_SESSION['login'] = FALSE;

                session_destroy();
        }

}
