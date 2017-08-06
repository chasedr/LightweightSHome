<?php
class Light{
	private $L_Id;
	private $L_Addr;
	private $L_Tone;
	private $L_Bright;
	private $L_Starttime;
	private $L_Endtime;
	private $L_Issmart;
	private $L_FitBright;
	/**
     * @return the $L_Id
     */
    public function getL_Id()
    {
        return $this->L_Id;
    }

	/**
     * @return the $L_Addr
     */
    public function getL_Addr()
    {
        return $this->L_Addr;
    }

	/**
     * @return the $L_Tone
     */
    public function getL_Tone()
    {
        return $this->L_Tone;
    }

	/**
     * @return the $L_Bright
     */
    public function getL_Bright()
    {
        return $this->L_Bright;
    }

	/**
     * @return the $L_Starttime
     */
    public function getL_Starttime()
    {
        return $this->L_Starttime;
    }

	/**
     * @return the $L_Endtime
     */
    public function getL_Endtime()
    {
        return $this->L_Endtime;
    }

	/**
     * @return the $L_Issmart
     */
    public function getL_Issmart()
    {
        return $this->L_Issmart;
    }

	/**
     * @return the $L_FitBright
     */
    public function getL_FitBright()
    {
        return $this->L_FitBright;
    }

	/**
     * @param field_type $L_Id
     */
    public function setL_Id($L_Id)
    {
        $this->L_Id = $L_Id;
    }

	/**
     * @param field_type $L_Addr
     */
    public function setL_Addr($L_Addr)
    {
        $this->L_Addr = $L_Addr;
    }

	/**
     * @param field_type $L_Tone
     */
    public function setL_Tone($L_Tone)
    {
        $this->L_Tone = $L_Tone;
    }

	/**
     * @param field_type $L_Bright
     */
    public function setL_Bright($L_Bright)
    {
        $this->L_Bright = $L_Bright;
    }

	/**
     * @param field_type $L_Starttime
     */
    public function setL_Starttime($L_Starttime)
    {
        $this->L_Starttime = $L_Starttime;
    }

	/**
     * @param field_type $L_Endtime
     */
    public function setL_Endtime($L_Endtime)
    {
        $this->L_Endtime = $L_Endtime;
    }

	/**
     * @param field_type $L_Issmart
     */
    public function setL_Issmart($L_Issmart)
    {
        $this->L_Issmart = $L_Issmart;
    }

	/**
     * @param field_type $L_FitBright
     */
    public function setL_FitBright($L_FitBright)
    {
        $this->L_FitBright = $L_FitBright;
    }

	
}
?>