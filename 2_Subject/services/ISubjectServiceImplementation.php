<?php

include ("ISubjectService.php");
include dirname(__FILE__).'/../../3_Timetable/mysql_db_connection.inc.php';

class ISubjectServiceImplementation implements ISubjectService
{

    public function viewAllSubjects()
    {
        global $conn;

        $sql  = "SELECT * FROM subject; ";

        $res = $conn->query($sql);

        $arr = array();

        if($res->num_rows>0){
            while($row = $res->fetch_assoc()){

                $s1 = new Subject();

                $s1->setSubId($row['subject_id']);
                $s1->setSubName($row['subject']);
                $s1->setSubReference($row['reference']);
                $s1->setSubDesc($row['description']);

                $arr[] = $s1;
            }
        }

        return $arr;
    }

    public function deleteSubject($sub_id)
    {
        global $conn;

        $sql = "DELETE FROM subject WHERE subject_id LIKE '$sub_id';";

        $conn->query($sql);

    }

    public function addSubject(Subject $sub)
    {
        global $conn;

        $tempSubId = $sub->getSubId();
        $tempSubName = $sub->getSubName();
        $tempRef = $sub->getSubReference();
        $tempDesc = $sub->getSubDesc();

        $sql = "INSERT INTO subject(subject_id,subject,reference,description) VALUES ('$tempSubId','$tempSubName', '$tempRef', '$tempDesc');";
        $conn->query($sql);
    }

    public function updateSubject(Subject $sub)
    {
        global $conn;

        $tempId = $sub->getSubId();
        $tempSub = $sub->getSubName();
        $tempRef = $sub->getSubReference();
        $tempDesc = $sub->getSubDesc();

        $sql = "UPDATE subject SET subject='$tempSub',reference='$tempRef',description='$tempDesc' WHERE subject_id LIKE'$tempId';";

        $conn->query($sql);
    }

    public function viewASubject($subId){

        global $conn;

        $sql  = "SELECT * FROM subject WHERE subject_id='$subId'; ";

        $res = $conn->query($sql);

        $s1 = new Subject();

        while($row = $res->fetch_assoc()) {

            $s1->setSubId($row['subject_id']);
            $s1->setSubName($row['subject']);
            $s1->setSubReference($row['reference']);
            $s1->setSubDesc($row['description']);

        }

        return $s1;

    }


}