<?php
class L_record{
    private $LRId;
    private $LRAddr;
    private $LRBright;
    private $LRTime;
	/**
     * @return the $LRId
     */
    public function getLRId()
    {
        return $this->LRId;
    }

	/**
     * @return the $LRAddr
     */
    public function getLRAddr()
    {
        return $this->LRAddr;
    }

	/**
     * @return the $LRBright
     */
    public function getLRBright()
    {
        return $this->LRBright;
    }

	/**
     * @return the $LRTime
     */
    public function getLRTime()
    {
        return $this->LRTime;
    }

	/**
     * @param field_type $LRId
     */
    public function setLRId($LRId)
    {
        $this->LRId = $LRId;
    }

	/**
     * @param field_type $LRAddr
     */
    public function setLRAddr($LRAddr)
    {
        $this->LRAddr = $LRAddr;
    }

	/**
     * @param field_type $LRBright
     */
    public function setLRBright($LRBright)
    {
        $this->LRBright = $LRBright;
    }

	/**
     * @param field_type $LRTime
     */
    public function setLRTime($LRTime)
    {
        $this->LRTime = $LRTime;
    }

    
}
?>