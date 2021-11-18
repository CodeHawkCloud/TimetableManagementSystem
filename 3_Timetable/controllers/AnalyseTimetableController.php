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
    include dirname(__FILE__).'/../mysql_db_connection.inc.php';

    global $conn;

    /*------------------------Pie Chart left [Start]---------------------------------------------*/

        //sql statement to get the hall ids
        $sql = "SELECT class_id FROM classroom";
        $res = $conn->query($sql);

        //count the number of classes
        $noOfHalls = $res->num_rows;


        $leftChartTimetableImp = new ITimetableServiceImplementation();
        $leftChartTimetableResList = $leftChartTimetableImp->viewAllTimetables();

        //count the timetables in the database only if the array is not empty
        if(!empty($leftChartTimetableResList)) {
            $countLeftChartTimetableResList = count($leftChartTimetableResList);
        }else{
            $countLeftChartTimetableResList = 0;
        }

        //difference between halls and timetables
        $difLeft  = $noOfHalls  -$countLeftChartTimetableResList;

    /*------------------------Pie Chart left [End]---------------------------------------------*/

    /*------------------------Pie Chart right [Start]---------------------------------------------*/

        //new ITimetableServiceImplentation created to retrieve all timetables available
        $analyseTSI = new ITimetableServiceImplementation();
        //viewAllTimetables() method called - returns an array containing the timetable ids
        $rightChartTimetableResList = $analyseTSI->viewAllTimetables();
        //variable to store the count of vacant slots
        $vacantCountSlots = 0;

        //count the timetables only if the array is not empty
        if(!empty($rightChartTimetableResList)){
            //variable that stores the count of the $resList(number of timetables)
            $countRightChartResList = count($rightChartTimetableResList);
        }else{
            $countRightChartResList = 0;
        }

        //variable to store total of slots in all the timetables
        $fullCountSlots = $countRightChartResList * 140;

        //for loop to iterate throughout the timetables retrieved from the viewAllTimetables() method
        for($k=0;$k<$countRightChartResList;$k++){

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
                        $analyseTCellSI = new ITimetableCellServiceImplementation();
                        //set the id of the timetable
                        TimetableCell::setTimeId($rightChartTimetableResList[$k]);
                        //viewAllTimetableCells() method called to get the $k's timetable cell details
                        $analyseTCellSI->viewAllTimetableCells(TimetableCell::getTimeId(), $l, $startTime, $min_start);

                        //if the current tutors name is contained somewhere in the $k timetable this if statement will be true
                        if (empty(TimetableCell::getTutor1()) && empty(TimetableCell::getSubjectId())
                            && empty(TimetableCell::getTutor2()) && empty(TimetableCell::getClassType())){

                            //increment the vacant slot by 1
                            $vacantCountSlots = $vacantCountSlots + 1;

                        }
                    }
                }
            }
        }

    /*------------------------Pie Chart right [End]---------------------------------------------*/