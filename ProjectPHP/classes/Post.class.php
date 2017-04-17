<?php
include_once ("includes/db.inc.php");

class Post{
    private $m_sImage;
    private $m_sUrl;
    private $m_sDescription;

    public function getMSImage()
    {
        return $this->m_sImage;
    }

    public function setMSImage($m_sImage)
    {
        $this->m_sImage = $m_sImage;
    }

    public function getMSDescription()
    {
        return $this->m_sDescription;
    }

    public function setMSDescription($m_sDescription)
    {
        $this->m_sDescription = $m_sDescription;
    }

    public function savePost(){
        global $conn;
        $statement = $conn->prepare("insert into posts (image, description)
                                     values (:image, :description)");
        $statement->bindValue(":image", $this->getMSImage());
        $statement->bindValue(":description", $this->getMSDescription());
        if ($statement->execute()){
            header('Location: index.php');
        }
    }

}
