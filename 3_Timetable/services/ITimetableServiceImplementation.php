<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

//inclusion of php scripts
include("ITimetableService.php");
include dirname(__FILE__).'/../mysql_db_connection.inc.php';

class ITimetableServiceImplementation implements ITimetableService
{

    //addTimetable() method adds a new timetable id into the database
    public function addTimetable()
    {

        global $conn;

        $tempTimetableId = Timetable::getTimetableId();

        //sql statement
        $sql = "INSERT INTO timetable(timetable_id,hall_name) VALUES('$tempTimetableId','$tempTimetableId');";
        $conn->query($sql);

    }

    //deleteTimetable() method deletes all the timetable data of a particular id
    public function deleteTimetable()
    {
        global $conn;

        $tempTimetableId = Timetable::getTimetableId();

        //sql statement
        $sql = "DELETE FROM timetable WHERE timetable_id = '$tempTimetableId';";
        $conn->query($sql);
    }

    //viewAllTimetables() method retrieves all the timetable ids and return all in an array
    public function viewAllTimetables()
    {

        global $conn;

        //sql statement
        $timetablesSql = "SELECT timetable_id FROM timetable;";

        $res =$conn->query($timetablesSql);

        if($res->num_rows>0){
            $timetableList = [];
            while($row = $res->fetch_assoc()){
                $temp = $row["timetable_id"];
                $timetableList[] = $temp;
            }

            return $timetableList;
        }

    }

}