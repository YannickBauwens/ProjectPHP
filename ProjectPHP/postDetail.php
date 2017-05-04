<?php
include_once ("includes/no-session.inc.php");
include_once ("classes/postDetail.class.php");
include_once ("classes/User.class.php");
$visible = "";
$email = $_SESSION['email'];

if(isset($_POST['imageID'])) {
    $post = new postDetail();
    $image = $post->getImageID($_POST['imageID']);
    $username = $post->getUsername($_POST['imageID']);
    $postTime = $post->getPostHour($_POST['imageID']);
    $userID = $post->getUserID($_POST['imageID']);
    $description = $post->getDescription($_POST['imageID']);
    $comments = $post->getComments($_POST['imageID']);
}

$i = "";

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>

<?php include_once ("includes/nav.inc.php"); ?>

    <div>
        <a id="user" href="profile.php"><?php echo $email; ?></a >
            <div>
                <ul>
                    <li><a href="profile.php?userID=<?php echo $comment['commentUserID']; ?>">
                        </a>
                        <span><?php echo $description['description']; ?></span>
                    </li>
                    <?php foreach( $comments as $comment): ?>
                        <li>
                            <a href="profile.php?userID=<?php echo $comment['commentUserID']; ?>">
                                <?php
                                $user = new Users();
                                $user->getProfile($comment['commentUserID']);
                                $username = $user->Username;
                                echo $username;
                                ?></a>
                            <p><?php echo $comment['commentText']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <form action="" method="post">
                    <input type="text" name="commentField" placeholder="Add a comment...">
                    <button type="submit" class="comment-btn-submit">Save</button>
                </form>
            </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>