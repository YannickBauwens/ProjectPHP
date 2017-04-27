<?php
include_once("includes/db.inc.php");

class Topic
{
    private $m_sResult;


    public function getResult()
    {
        return $this->m_sResult;
    }

    public function setResult($m_sResult)
    {
        $this->m_sResult = $m_sResult;
    }

    public function getTopic()
    {
        global $conn;

        $statement = $conn->prepare("select * from topics limit 20");
        $statement->execute();

        $this->m_sResult = $statement->fetchAll();
        return $this->m_sResult;
    }
}
