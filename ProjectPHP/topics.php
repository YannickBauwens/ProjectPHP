<?php
include_once("classes/Topics.class.php");

$topic = new Topic();
$topic->readTopic();

if (!empty($_POST)) {
    $selected = $_POST['topic'];
    $topic->setTopic($selected);
    $topic->saveTopic();
}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMDterest</title>
    <link rel="stylesheet" href="css/reset.css">
    <!--<link rel="stylesheet" href="css/style.css">-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>

<h1>Welcome to IMDterest!</h1>
<h2>Choose your favorite topics</h2>

<form action="" action="post">
    <select multiple class="thumbnail" name="topic" id="topic">
        <?php foreach ($topic->getResult() as $t): ?>
            <option value=""><?php echo $t['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Save topics</button>
</form>

</body>
</html>