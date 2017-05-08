<?php
include_once("includes/db.inc.php");

class Post
{
    private $m_sImage;
    private $m_sUrl;
    private $m_sDescription;

    public function setUrl($p_sUrl)
    {
        $this->m_sUrl = $p_sUrl;
    }

    public function getUrl()
    {
        return $this->m_sUrl;
    }

    public function setImage($p_sImage)
    {
        $this->m_sImage = $p_sImage;
    }

    public function getImage()
    {
        return $this->m_sImage;
    }

    public function setDescription($p_sDescription)
    {
        $this->m_sDescription = $p_sDescription;
    }

    public function getDescription()
    {
        return $this->m_sDescription;
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

    public function savePost($p_iUserid)
    {

        //input type file heeft bestaat uit een array aan gegevens

        $target_dir = "./images/posts/";
        $tmp_name = $_FILES['fileToUpload']['tmp_name'];
        $t = time();
        $new_name =  $p_iUserid."_".$t;
        //explode splits de string in twee. de eerste meegegeven parameter geeft aan waar exact gesplits moet worden, de tweede parameter waarin
        $type = explode("/", $_FILES['fileToUpload']['type']);
        $type = $type[1];

        $stringToDB = $target_dir. $new_name . "." . $type;


        //bestaande php functie, 2 paramaters:
        // parameter 1 = de filenaam, tmp file name in de var files
        //parameter =strning naar db. locatie waar en hoe het moet opgeslagen woorden dus
        if (move_uploaded_file($tmp_name, $stringToDB)) {
            global $conn;
            $statement = $conn->prepare("insert into posts (image, description, FK_userid)
                                     values (:image, :description, :fk_userid)");
            //imqge opvullen met locatie van de afb
            $statement->bindValue(":image", $stringToDB);
            //description opvullen met uw mem var die ge hebt geset in upload.php en nu met uw get terug returnt
            $statement->bindValue(":description", $this->getDescription());
            //in upload.php wordt de user id uit de session gehaaldd en meegegeven met de savepos functie als parameter
            $statement->bindValue(":fk_userid", $p_iUserid);


            if ($statement->execute()) {
                echo "Je post is met succes geuploqd";
            } else {
                echo "Helaas er ging iets mis";
            }
        } else {
            echo "Helaas er ging iets mis";
        }
    }
    // url kolom mag NULL zijn, moest ik hem toevoegen haha
}
