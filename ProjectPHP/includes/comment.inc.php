<?php
    if(!isset($_SESSION)){session_start();}
    include_once ("db.inc.php");
    //userID
    $userid = $_POST['userID'];
    if(isset($_POST['newComment'])){
        $text = $_POST['newComment'];
    }

    if(!empty($commentText)) {
        $statement = $conn->prepare("INSERT INTO comments (userid, text)
                                      VALUES (:userid, :text)");
        $statement->bindValue(':userid',$UserID);
        $statement->bindValue(':text', $text);
        $statement->execute();
    }
?>