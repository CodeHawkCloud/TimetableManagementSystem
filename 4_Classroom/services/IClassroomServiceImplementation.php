<?php

include ("IClassroomService.php");
include dirname(__FILE__).'/../../3_Timetable/mysql_db_connection.inc.php';

class IClassroomServiceImplementation implements IClassroomService
{
    public function addClassroom(Classroom $c1)
    {
        global $conn;

        $tempClassId = $c1->getClassId();
        $tempBuilding = $c1->getClassBuilding();
        $tempSeats = $c1->getClassSeats();
        $tempFloor = $c1->getClassFloor();
        $tempMulti = $c1->getClassMulti();
        $tempAir = $c1->getClassAirCon();

        $sql = "INSERT INTO classroom(class_id,building,number_of_seats,floor,multimedia,air_condition) VALUES ('$tempClassId', '$tempBuilding', '$tempSeats', '$tempFloor', '$tempMulti', '$tempAir');";
        $conn->query($sql);
    }

    public function updateClassroom(Classroom $c1)
    {

        global $conn;

        $tempClassId = $c1->getClassId();
        $tempBuilding = $c1->getClassBuilding();
        $tempSeats = $c1->getClassSeats();
        $tempFloor = $c1->getClassFloor();
        $tempMulti = $c1->getClassMulti();
        $tempAir = $c1->getClassAirCon();

        $sql = "UPDATE classroom SET building = '$tempBuilding',number_of_seats = '$tempSeats',floor = '$tempFloor',multimedia = '$tempMulti',air_condition = '$tempAir' WHERE class_id LIKE '$tempClassId';";
        $conn->query($sql);
    }

    public function viewAllClassrooms()
    {
        global $conn;

        $sql  = "SELECT * FROM classroom; ";

        $res = $conn->query($sql);

        $arr = array();

        if($res->num_rows>0) {
            while ($row = $res->fetch_assoc()) {

                $c1 = new Classroom();

                $c1->setClassId($row['class_id']);
                $c1->setClassBuilding($row['building']);
                $c1->setClassSeats($row['number_of_seats']);
                $c1->setClassFloor($row['floor']);
                $c1->setClassMulti($row['multimedia']);
                $c1->setClassAirCon($row['air_condition']);

                $arr[] = $c1;
            }
        }

        return $arr;
    }

    public function deleteClassroom($classId)
    {
        global $conn;

        $sql = "DELETE FROM classroom WHERE class_id LIKE '$classId';";

        $conn->query($sql);
    }

    public function viewAClassroom($classId){

        global $conn;

        $sql  = "SELECT * FROM classroom WHERE class_id='$classId'; ";

        $c1 = new Classroom();

        $res = $conn->query($sql);

        while($row=$res->fetch_assoc()){


            $c1->setClassId($row['class_id']);
            $c1->setClassBuilding($row['building']);
            $c1->setClassSeats($row['number_of_seats']);
            $c1->setClassFloor($row['floor']);
            $c1->setClassMulti($row['multimedia']);
            $c1->setClassAirCon($row['air_condition']);

        }

        return $c1;
    }


}