<?php
include_once('includes/no-session.inc.php');
include_once('includes/db.inc.php');
include_once('classes/Post.class.php');
include_once('classes/Feed.class.php');

$email = $_SESSION['email'];

    /*if (isset($_GET['txtSearch'])) {
        $searchKeyword = $_GET['txtSearch'];
        $results = array();
        $statement = $conn->prepare("SELECT *
                          FROM posts
                          WHERE description
                          LIKE :keywords");
        $statement->bindValue(':keywords', '%' . $searchKeyword . '%');
        $statement->execute();

        if ($statement->rowCount() >= 1) {
            $results = $statement->fetchAll();
            $countPosts = $statement->rowCount();
        } else {
            $errorMessage = "No matching results with: ".$_GET['txtSearch'];
        }
    }*/

    if (!empty($_GET)) {
        $searchKeyword = $_GET['txtSearch'];
        $feed = new Feed();
        try {
            $feed->setKeyword($txtSearch);
            $feed->search();
        } catch (Exception $e) {
            $e->getMessage();
        }
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

<?php include_once("includes/nav.inc.php"); ?>

<p><?php if (isset($e)) {
    echo htmlspecialchars($e);
} ?></p>

<?php foreach ($results->getResult() as $result): ?>
    <div class="col-lg-3 col-md-4 col-xs-6 thumb" >

        <div class="thumbnail" >
            <a id="user" href="index.php"><?php echo htmlspecialchars($email); ?></a >

            <a href="index.php"><img src="<?php echo htmlspecialchars($result['image']) ?>" alt="img"></a>

            <div class="caption post-content" >
                <div class="reactions" >
                    <p id = "likes" ><span class="glyphicon glyphicon-thumbs-up" aria - hidden = "true" ></span > 15</p >
                    <p id = "dislikes" ><span class="glyphicon glyphicon-thumbs-down" aria - hidden = "true" ></span > 15</p >
                </div >

                <p><?php echo htmlspecialchars($result['description']); ?></p>

            </div>

        </div >

    </div >
<?php endforeach; ?>

</body>
</html>










