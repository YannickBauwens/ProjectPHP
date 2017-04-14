<?php

include_once("classes/topics.class.php");
include_once ("includes/no-session.inc.php");

$topic = new Topic();
$topic->getFeed();

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMDterest</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>IMDterest</h1>

    <div></div>

    </div>
        <a href="includes/logout.inc.php">Log out</a>
    </div>

    <?php foreach( $topic as $post ): ?>
        <div class="topics" >
            <p><?php echo $post['name']; ?></p><br>
        </div>
    <?php endforeach; ?>

</body>
</html>