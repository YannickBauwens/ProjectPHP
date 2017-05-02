<?php

    include_once("includes/no-session.inc.php");

    spl_autoload_register(function ($class) {
        include_once 'classes/' . $class . '.class.php';
    });

    $user = new User();
    $user->Id = $_GET['id'];
    if ($user->checkIfUserExists()) {
        $user->getDataFromDatabase();
    } else {
        header("Location: 404.php");
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

       <div class="alles">
            <div class="profile">
                <div class="About">

                   <div>
                        <h1 class="h1Profile"><?php echo $user->firstname . " " . $user->lastname; ?></h1>
                        <h2 class="h3Profile"><?php echo $user->username; ?></h2>
                        <form action="settings.php" class="formProf">
                            <input type="submit" value="Edit profile">
                        </form>
                    </div>

                    <img class="profile-picture" src="<?php echo $user->Avatar; ?>">
                    <br class=“clearfix”>

                </div>

                <div class="profile-information">
                    <div class="profile-information-item">
                        <span>Photos</span>
                        <span class="amount"><?php echo $user->PhotosNr; ?></span>
                    </div>
                    <div class="profile-information-item">
                        <span>Followers</span>
                        <span class="amount"><?php echo $user->FollowersNr; ?></span>
                    </div>
                    <div class="profile-information-item">
                        <span>Following</span>
                        <span class="amount"><?php echo $user->FollowingNr; ?></span>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        
        </div>
        
</body>

</html>