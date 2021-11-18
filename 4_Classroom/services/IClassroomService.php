<?php

include dirname(__FILE__).'/../models/Classroom.php';

interface IClassroomService
{

    public function addClassroom(Classroom $c1);

    public function updateClassroom(Classroom $c1);

    public function viewAllClassrooms();

    public function deleteClassroom($classId);

}