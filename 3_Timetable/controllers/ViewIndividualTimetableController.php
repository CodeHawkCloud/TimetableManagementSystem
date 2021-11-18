<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

    //inclusion of php scripts
    include dirname(__FILE__).'/../models/Timetable.php';
    include dirname(__FILE__).'/../models/TimetableCell.php';
    include dirname(__FILE__).'/../services/ITimetableServiceImplementation.php';
    include dirname(__FILE__).'/../services/ITimetableCellServiceImplementation.php';

    //the next button in the timetable_admin_view_individual_main_page will be working on this if statement
    if(isset($_POST['timetable_admin_view_next'])){
        $count = 0;

        $id  = $_POST['timetable_admin_view_timetableID'];

        //if no id is entered redirect the user back
        if(empty($id)) {
            $url = "../timetable_admin_view_individual_main_page.php?viewTimetable=empty";
            header('Location: '.$url);
        }

        //if an id is entered
        else{

            //redirect user to the timetable_admin_delete_page with parameters of success and id in the URL
            $url = "../timetable_admin_view_individual_page.php?viewTimetableId=".$id;
            header('Location: '.$url);

        }
    }
