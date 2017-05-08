<?php
include_once ("includes/db.inc.php");

class postDetail{
    private $m_iImage;

    public function getImage()
    {
        return $this->m_iImage;
    }

    public function setImage($m_iImage)
    {
        $this->m_iImage = $m_iImage;
    }

    public function getImageID($p_sProperty){
        global $conn;
        $this->m_iImageID = $p_sProperty;
        $result = array();

        $statement = $conn->prepare("
                                    SELECT *
                                    FROM posts
                                    WHERE imageID = :imageID");
        $statement->bindValue(':imageID', $this->m_iImageID );
        $statement->execute();

        if($statement->rowCount() == 1){
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function getUsername($p_sProperty){
        global $conn;
        $this->m_iImageID = $p_sProperty;
        $getUserID = $conn->prepare("
                                    SELECT FK_userid
                                    FROM posts
                                    WHERE image = :image");
        $getUserID->bindValue(':image', $this->getImage() );
        $getUserID->execute();
        $userID = $getUserID->fetch(PDO::FETCH_ASSOC);

        $username = $conn->prepare("SELECT username
                                    FROM users
                                    WHERE userID = :userID");
        $username->bindValue(':userID', $userID['imageUserID']);
        $username->execute();
        $result = $username->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getPostHour($p_sProperty){
        global $conn;
        $this->m_iImageID = $p_sProperty;
        $postTime = $conn->prepare("SELECT timestamp
                                   FROM posts
                                   WHERE imageID = :imageID");
        $postTime->bindValue(':imageID', $this->m_iImageID);
        $postTime->execute();
        $postTime = $postTime->fetch(PDO::FETCH_ASSOC);

        $currentTime = strtotime(date('Y-m-d H:i:s'));
        $postedTime = strtotime($postTime['timestamp']);

        $difference = $currentTime - $postedTime;
        $days = $difference/60/60/24;
        $hour = $difference/(60*60);
        $minutes = (abs($difference)/60);

        if(number_format($minutes, 0) < 1)
        {
            $result = "A moment ago";
        }
        elseif(number_format($hour, 0) < 1)
        {
            $result = number_format($minutes, 0). " minutes ago" ;
        }
        elseif(number_format($hour, 0) < 24)
        {
            $result = number_format($hour, 0)."h";
        }
        else
        {
            $result = number_format($days, 0)." days ago";
        }
        return $result;
    }

    public function countComments($p_sProperty){
        global $conn;
        $this->m_iImageID = $p_sProperty;
        $countComments = $conn->prepare("SELECT commentImageID
                                     FROM comments
                                     WHERE commentImageID = :likeImageID");
        $countComments->bindValue(":likeImageID", $this->m_iImageID);
        $countComments->execute();

        $result = $countComments->rowCount();

        return $result;
    }

    public function getUserID($p_sProperty){
        global $conn;
        $this->m_iImageID = $p_sProperty;
        $getUserID = $conn->prepare("
                                    SELECT imageUserID
                                    FROM posts
                                    WHERE imageID = :imageID");
        $getUserID->bindValue(':imageID', $this->m_iImageID );
        $getUserID->execute();
        $userID = $getUserID->fetch(PDO::FETCH_ASSOC);

        $result = $userID;

        return $result;
    }

    public function getDescription ($p_sProperty){
        global $conn;
        $this->m_iImageID = $p_sProperty;
        $getDescription = $conn->prepare("SELECT description
                                          FROM posts
                                          WHERE imageID = :imageID");
        $getDescription->bindValue(':imageID', $this->m_iImageID );
        $getDescription->execute();
        $description = $getDescription->fetch(PDO::FETCH_ASSOC);

        return $description;
    }

    public function getComments($p_sProperty){
        global $conn;
        $this->m_iImageID = $p_sProperty;
        $getComments = $conn->prepare("SELECT * from comments where commentImageID = :imageID");
        $getComments->bindValue(':imageID', $this->m_iImageID);
        $getComments->execute();
        $comments = $getComments->fetchAll();
        return $comments;
        $this->m_oComments = $comments;
    }
}