<?php
include_once('includes/no-session.inc.php');
include_once('classes/Post.class.php');

if(!empty($_POST)){
        $image = $_POST['image'];
        $url = $_POST['url'];
        $desc = $_POST['desc'];

        $p = new Post();
        $p->setMSImage($image);
        $p->setMSDescription($desc);
        $p->savePost();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IMDterest</title>
</head>

<body>

<div>
    <div>
        <a href="index.php">Logo</a>
    </div>
    <h2>Upload an image</h2>
    <div>
        <form action="" method="post">
            <input type="file"  name="image" id="image" />

            <input type="text" name="url" id="url"><br>

            <label for="description">Description:</label>
            <br>
            <textarea id="desc" rows="5" cols="40" name="desc"></textarea>
            <br />

            <input type="submit" name="submit" value="Upload Now!" />
        </form>

    </div>
</div>
</body>
</html>