<?php

spl_autoload_register(function ($class) {
    include '../classes/' . $class . '.class.php';
});

session_start();



$feed = new Feed();
$check = $feed->check($_POST['postID'], $_SESSION['id']);

if ($check === "Like") {
    $conn = new PDO('mysql:host=localhost;dbname=IMDterest', "root", "");

    $statement = $conn->prepare("INSERT INTO likes (FK_posts, FK_userid)
                                         VALUES (:firstname, :lastname)");
    $statement->bindValue(":firstname", $_POST['postID']);
    $statement->bindValue(":lastname", $_SESSION['id']);
    $statement->execute();

    $response["status"] = "hooray";


} else {

    $conn = new PDO('mysql:host=localhost;dbname=IMDterest', "root", "");

    $statement = $conn->prepare("DELETE FROM likes WHERE (FK_posts = :firstname AND FK_userid =  :lastname)");
    $statement->bindValue(":firstname", $_POST['postID']);
    $statement->bindValue(":lastname", $_SESSION['id']);
    $statement->execute();

    $response["status"] = "bummer";
}

header('Content-type: application/json');
echo json_encode($response);

?>