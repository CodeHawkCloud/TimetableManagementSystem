<?php


class Subject
{

    private  $sub_id;
    private  $sub_name;
    private  $sub_reference;
    private  $sub_desc;

    /**
     * Subject constructor.
     * @param $sub_id
     * @param $sub_name
     * @param $sub_reference
     * @param $sub_desc
     */
    public function __construct()
    {
        $this->sub_id = "";
        $this->sub_name = "";
        $this->sub_reference = "";
        $this->sub_desc = "";
    }

    /**
     * @return mixed
     */
    public function getSubId()
    {
        return $this->sub_id;
    }

    /**
     * @param mixed $sub_id
     */
    public function setSubId($sub_id)
    {
        $this->sub_id = $sub_id;
    }

    /**
     * @return mixed
     */
    public function getSubName()
    {
        return $this->sub_name;
    }

    /**
     * @param mixed $sub_name
     */
    public function setSubName($sub_name)
    {
        $this->sub_name = $sub_name;
    }

    /**
     * @return mixed
     */
    public function getSubReference()
    {
        return $this->sub_reference;
    }

    /**
     * @param mixed $sub_reference
     */
    public function setSubReference($sub_reference)
    {
        $this->sub_reference = $sub_reference;
    }

    /**
     * @return mixed
     */
    public function getSubDesc()
    {
        return $this->sub_desc;
    }

    /**
     * @param mixed $sub_desc
     */
    public function setSubDesc($sub_desc)
    {
        $this->sub_desc = $sub_desc;
    }

    /**
     * Subject constructor.
     */





}