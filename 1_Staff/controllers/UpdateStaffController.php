<?php
    //including the database connection file
    include dirname(__FILE__).'/../services/IStaffServiceImplementation.php';
    include dirname(__FILE__).'/../../3_Timetable/mysql_db_connection.inc.php';

    $IStaff = new IStaffServiceImplementation();
    $userCount = 0;
    $emailCount = 0;
    $nicCount = 0;
    $firstCount = 0;
    $adminFalse = 0;

    if(isset($_POST['update_submit'])) {
        $sessionStaffId = $_GET['sessionStaffId'];
        $staffID = $_GET['update_id'];

        $fullname = $IStaff->escapeString($_POST['fullname']);
        $lastname = $IStaff->escapeString($_POST['lastname']);
        $email = $IStaff->escapeString($_POST['email']);
        $nic = $IStaff->escapeString($_POST['nic']);
        $username = $IStaff->escapeString($_POST['username']);
        $pass = $IStaff->escapeString($_POST['pass']);
        $qualification = $IStaff->escapeString($_POST['qualification']);
        $ethnic = $IStaff->escapeString($_POST['ethnic']);
        $religion = $IStaff->escapeString($_POST['religion']);
        $civilstatus = $IStaff->escapeString($_POST['civilstatus']);
        $address = $IStaff->escapeString($_POST['address']);
        $gender = $IStaff->escapeString($_POST['gender']);
        $dob = $IStaff->escapeString($_POST['dob']);
        $phonenumber = $IStaff->escapeString($_POST['phonenumber']);
        $salary = $IStaff->escapeString($_POST['salary']);
        $checkadmin = $IStaff->escapeString($_POST['checkadmin']);
        $checkcashier = $IStaff->escapeString($_POST['checkcashier']);
        $checktutor = $IStaff->escapeString($_POST['checktutor']);


        //check queries
        global $conn;
        $sql = "SELECT * FROM staff";
        $res = $conn->query($sql);


        while ($row=$res->fetch_assoc()){
            if(strcmp($staffID,$sessionStaffId)==0){
                if(strcmp($checkadmin,"False")==0){
                    $adminFalse++;
                }
                continue;
            }

            if(strcmp($row['Staff_ID'],$staffID)==0){
                continue;
            }

            if(strcmp($username,$row['User_Name'])==0){
                $userCount++;
            }
            if(strcmp($email,$row['Email'])==0){
                $emailCount++;
            }
            if(strcmp($nic,$row['NIC'])==0){
                $nicCount++;
            }
            if(strcmp($fullname,$row['Full_Name'])==0){
                $firstCount++;
            }

        }

        if($adminFalse > 0 || $userCount > 0 || $emailCount > 0 || $nicCount >0 || $firstCount > 0){

            $url = "../staff_admin_edit_page.php?updateSuccess=false&adminF=".$adminFalse."&userC=".$userCount."&emailC=".$emailCount."&nicC=".$nicCount."&firstC=".$firstCount."&updateSUN=".$username."&staff_update_ID=".$staffID;
            header("Location:".$url);
            exit();
        }else{

            if(strcmp($pass,"")==0){

                $updateSqlRes = $IStaff->updateStaffWithoutPass($staffID, $nic, $email, $fullname, $lastname, $username,$qualification, $ethnic, $religion, $civilstatus, $address, $gender, $dob, $phonenumber, $salary, $checkadmin, $checkcashier, $checktutor);
                $url = "../staff_admin_view_page.php?updateSuccess=true&updateSUN=" . $username;
                header("Location:" . $url);

            }else {

                $updateSqlRes = $IStaff->updateStaff($staffID, $nic, $email, $fullname, $lastname, $username, $pass, $qualification, $ethnic, $religion, $civilstatus, $address, $gender, $dob, $phonenumber, $salary, $checkadmin, $checkcashier, $checktutor);
                $url = "../staff_admin_view_page.php?updateSuccess=true&updateSUN=" . $username;
                header("Location:" . $url);
            }
        }


    }