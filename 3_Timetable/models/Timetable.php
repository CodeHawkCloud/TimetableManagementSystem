<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

class Timetable
{

    private static $timetable_id;
    private static $initialized = false;

    private static function timetableInitialize($time){
        if (self::$initialized)
            return;

        self::$timetable_id = $time;
        self::$initialized = true;
    }

    /**
     * @return string
     * getter
     */
    public static function getTimetableId()
    {
        return self::$timetable_id;
    }

    /**
     * @param string $timetable_id
     * setter
     */
    public static function setTimetableId($timetable_id)
    {
        self::timetableInitialize($timetable_id);
    }


}
