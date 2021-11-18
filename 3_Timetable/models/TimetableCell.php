<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

class TimetableCell
{
    private static $timeId;
    private static $tutor1;
    private static $tutor2;
    private static $classType;
    //subject id refers to the subject identification by the subject name
    private static $subjectId;
    private static $startTime;
    private static $minStart;
    private static $endTime;
    private static $day;
    private static $tcInitialized = false;


    private static function timetableCellInitialize($timeId,$tutor1,$tutor2,$classType,$subject,$start,$end,$day1){
        if(self::$tcInitialized){
            return;
        }
        self::$timeId = $timeId;
        self::$tutor1 = $tutor1;
        self::$tutor2 = $tutor2;
        self::$classType = $classType;
        self::$subjectId = $subject;
        self::$startTime = $start;
        self::$endTime = $end;
        self::$day = $day1;
    }

    /**
     * @return mixed
     */
    public static function getTimeId()
    {
        return self::$timeId;
    }

    /**
     * @param mixed $timeId
     */
    public static function setTimeId($timeId)
    {
        self::$timeId = $timeId;
    }

    /**
     * @return mixed
     */
    public static function getTutor1()
    {
        return self::$tutor1;
    }

    /**
     * @param mixed $tutor1
     */
    public static function setTutor1($tutor1)
    {
        self::$tutor1 = $tutor1;
    }

    /**
     * @return mixed
     */
    public static function getTutor2()
    {
        return self::$tutor2;
    }

    /**
     * @param mixed $tutor2
     */
    public static function setTutor2($tutor2)
    {
        self::$tutor2 = $tutor2;
    }

    /**
     * @return mixed
     */
    public static function getClassType()
    {
        return self::$classType;
    }

    /**
     * @param mixed $classType
     */
    public static function setClassType($classType)
    {
        self::$classType = $classType;
    }

    /**
     * @return mixed
     */
    public static function getSubjectId()
    {
        return self::$subjectId;
    }

    /**
     * @param mixed $subjectId
     */
    public static function setSubjectId($subjectId)
    {
        self::$subjectId = $subjectId;
    }

    /**
     * @return mixed
     */
    public static function getStartTime()
    {
        return self::$startTime;
    }

    /**
     * @param mixed $startTime
     */
    public static function setStartTime($startTime)
    {
        self::$startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public static function getMinStart()
    {
        return self::$minStart;
    }

    /**
     * @param mixed $minStart
     */
    public static function setMinStart($minStart)
    {
        self::$minStart = $minStart;
    }

    /**
     * @return mixed
     */
    public static function getEndTime()
    {
        return self::$endTime;
    }

    /**
     * @param mixed $endTime
     */
    public static function setEndTime($endTime)
    {
        self::$endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public static function getDay()
    {
        return self::$day;
    }

    /**
     * @param mixed $day
     */
    public static function setDay($day)
    {
        self::$day = $day;
    }





}