<?php

    //including the database connection file
    include dirname(__FILE__).'/../services/IStaffServiceImplementation.php';

    $IStaff = new IStaffServiceImplementation();

    if (isset($_POST['submit'])) {

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


        $addResult = $IStaff->addStaff($nic,$email,$fullname,$lastname,$username,$pass,$qualification,$ethnic,$religion,$civilstatus,$address,$gender,$dob,$phonenumber,$salary,$checkadmin,$checkcashier,$checktutor);

        if(strcmp($addResult,"success")==0){
            $url = "../staff_admin_view_page.php?staffAdd=Success&uname=".$username;
            header("Location:".$url);
            exit();
        }else if(strcmp($addResult, "EmailCombo")==0){
            $url = "../staff_admin_add_page.php?staffAdd=Fail&combo=Email&uname=".$username;
            header("Location:".$url);
            exit();
        }else if(strcmp($addResult,"NicCombo")==0){
            $url = "../staff_admin_add_page.php?staffAdd=Fail&combo=Nic&uname=".$username;
            header("Location:".$url);
            exit();
        }else if(strcmp($addResult,"FirstCombo")==0) {
            $url = "../staff_admin_add_page.php?staffAdd=Fail&combo=First&uname=" . $username;
            header("Location:" . $url);
            exit();
        }


    }
