<?php
include_once("includes/db.inc.php");

class Topic
{
    private $m_sResult;
    private $m_sTopic;

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
        return $this->m_sTopic;
    }

    public function setTopic($m_sTopic)
    {
        $this->m_sTopic = $m_sTopic;
    }

    public function saveTopic()
    {
        global $conn;

        $statement = $conn->prepare("insert into user(topics) values (:topics)");
        $statement->bindValue(':topics', $this->getTopic());
        $statement->execute();

        $this->m_sResult = $statement->fetchAll();
        return $this->m_sTopic;
    }

    public function readTopic()
    {
        global $conn;

        $statement = $conn->prepare("select * from topics limit 20");
        $statement->execute();

        $this->m_sResult = $statement->fetchAll();
        return $this->m_sResult;
    }
}
