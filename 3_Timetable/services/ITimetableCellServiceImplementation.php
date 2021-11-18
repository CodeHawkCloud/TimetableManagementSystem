<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

//inclusion of php scripts
include("ITimetableCellService.php");
include dirname(__FILE__).'/../mysql_db_connection.inc.php';

class ITimetableCellServiceImplementation implements ITimetableCellService
{

    //addTimetableCell() method adds timetable cell data to the database
    public function addTimetableCell()
    {

        global $conn;

        $tcsId = TimetableCell::getTimeId();
        $tcsTutor1 = TimetableCell::getTutor1();
        $tcsTutor2 = TimetableCell::getTutor2();
        $tcsClassType = TimetableCell::getClassType();
        $tcsSubject = TimetableCell::getSubjectId();
        $tcsDay = TimetableCell::getDay();
        $tcsStartTime = TimetableCell::getStartTime();
        $tcsMinStart = TimetableCell::getMinStart();
        $tcsEndTime = TimetableCell::getEndTime();
        $sql = "INSERT INTO timetable_staff_subject(tid,staff_name_1,staff_name_2,class_type,subject_name,day,start_time,min_start,end_time) VALUES('$tcsId','$tcsTutor1','$tcsTutor2','$tcsClassType','$tcsSubject','$tcsDay','$tcsStartTime','$tcsMinStart','$tcsEndTime');";

        $conn->query($sql);
    }

    //updateTimetableCell() method updates timetable cell data to the database
    public function updateTimetableCell($timetableCellMainId,$subject,$tutor1,$tutor2,$type,$day,$startTime,$minStart)
    {

        global $conn;

        $sql = "UPDATE timetable_staff_subject SET staff_name_1='$tutor1',staff_name_2='$tutor2',class_type='$type',subject_name='$subject' WHERE tid LIKE'$timetableCellMainId' AND day='$day' AND start_time='$startTime' AND min_start='$minStart';";

        $conn->query($sql);

    }

    //viewAllTimetableCells() method retrieves timetable cell data from the database based on the timetable id,day,start time and min start
    public function viewAllTimetableCells($timetableCellMainId,$day,$startTime,$minStart)
    {

        global $conn;

        $sql = "SELECT * FROM timetable_staff_subject where tid LIKE'$timetableCellMainId' AND day='$day' AND start_time='$startTime' AND min_start='$minStart';";

        $res = $conn->query($sql);
        if($res->num_rows>0) {
            while ($row = $res->fetch_assoc()) {

                $tempStaff1 = $row["staff_name_1"];
                $tempStaff2 = $row["staff_name_2"];
                $tempType = $row["class_type"];
                $tempSubject = $row["subject_name"];
                $tempday = $row["day"];
                $tempStart = $row["start_time"];
                //$tempEnd = $row["end_time"];
                $tempMin = $row["min_start"];

                TimetableCell::setSubjectId($tempSubject);
                TimetableCell::setTutor1($tempStaff1);
                TimetableCell::setTutor2($tempStaff2);
                TimetableCell::setClassType($tempType);
                TimetableCell::setStartTime($tempStart);
                TimetableCell::setDay($tempday);
                TimetableCell::setMinStart($tempMin);

            }
        }
    }

}