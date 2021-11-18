<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 *
 */

    //inclusion of php scripts
    include dirname(__FILE__).'/../models/Timetable.php';
    include dirname(__FILE__).'/../models/TimetableCell.php';
    include dirname(__FILE__).'/../services/ITimetableServiceImplementation.php';
    include dirname(__FILE__).'/../services/ITimetableCellServiceImplementation.php';
    include dirname(__FILE__).'/../mysql_db_connection.inc.php';

    //the update button in the timetable_admin_update_main_page will be working on this if statement
    if(isset($_POST['timetable_admin_update_updateTimetable'])) {

        //counter initialized
        $count = 0;

        //id entered is stored
        $id = $_POST['timetable_admin_update_timetableID'];

        //if no id is entered redirect the user back
        if (empty($id)) {
            $url="../timetable_admin_update_main_page.php?updateMain=empty";
            header('Location:'.$url);
        }

        //if an id is entered the id will begin to get validated
        else {

            //redirect user to the timetable_admin_update with the parameter id in the URL
            $url = "../timetable_admin_update_page.php?loc=updateMain&updateTimetable=" . $id;
            header('Location: ' . $url);
        }


    }

    //the save changes button in the timetable_admin_update_page will be working on this if statement
    if(isset($_POST['timetable_admin_update_saveChanges'])){

        //id collected from the URL
        $loc = $_GET['loc'];

        $tempTimeId = $_GET['updateTimetable'];


        /* Validation to check if the user updates the same tutor to another timetable at the same time [start] */
        $comboCheckTimetableImp = new ITimetableServiceImplementation();

        $comboRes = $comboCheckTimetableImp->viewAllTimetables();

        $comboArrayRes = [];

        $comboArrayCount = 0;

        $countComboRes = count($comboRes);

        $mainPrevTimetable = "";
        $mainStartTime = 1000;
        $mainMin = 1000;
        $mainDay = "";
        $mainTutorName = "";

        //for loop to iterate throughout the timetables retrieved from the viewAllTimetables() method
        for($k=0;$k<$countComboRes;$k++){

            if(strcmp("$tempTimeId", $comboRes[$k])==0){
                continue;
            }

            //start and end times
            $startTime = 8;
            $endTime = 17;
            $realDay="";

            //for loop from the start time to the end time
            for($startTime;$startTime<=$endTime;$startTime++){
                $min_start = 00;
                $min_start = str_pad($min_start, 2, '0', STR_PAD_LEFT);
                $min_end = 00;
                $min_end = str_pad($min_end, 2, '0', STR_PAD_LEFT);

                for ($min_start; $min_start <=30 ; $min_start += 30) {
                    //for loop from 1 to 7 - 1 represents monday, 2 represents tuesday and so on
                    for ($l = 1; $l <= 7; $l++) {
                        $comboCheckTimetableCellImp = new ITimetableCellServiceImplementation();
                        //set the id of the timetable
                        TimetableCell::setTimeId($comboRes[$k]);
                        //viewAllTimetableCells() method called to get the $k's timetable cell details
                        $comboCheckTimetableCellImp->viewAllTimetableCells(TimetableCell::getTimeId(), $l, $startTime, $min_start);
                        //if the current tutors name is contained somewhere in the $k timetable this if statement will be true
                        $tempTutor1 = $_POST[$startTime . $min_start . "tutor1" . $l];
                        $tempTutor2 = $_POST[$startTime . $min_start . "tutor2" . $l];

                        if(strcmp("$tempTutor1","$tempTutor2") == 0  && strcmp("$tempTutor2","")!=0
                            && strcmp("$tempTutor1","")!=0) {

                            if ($l == 1) {
                                $realDay = "Monday";
                            } else if ($l == 2) {
                                $realDay = "Tuesday";
                            } else if ($l == 3) {
                                $realDay = "Wednesday";
                            } else if ($l == 4) {
                                $realDay = "Thursday";
                            } else if ($l == 5) {
                                $realDay = "Friday";
                            } else if ($l == 6) {
                                $realDay = "Saturday";
                            } else {
                                $realDay = "Sunday";
                            }

                            $mainPrevTimetable = "na";
                            $mainStartTime = $startTime;
                            $mainMin = $min_start;
                            $mainDay = $realDay;

                            $mainTutorName = $tempTutor1;

                            $url = "../timetable_admin_update_page.php?loc=" . $loc . "&updateTimetable=" . $tempTimeId . "&comboTutor=true&comboTimetable=" . $mainPrevTimetable . "&comboTutorName=" . $mainTutorName . "&comboStartTime=" . $startTime . "&comboMin=" . $mainMin . "&comboDay=" . $mainDay."&double=true";
                            header("Location: " . $url);
                            exit();
                        }

                        if (strcmp("$tempTutor1", TimetableCell::getTutor1()) == 0 && strcmp("$tempTutor1","")!=0
                            || strcmp("$tempTutor1",TimetableCell::getTutor2()) == 0 && strcmp("$tempTutor1","")!=0)

                        {

                            if($l == 1){
                                $realDay = "Monday";
                            }
                            else if($l == 2){
                                $realDay = "Tuesday";
                            }
                            else if($l == 3){
                                $realDay = "Wednesday";
                            }
                            else if($l == 4){
                                $realDay = "Thursday";
                            }
                            else if($l == 5){
                                $realDay = "Friday";
                            }
                            else if($l == 6){
                                $realDay = "Saturday";
                            }
                            else{
                                $realDay = "Sunday";
                            }

                            $mainPrevTimetable = $comboRes[$k];
                            $mainStartTime = $startTime;
                            $mainMin = $min_start;
                            $mainDay = $realDay;

                            $mainTutorName = $tempTutor1;

                            $url = "../timetable_admin_update_page.php?loc=".$loc."&updateTimetable=".$tempTimeId."&comboTutor=true&comboTimetable=".$mainPrevTimetable."&comboTutorName=".$mainTutorName."&comboStartTime=".$startTime."&comboMin=".$mainMin."&comboDay=".$mainDay."&double=false";
                            header("Location: " . $url);
                            exit();
                        }

                        if(strcmp("$tempTutor2", TimetableCell::getTutor2()) == 0 && strcmp("$tempTutor2","")!=0
                            || strcmp("$tempTutor2",TimetableCell::getTutor1()) == 0 && strcmp("$tempTutor2","")!=0) {

                            if ($l == 1) {
                                $realDay = "Monday";
                            } else if ($l == 2) {
                                $realDay = "Tuesday";
                            } else if ($l == 3) {
                                $realDay = "Wednesday";
                            } else if ($l == 4) {
                                $realDay = "Thursday";
                            } else if ($l == 5) {
                                $realDay = "Friday";
                            } else if ($l == 6) {
                                $realDay = "Saturday";
                            } else {
                                $realDay = "Sunday";
                            }

                            $mainPrevTimetable = $comboRes[$k];
                            $mainStartTime = $startTime;
                            $mainMin = $min_start;
                            $mainDay = $realDay;

                            $mainTutorName = $tempTutor2;

                            $url = "../timetable_admin_update_page.php?loc=" . $loc . "&updateTimetable=" . $tempTimeId . "&comboTutor=true&comboTimetable=" . $mainPrevTimetable . "&comboTutorName=" . $mainTutorName . "&comboStartTime=" . $startTime . "&comboMin=" . $mainMin . "&comboDay=" . $mainDay."&double=false";
                            header("Location: " . $url);
                            exit();
                        }

                    }
                }
            }
        }

        /* Validation to check if the user updates the same tutor to another timetable at the same time [end] */

        /* 3_Timetable update [start] */

        //start and end times
        $timeslot_start = 8;
        $timeslot_end = 17;

        //for loop from the start time to the end time
        for($timeslot_start;$timeslot_start<=$timeslot_end;$timeslot_start++){
            $min_start = 00;
            $min_start =str_pad($min_start, 2, '0', STR_PAD_LEFT);
            $min_end = 00;
            $min_end = str_pad($min_end, 2, '0', STR_PAD_LEFT);

            for ($min_start; $min_start <=30 ; $min_start += 30) {
                //for loop from 1 to 7 - 1 represents monday, 2 represents tuesday and so on
                for ($i = 1; $i <= 7; $i++) {
                    //set the inputs by calling the static class TimetableCell
                    TimetableCell::setTimeId($tempTimeId);
                    TimetableCell::setDay($i);
                    TimetableCell::setStartTime($timeslot_start);
                    TimetableCell::setEndTime($timeslot_start + 1);
                    TimetableCell::setTutor1($_POST[$timeslot_start . $min_start . "tutor1" . $i]);
                    TimetableCell::setTutor2($_POST[$timeslot_start . $min_start . "tutor2" . $i]);
                    TimetableCell::setClassType($_POST[$timeslot_start . $min_start . "classType" . $i]);
                    TimetableCell::setSubjectId($_POST[$timeslot_start . $min_start . "subject" . $i]);
                    TimetableCell::setMinStart($min_start);

                //TimetableCells implementation
                $timetableCellService = new ITimetableCellServiceImplementation();
                $timetableCellService->updateTimetableCell(TimetableCell::getTimeId(), TimetableCell::getSubjectId(), TimetableCell::getTutor1(),TimetableCell::getTutor2(),TimetableCell::getClassType(), TimetableCell::getDay(), TimetableCell::getStartTime(),TimetableCell::getMinStart());
                }
            }
        }

        global $conn;

        //notify all tutors
        $sql = "SELECT * FROM staff WHERE Tutor = 'True'";
        $tutorIdsNotify = $conn->query($sql);
        while($row = $tutorIdsNotify->fetch_assoc()){
            $tutorIdsNotifyRes = $row['Staff_ID'];
            notify($tutorIdsNotifyRes, "Timetable for venue " . $tempTimeId .  " has been updated ! ", "Timetable", "#");
        }

        //redirect user to the timetable_admin_update_main_page with parameters of success and id in the URL
        if(strcmp($loc,"updateMain")==0) {
            $url = "../timetable_admin_update_main_page.php?updateTimetable=success&updateTimetableId=" . $tempTimeId;
            header('Location: ' . $url);
        }else if(strcmp($loc,"all")==0){
            $url = "../timetable_admin_view_page.php?updateTimetable=success&updateTimetableId=" . $tempTimeId;
            header('Location: ' . $url);
        }

        /* Timetable update [end] */
    }

    function notify($idT,$msg,$category,$action) {

        global $conn;
        $status = "unseen";

        $sql = "INSERT INTO notification (recipient_id, message, status, category,action) VALUES ('$idT', '$msg','$status' , '$category', '$action');";
        $conn->query($sql);
    }