<?php
include_once("includes/db.inc.php");

class Post
{
    private $m_sImage;
    private $m_sUrl;
    private $m_sDescription;

    public function getUrl()
    {
        return $this->m_sUrl;
    }

    public function setUrl($m_sUrl)
    {
        $this->m_sUrl = $m_sUrl;
    }

    public function getImage()
    {
        return $this->m_sImage;
    }

    public function setImage($m_sImage)
    {
        $this->m_sImage = $m_sImage;
    }

    public function getDescription()
    {
        return $this->m_sDescription;
    }

    public function setDescription($m_sDescription)
    {
        $this->m_sDescription = $m_sDescription;
    }

    public function saveUrl($m_sUrl)
    {
        global $conn;
        require 'simple_html_dom.php';
        $html  = file_get_html($m_sUrl);

        $statement = $conn->prepare("insert into posts (image, url, description)
                                     values (:image, :url, :description)");
        $statement->bindValue(":image", $html->find('title', 0));
        $statement->bindValue(":url", $this->getUrl());
        $statement->bindValue(":description", $html->find('img', 0));
    }

    public function savePost()
    {
        global $conn;
        $statement = $conn->prepare("insert into posts (image, url, description)
                                     values (:image, :url, :description)");
        $statement->bindValue(":image", $this->getImage());
        $statement->bindValue(":url", $this->getUrl());
        $statement->bindValue(":description", $this->getDescription());
        if ($statement->execute()) {
            header('Location: index.php');
        }
    }
}
