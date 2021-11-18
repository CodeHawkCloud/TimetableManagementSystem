<?php


    include dirname(__FILE__) . '/../services/IClassroomServiceImplementation.php';


    if (isset($_POST['btn_update_classroom_form'])) {

        $classId = $_GET['classId'];
        $classBuilding = $_POST['class_update_building'];
        $classSeats = $_POST['class_update_seats'];
        $classFloor = $_POST['class_update_floor'];
        $classMulti = $_POST['classroom_update_multi'];
        $classAirCon  = $_POST['classroom_update_ac'];

        $classImp = new IClassroomServiceImplementation();

        $class = new Classroom();

        $class->setClassId($classId);
        $class->setClassBuilding($classBuilding);
        $class->setClassSeats($classSeats);
        $class->setClassFloor($classFloor);
        $class->setClassMulti($classMulti);
        $class->setClassAirCon($classAirCon);

        $classImp->updateClassroom($class);

        $url = "../classroom_admin_view_page.php?classroomUpdate=true&classId=".$classId;
        header('Location: ' . $url);
        exit();


    }




