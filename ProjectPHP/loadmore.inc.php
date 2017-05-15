<?php

include_once("classes/User.class.php");
include_once("classes/Feed.class.php");

$feed = new Feed();

$no = $_POST['getresult'];

$conn = new PDO('mysql:host=localhost; dbname=IMDterest', 'root', '');
$statement = $conn->prepare("select * from posts ORDER BY time desc limit '.$no.',  5");
$statement->execute();

while ($row = $statement->fetch(\PDO::FETCH_ASSOC))
{
    $feed['image'];

    /*echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb" >

            <a href="postDetail.php"><img src="'.hmtlspecialchars($feed['image']).'" alt="img"></a>

            <div class="caption post-content" >
                <div class="reactions" >
                    <p id = "likes" ><span class="glyphicon glyphicon-thumbs-up" aria - hidden = "true" ></span > 15</p >
                    <p id = "dislikes" ><span class="glyphicon glyphicon-thumbs-down" aria - hidden = "true" ></span > 15</p >
                </div >

                <p>'.htmlspecialchars($feed['description']).'</p>

            </div>

        </div >

    </div >';*/
}
