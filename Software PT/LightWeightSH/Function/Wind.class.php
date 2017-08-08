<?php
class Wind{
    private $W_Id;
    private $W_Addr;
    private $W_Speed;
    private $W_Hometemp;
    private $W_Starttime;
    private $W_Issmart;
    private $W_Fittemp;
	/**
     * @return the $W_Id
     */
    public function getW_Id()
    {
        return $this->W_Id;
    }

	/**
     * @return the $W_Addr
     */
    public function getW_Addr()
    {
        return $this->W_Addr;
    }

	/**
     * @return the $W_Speed
     */
    public function getW_Speed()
    {
        return $this->W_Speed;
    }

	/**
     * @return the $W_Hometemp
     */
    public function getW_Hometemp()
    {
        return $this->W_Hometemp;
    }

	/**
     * @return the $W_Starttime
     */
    public function getW_Starttime()
    {
        return $this->W_Starttime;
    }

	/**
     * @return the $W_Issmart
     */
    public function getW_Issmart()
    {
        return $this->W_Issmart;
    }

	/**
     * @return the $W_Fittemp
     */
    public function getW_Fittemp()
    {
        return $this->W_Fittemp;
    }

	/**
     * @param field_type $W_Id
     */
    public function setW_Id($W_Id)
    {
        $this->W_Id = $W_Id;
    }

	/**
     * @param field_type $W_Addr
     */
    public function setW_Addr($W_Addr)
    {
        $this->W_Addr = $W_Addr;
    }

	/**
     * @param field_type $W_Speed
     */
    public function setW_Speed($W_Speed)
    {
        $this->W_Speed = $W_Speed;
    }

	/**
     * @param field_type $W_Hometemp
     */
    public function setW_Hometemp($W_Hometemp)
    {
        $this->W_Hometemp = $W_Hometemp;
    }

	/**
     * @param field_type $W_Starttime
     */
    public function setW_Starttime($W_Starttime)
    {
        $this->W_Starttime = $W_Starttime;
    }

	/**
     * @param field_type $W_Issmart
     */
    public function setW_Issmart($W_Issmart)
    {
        $this->W_Issmart = $W_Issmart;
    }

	/**
     * @param field_type $W_Fittemp
     */
    public function setW_Fittemp($W_Fittemp)
    {
        $this->W_Fittemp = $W_Fittemp;
    }

}
?>