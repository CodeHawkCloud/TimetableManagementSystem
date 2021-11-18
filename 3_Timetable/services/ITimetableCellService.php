<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

//interface for the ITimetableCellService implementation
interface ITimetableCellService
{
    public function addTimetableCell();

    public function updateTimetableCell($timetableCellMainId,$subject,$tutor1,$tutor2,$type,$day,$startTime,$minStart);

    public function viewAllTimetableCells($timetableCellMainId,$day,$startTime,$minStart);

}