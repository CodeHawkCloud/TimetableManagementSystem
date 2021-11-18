<?php

include dirname(__FILE__).'/../services/ISubjectServiceImplementation.php';

//redirect to the add page
if(isset($_POST['btn_subject_add'])){

    $url = "../subject_admin_add_page.php";
    header('Location: ' . $url);
}


if(isset($_POST['btn_add_subject_form'])){

    $formSubId = $_POST['subject_add_id'];
    $formSubName = $_POST['subject_add_name'];

    $subServiceImp = new ISubjectServiceImplementation();

    $arr = $subServiceImp ->viewAllSubjects();

    if(count($arr) > 0){

        for($si = 0; $si < count($arr) ; $si++){

            $sub = $arr[$si];

            $arraySubName  = $sub->getSubName();
            $arraySubId = $sub->getSubId();

            if(strcmp("$formSubName", "$arraySubName")==0){

                $url = "../subject_admin_add_page.php?subjectNameExists=true&subjectName=".$formSubName."&subjectId=".$formSubId;
                header('Location: ' . $url);
                exit();

            }

            if(strcmp("$formSubId", "$arraySubId")==0){

                $url = "../subject_admin_add_page.php?subjectIdExists=true&subjectName=".$formSubName."&subjectId=".$formSubId;
                header('Location: ' . $url);
                exit();

            }

        }

    }

    //subject object created
    $subject = new Subject();

    $formRef = $_POST['subject_add_reference'];
    $formDesc = $_POST['subject_add_description'];

    $subject->setSubId($formSubId);
    $subject->setSubName($formSubName);
    $subject->setSubReference($formRef);
    $subject->setSubDesc($formDesc);

    $subServiceImp->addSubject($subject);

    $url = "../subject_admin_add_page.php?subjectAdded=true&subjectName=".$formSubName."&subjectId=".$formSubId;
    header('Location: ' . $url);

}