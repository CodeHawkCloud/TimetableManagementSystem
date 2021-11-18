<?php

include dirname(__FILE__).'/../models/Subject.php';

interface ISubjectService
{

    public function viewAllSubjects();

    public function deleteSubject($sub_id);

    public function addSubject(Subject $subject);

    public function updateSubject(Subject $sub);

    public function viewASubject($subId);
}