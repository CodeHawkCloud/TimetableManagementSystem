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

    global $Name;

    //new ITimetableServiceImplentation created to retrieve all timetables available
    $vrst = new ITimetableServiceImplementation();
    //viewAllTimetables() method called - returns an array containing the timetable ids
    $resList = $vrst->viewAllTimetables();
    //array object declared to store ids and thu avoid redundancy during validation
    $res = [];
    //variable to store the count of $res array
    $resCount = 0;
    //variable that stores the count of the $resList(number of timetables)

    if(empty($resList)){
        $countResList = 0;
    }else{
        $countResList = count($resList);
    }


    //for loop to iterate throughout the timetables retrieved from the viewAllTimetables() method
    for($k=0;$k<$countResList;$k++){

        //start and end times
        $startTime = 8;
        $endTime = 17;

        //for loop from the start time to the end time
        for($startTime;$startTime<=$endTime;$startTime++){
            $min_start = 00;
            $min_start =str_pad($min_start, 2, '0', STR_PAD_LEFT);
            $min_end = 00;
            $min_end = str_pad($min_end, 2, '0', STR_PAD_LEFT);

            for ($min_start; $min_start <=30 ; $min_start += 30) {
                //for loop from 1 to 7 - 1 represents monday, 2 represents tuesday and so on
                for ($l = 1; $l <= 7; $l++) {
                    $tcvsController = new ITimetableCellServiceImplementation();
                    //set the id of the timetable
                    TimetableCell::setTimeId($resList[$k]);
                    //viewAllTimetableCells() method called to get the $k's timetable cell details
                    $tcvsController->viewAllTimetableCells(TimetableCell::getTimeId(), $l, $startTime, $min_start);

                    //if the current tutors name is contained somewhere in the $k timetable this if statement will be true
                    if (strcmp("$Name", TimetableCell::getTutor1()) == 0 || strcmp("$Name",TimetableCell::getTutor2()) ==0){
                        //the id of the timetble $k will be stored here
                        $resIdArray[] = TimetableCell::getTimeId();
                        //the $resIdArray[] will contain the same id more than once,so make this wold make it contain only unique ids
                        $resIdArray = array_unique($resIdArray);
                    
                        $res = array_values($resIdArray);
                       
                        //count of the $res array to be used in the for loop in the timetable_staff_page
                        $resCount = count($res);

                    }
                }
            }
        }
    }
