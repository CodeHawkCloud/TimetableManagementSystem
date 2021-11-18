<?php


class Classroom
{
    private  $class_id;
    private  $class_building;
    private  $class_seats;
    private  $class_floor;
    private  $class_multi;
    private  $class_airCon;

    /**
     * Classroom constructor.
     * @param $class_id
     * @param $class_building
     * @param $class_seats
     * @param $class_floor
     * @param $class_multi
     * @param $class_airCon
     * @param bool $classInitialized
     */
    public function __construct()
    {
        $this->class_id = 0;
        $this->class_building = "";
        $this->class_seats = "";
        $this->class_floor = "";
        $this->class_multi = "";
        $this->class_airCon = "";
    }

    /**
     * @return int
     */
    public function getClassId()
    {
        return $this->class_id;
    }

    /**
     * @param int $class_id
     */
    public function setClassId($class_id)
    {
        $this->class_id = $class_id;
    }


    /**
     * @return string
     */
    public function getClassBuilding()
    {
        return $this->class_building;
    }

    /**
     * @param string $class_building
     */
    public function setClassBuilding($class_building)
    {
        $this->class_building = $class_building;
    }

    /**
     * @return string
     */
    public function getClassSeats()
    {
        return $this->class_seats;
    }

    /**
     * @param string $class_seats
     */
    public function setClassSeats($class_seats)
    {
        $this->class_seats = $class_seats;
    }

    /**
     * @return string
     */
    public function getClassFloor()
    {
        return $this->class_floor;
    }

    /**
     * @param string $class_floor
     */
    public function setClassFloor($class_floor)
    {
        $this->class_floor = $class_floor;
    }

    /**
     * @return string
     */
    public function getClassMulti()
    {
        return $this->class_multi;
    }

    /**
     * @param string $class_multi
     */
    public function setClassMulti($class_multi)
    {
        $this->class_multi = $class_multi;
    }

    /**
     * @return string
     */
    public function getClassAirCon()
    {
        return $this->class_airCon;
    }

    /**
     * @param string $class_airCon
     */
    public function setClassAirCon($class_airCon)
    {
        $this->class_airCon = $class_airCon;
    }





}