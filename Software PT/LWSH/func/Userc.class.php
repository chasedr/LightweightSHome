<?php
class Userc{
    private $UCId;
    private $UCAddr;
    private $UCTime;
    private $UCOpr;
	/**
     * @return the $UCId
     */
    public function getUCId()
    {
        return $this->UCId;
    }

	/**
     * @return the $UCAddr
     */
    public function getUCAddr()
    {
        return $this->UCAddr;
    }

	/**
     * @return the $UCTime
     */
    public function getUCTime()
    {
        return $this->UCTime;
    }

	/**
     * @return the $UCOpr
     */
    public function getUCOpr()
    {
        return $this->UCOpr;
    }

	/**
     * @param field_type $UCId
     */
    public function setUCId($UCId)
    {
        $this->UCId = $UCId;
    }

	/**
     * @param field_type $UCAddr
     */
    public function setUCAddr($UCAddr)
    {
        $this->UCAddr = $UCAddr;
    }

	/**
     * @param field_type $UCTime
     */
    public function setUCTime($UCTime)
    {
        $this->UCTime = $UCTime;
    }

	/**
     * @param field_type $UCOpr
     */
    public function setUCOpr($UCOpr)
    {
        $this->UCOpr = $UCOpr;
    }

    
}
?>