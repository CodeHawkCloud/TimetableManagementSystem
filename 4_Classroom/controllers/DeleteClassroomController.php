<?php

    include dirname(__FILE__).'/../services/IClassroomServiceImplementation.php';

    if(isset($_POST['classroom_admin_delete_modal'])){

        $deleteId  = $_GET['idFromModal'];

        $classServImp = new IClassroomServiceImplementation();
        $classServImp->deleteClassroom($deleteId);

        $url = "../classroom_admin_view_page.php?deleteClassroom=true&deleteId=".$deleteId;
        header('Location: ' . $url);
        exit();

    }