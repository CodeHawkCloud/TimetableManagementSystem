<?php

    include dirname(__FILE__).'/../services/ISubjectServiceImplementation.php';

    if(isset($_POST['subject_admin_delete_modal'])){

        $subjectDeleteId = $_GET['idFromModal'];

        $subServiceImp = new ISubjectServiceImplementation();

        $subServiceImp->deleteSubject($subjectDeleteId);

        $url = "../subject_admin_view_page.php?deleteSub=true&deleteId=".$subjectDeleteId;
        header('Location: ' . $url);


    }