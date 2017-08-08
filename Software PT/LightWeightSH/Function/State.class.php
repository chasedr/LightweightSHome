<?php
class State{
    private $S_Addr;
    private $S_Type;
    private $S_Starttime;
    private $S_Endtime;
    private $S_Issmart;
    private $S_Fit;
	/**
     * @return the $S_Addr
     */
    public function getS_Addr()
    {
        return $this->S_Addr;
    }

	/**
     * @return the $S_Type
     */
    public function getS_Type()
    {
        return $this->S_Type;
    }

	/**
     * @return the $S_Starttime
     */
    public function getS_Starttime()
    {
        return $this->S_Starttime;
    }

	/**
     * @return the $S_Endtime
     */
    public function getS_Endtime()
    {
        return $this->S_Endtime;
    }

	/**
     * @return the $S_Issmart
     */
    public function getS_Issmart()
    {
        return $this->S_Issmart;
    }

	/**
     * @return the $S_Fit
     */
    public function getS_Fit()
    {
        return $this->S_Fit;
    }

	/**
     * @param field_type $S_Addr
     */
    public function setS_Addr($S_Addr)
    {
        $this->S_Addr = $S_Addr;
    }

	/**
     * @param field_type $S_Type
     */
    public function setS_Type($S_Type)
    {
        $this->S_Type = $S_Type;
    }

	/**
     * @param field_type $S_Starttime
     */
    public function setS_Starttime($S_Starttime)
    {
        $this->S_Starttime = $S_Starttime;
    }

	/**
     * @param field_type $S_Endtime
     */
    public function setS_Endtime($S_Endtime)
    {
        $this->S_Endtime = $S_Endtime;
    }

	/**
     * @param field_type $S_Issmart
     */
    public function setS_Issmart($S_Issmart)
    {
        $this->S_Issmart = $S_Issmart;
    }

	/**
     * @param field_type $S_Fit
     */
    public function setS_Fit($S_Fit)
    {
        $this->S_Fit = $S_Fit;
    }

}
?>