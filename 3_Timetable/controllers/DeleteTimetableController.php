<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

    //inclusion of php scripts
    include("../models/Timetable.php");
    include("../models/TimetableCell.php");
    include("../services/ITimetableServiceImplementation.php");

    //the delete button in the timetable_admin_delete_page will be working on this if statement
    if(isset($_POST['timetable_admin_delete_modal'])){

        //counter initialized
        $count = 0;

        //location from where the request is coming
        $loc = $_GET['loc'];

        //id entered is stored
        $id = $_GET['idFromModal'];

        //if no id is entered redirect the user back
        if(empty($id)) {
            $url = "../timetable_admin_delete_page.php?deleteMain=empty";
            header('Location:'.$url);
        }

        //if an id is entered
        else{

            Timetable::setTimetableId($id);

            $timetableService = new ITimetableServiceImplementation();
            $timetableService->deleteTimetable();

            //redirect user to the timetable_admin_delete_page with parameters of success and id in the URL
            if(strcmp($loc,"all")==0){
                $url = "../timetable_admin_view_page.php?deleteMain=success&deleteId=".$id;
                header('Location: '.$url);
            }else if(strcmp($loc,"deleteMainPage")==0) {
                $url = "../timetable_admin_delete_page.php?deleteMain=success&deleteId=" . $id;
                header('Location: ' . $url);
            }

        }
    }