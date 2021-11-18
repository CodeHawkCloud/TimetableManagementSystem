<?php

    include dirname(__FILE__).'/../services/IClassroomServiceImplementation.php';

    //redirect to the add page
    if(isset($_POST['btn_classroom_add'])){

        $url = "../classroom_admin_add_page.php";
        header('Location: ' . $url);
    }


    if(isset($_POST['btn_add_classroom_form'])) {

        $classId = $_POST['class_add_id'];

        $classServImp = new IClassroomServiceImplementation();

        $arr = $classServImp->viewAllClassrooms();

        if (count($arr) > 0) {

            for ($si = 0; $si < count($arr); $si++) {

                $class = $arr[$si];

                $arrayClassId = $class->getClassId();

                if (strcmp("$classId", "$arrayClassId") == 0) {

                    $url = "../classroom_admin_add_page.php?classExists=true&retClassId=" . $classId;
                    header('Location: ' . $url);
                    exit();

                }

            }

        }

        $class = new Classroom();

        $class->setClassId($classId);
        $class->setClassBuilding($_POST['class_building']);
        $class->setClassSeats($_POST['class_seats']);
        $class->setClassFloor($_POST['class_floor']);
        $class->setClassMulti($_POST['classroom_multi']);
        $class->setClassAirCon($_POST['classroom_ac']);

        $classServImp->addClassroom($class);

        $url = "../classroom_admin_add_page.php?classRoomAdded=true&retClassId=" . $classId;
        header('Location: ' . $url);
        exit();



    }


