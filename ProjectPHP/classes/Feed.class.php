<?php
//include_once("includes/db.inc.php");
include_once ("Db.class.php");
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


    public function getProfileFeed()
    {
        global $conn;

        $statement = $conn->prepare("select * from posts WHERE ");
        $statement->execute();

        $this->m_sResult = $statement->fetchAll();
        return $this->m_sResult;
    }




    public function countLikes($p_postid){

        $conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");

        $statement = $conn->prepare("select * from Likes WHERE FK_posts = $p_postid"  );
        $statement->execute();
        $arr = $statement->fetchAll();
        $number = count($arr);
        return $number;

    }

    public function check($postid, $p_userid) {
        $conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");

        $liked = "Not empty";
        $unliked = "Like";


        $statement = $conn->prepare("select * from likes WHERE FK_posts = $postid AND FK_userid = $p_userid");
        $statement->execute();
        $arr =  $statement->fetchAll();

        if(!empty($arr)){

            return $liked;

        }else
        {

            return $unliked;

        }

    }

}
