<?php
include_once("includes/db.inc.php");
class Feed
{
    private $m_iUserID;
    private $m_sResult;
    public function getUserID()
    {
        return $this->m_iUserID;
    }
    public function setUserID($m_iUserID)
    {
        $this->m_iUserID = $m_iUserID;
    }
    public function getResult()
    {
        return $this->m_sResult;
    }
    public function setResult($m_sResult)
    {
        $this->m_sResult = $m_sResult;
    }
    public function getFeed()
    {
        global $conn;
        $statement = $conn->prepare("select * from posts limit 5");
        $statement->execute();
        $this->m_sResult = $statement->fetchAll();
        return $this->m_sResult;
    }
}
