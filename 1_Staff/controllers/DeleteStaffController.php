<?php

    include dirname(__FILE__).'/../../3_Timetable/mysql_db_connection.inc.php';
    include dirname(__FILE__).'/../services/IStaffServiceImplementation.php';

    //catching the parameters
    $temp_del_id = $_GET['idFromModal'];
    $temp_del_uname = $_GET['unameFromModal'];
    $temp_del_sessionId = $_GET['sessionAdminId'];

    //check if the user is going to delete his account
    if(strcmp($temp_del_id,$temp_del_sessionId)==0){
        $url = "../staff_admin_view_page.php?staffDelete=Fail&retUname=" . $temp_del_uname."&retReason=sessionDel";
        header("Location:" . $url);

    }else{
        $IStaffService = new IStaffServiceImplementation();
        $retDel = $IStaffService->deleteStaff($temp_del_id);
        if($retDel){
            $url = "../staff_admin_view_page.php?staffDelete=success&retUname=" . $temp_del_uname."&retReason=success";
            header("Location:" . $url);
        }
    }






