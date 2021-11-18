<?php

include dirname(__FILE__).'/../services/ISubjectServiceImplementation.php';


if(isset($_POST['btn_update_subject_form'])) {

    $subId = $_GET['subId'];
    $subName = $_POST['subject_update_name'];
    $subRef = $_POST['subject_update_reference'];
    $subDesc = $_POST['subject_update_description'];

    $subServiceImp = new ISubjectServiceImplementation();

    $arr = $subServiceImp->viewAllSubjects();

    if (count($arr) > 0) {

        for ($si = 0; $si < count($arr); $si++) {

            $sub = $arr[$si];

            if (strcmp("$subId", $sub->getSubId())==0) {

                continue;
            }

            $arraySubName = $sub->getSubName();

            if(strcmp("$subName", "$arraySubName")==0){

                $url = "../subject_admin_edit_page.php?subjectNameExists=true&subjectName=".$subName."&subId=".$subId;
                header('Location: ' . $url);
                exit();

            }

        }

    }

    $subMain = new Subject();
    $subMain->setSubId($subId);
    $subMain->setSubName($subName);
    $subMain->setSubReference($subRef);
    $subMain->setSubDesc($subDesc);

    $subServiceImp ->updateSubject($subMain);

    $url = "../subject_admin_view_page.php?subjectUpdate=true&subjectName=" . $subName."&subjectId=".$subId;
    header('Location: ' . $url);
    exit();


}


