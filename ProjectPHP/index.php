<?php

include_once("includes/no-session.inc.php");
include_once("classes/Feed.class.php");
include_once("classes/User.class.php");

session_start();

/*

if (!isset($_SESSION['FirstVisit'])) {
    $_SESSION['FirstVisit'] = 1;
    header("Location: topics.php");
} else {
    header("Location: index.php");
}*/

$email = $_SESSION['email'];
$feed = new Feed();
$feed->getFeed();
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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>

<?php include_once("includes/nav.inc.php"); ?>

<h1>IMDterest</h1>

<?php foreach ($feed->getFeed() as $f): ?>
    <div id="responseContainer" class="col-lg-3 col-md-4 col-xs-6 thumb">


        <div class="thumbnail">
            <a id="user" href="profile.php?user=<?php echo $f['FK_userid'] ?>"><?php echo $email; ?></a>

            <a href="postDetail.php?post=<?php echo $f['id'] ?>"><img src="<?php echo $f['image'] ?>" alt="img"></a>

            <div class="caption post-content">
                <div class="reactions">

                    <form action="post">

                        <?php $numberoflikes = $feed->countLikes($f["id"]) ?>

                        <input type="text" id="likes<?php echo $f['id'] ?>" value="<?php echo $numberoflikes ?>"
                        <!-- hoe vaak komt hij post ID tegen in likes tabel - dit telt hij op -->


                        <input id="likeButton<?php echo $f['id'] ?>" type="button" class="glyphicon glyphicon-thumbs-up"
                               onclick="toggleLike('<?php echo $f['id']; ?>')"
                               value="<?= $feed->check($f["id"], $_SESSION['id']); ?>"/>


                    </form>


                </div>

                <p><?php echo $f['description']; ?></p>

            </div>

        </div>

    </div>
<?php endforeach; ?>

<input type="hidden" id="result_no" value="1">
<button class="btnLoadMore">Load more</button>

<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="js/like.js"></script>

</body>
</html>