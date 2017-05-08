<?php
include_once('includes/no-session.inc.php');
include_once('classes/Post.class.php');


if (!empty($_POST)) {
    if (!empty($_FILES["fileToUpload"])) {
        $description = $_POST['description'];

        $post = new Post();

        $post->setDescription($description);
        $post->savePost($_SESSION['id']);
    } else {
        echo "Kies een foto om te uploaden";
    }
}

?>
<!DOCTYPE html>
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

<div>
    <div>
        <a href="index.php">Logo</a>
    </div>
    <h2>Upload an image</h2>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file"  name="fileToUpload" id="fileToUpload" />

            <input type="text" name="url" id="url"><br>

            <label for="description">Description:</label>
            <br>
            <textarea id="description" rows="5" cols="40" name="description"></textarea>
            <br />

            <input type="submit" name="submit" value="Upload Now!" />
        </form>

    </div>
</div>
</body>
</html>