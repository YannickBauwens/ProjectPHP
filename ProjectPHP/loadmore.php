<?php

include_once("classes/User.class.php");
include_once("classes/Feed.class.php");

$feed = new Feed();

$conn = new PDO('mysql:host=localhost; dbname=IMDterest', 'root', '');
$statement = $conn->prepare("select * from posts limit :result,  5");
$statement->bindValue(":result", $_POST['getresult']);
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    echo"   
        <img src='".$row['image']."' alt='img'>
        <p>".$row['description']."</p>
    ";
}
