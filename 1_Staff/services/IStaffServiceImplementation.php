<?php

include_once dirname(__FILE__).'/../../3_Timetable/mysql_db_connection.inc.php';

class IStaffServiceImplementation
{

    public function addStaff($NIC, $Email, $Full_Name, $Last_Name, $User_Name, $Password, $Qualification, $Ethnic, $Religion, $Civil_Status, $Address, $Gender, $DateOfBirth, $Phone_Number,$salary,$checkadmin,$checkcashier,$checktutor)
    {

        global $conn;

        $Password = md5($Password);

        //checking if the username or email is available in db
        $sql = "SELECT * FROM staff WHERE User_Name='$User_Name' OR Email='$Email'";
        $res = $conn->query($sql);
        $countEmails = $res->num_rows;

        //checking if nic is already available
        $sql1 = "SELECT * FROM staff WHERE NIC='$NIC'";
        $res1 = $conn->query($sql1);
        $countNics = $res1->num_rows;

        //checking if first name is already available
        $sql2 = "SELECT * FROM staff WHERE Full_Name='$Full_Name'";
        $res2 = $conn->query($sql2);
        $countFirst = $res2->num_rows;

        //if the username is not in db then insert to the table
        if ($countEmails == 0 && $countNics == 0 && $countFirst == 0) {

            $sql3 = "INSERT INTO staff(NIC,Email,User_Name,Full_Name,Last_Name,Password,Qualification,Salary,Ethnic,Religion,Civil_Status,Address,Gender,DateOfBirth,Phone_Number,Administrator,Tutor,Cashier) VALUES ('$NIC','$Email','$User_Name','$Full_Name','$Last_Name','$Password','$Qualification','$salary','$Ethnic','$Religion','$Civil_Status','$Address','$Gender','$DateOfBirth','$Phone_Number','$checkadmin','$checktutor','$checkcashier')";
            $res3 = $conn->query($sql3);
            if ($res3) {

                return "success";

            }
        }else if($countEmails != 0 ){
                return "EmailCombo";
        }else if($countNics != 0){
            return "NicCombo";
        }else if($countFirst != 0){
            return "FirstCombo";
        }
    }


    public function reg_user($NIC, $Email, $Full_Name, $Last_Name, $User_Name, $Password, $Qulalification, $Ethnic, $Religion, $Civil_Status, $Address, $Gender, $DateOfBirth, $Phone_Number)
    {

        global $conn;

        $Password = md5($Password);

        //checking if the username or email is available in db
        $sql = "SELECT * FROM staff WHERE User_Name='$User_Name' OR Email='$Email'";
        $res = $conn->query($sql);
        $countEmails = $res->num_rows;

        //checking if nic is already available
        $sql1 = "SELECT * FROM staff WHERE NIC='$NIC'";
        $res1 = $conn->query($sql1);
        $countNics = $res1->num_rows;

        //checking if first name is already available
        $sql2 = "SELECT * FROM staff WHERE Full_Name='$Full_Name'";
        $res2 = $conn->query($sql2);
        $countFirst = $res2->num_rows;

        //if the username is not in db then insert to the table
        if ($countEmails == 0 && $countNics == 0 && $countFirst == 0) {

            $sql3 = "INSERT INTO staff(NIC,Email,User_Name,Full_Name,Last_Name,Password,Qualification,Ethnic,Religion,Civil_Status,Address,Gender,DateOfBirth,Phone_Number) VALUES ('$NIC','$Email','$User_Name','$Full_Name','$Last_Name','$Password','$Qulalification','$Ethnic','$Religion','$Civil_Status','$Address','$Gender','$DateOfBirth','$Phone_Number')";
            $res3 = $conn->query($sql3);
            if ($res3) {

                return "success";

            }
        }else if($countEmails != 0 ){
            return "EmailCombo";
        }else if($countNics != 0){
            return "NicCombo";
        }else if($countFirst != 0){
            return "FirstCombo";
        }

    }

    public function viewAllStaff(){

        global $conn;

        $sql = "SELECT * FROM staff ORDER BY Staff_ID DESC";
        $allStaff = $conn->query($sql);
        return $allStaff;
    }

    public function deleteStaff($staffId){

        global $conn;
        $sql = "DELETE FROM staff WHERE Staff_Id LIKE '$staffId';";
        $res = $conn->query($sql);

        if($res == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function viewAParticularStaff($staffId){

        global $conn;
        $sql = "SELECT * FROM staff WHERE Staff_ID LIKE '$staffId';";

        $res = $conn->query($sql);

        return $res;
    }

    public function escapeString($val)
    {
        global $conn;
        return $conn->real_escape_string($val);
    }

    public function updateStaff($staffID,$nic,$email,$fullname,$lastname,$username,$pass,$qualification,$ethnic,$religion,$civilstatus,$address,$gender,$dob,$phonenumber,$salary,$checkadmin,$checkcashier,$checktutor){

        global $conn;

        $passW = md5($pass);

        $sql = "UPDATE staff SET NIC='$nic',Email='$email',User_Name='$username',Full_Name='$fullname',Last_Name='$lastname',Password='$passW',Qualification='$qualification',Ethnic='$ethnic',Religion='$religion',Civil_Status='$civilstatus',Address='$address',Gender='$gender',DateOfBirth='$dob',Phone_Number='$phonenumber',Salary='$salary',Administrator='$checkadmin',Tutor='$checktutor',Cashier='$checkcashier' WHERE Staff_ID LIKE '$staffID';";
        $res = $conn->query($sql);

        return $res;
    }

    public function updateStaffWithoutPass($staffID,$nic,$email,$fullname,$lastname,$username,$qualification,$ethnic,$religion,$civilstatus,$address,$gender,$dob,$phonenumber,$salary,$checkadmin,$checkcashier,$checktutor){

        global $conn;


        $sql = "UPDATE staff SET NIC='$nic',Email='$email',User_Name='$username',Full_Name='$fullname',Last_Name='$lastname',Qualification='$qualification',Ethnic='$ethnic',Religion='$religion',Civil_Status='$civilstatus',Address='$address',Gender='$gender',DateOfBirth='$dob',Phone_Number='$phonenumber',Salary='$salary',Administrator='$checkadmin',Tutor='$checktutor',Cashier='$checkcashier' WHERE Staff_ID LIKE '$staffID';";
        $res = $conn->query($sql);

        return $res;
    }



}