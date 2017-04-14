<?php
      
    session_start();

    if(empty($_SESSION['user'])){
        header("Location: index.php");
    }else{

        spl_autoload_register(function ($class) {
            include_once '../classes/' . $class . '.class.php';
        });   

        $user = new User();
        $user->Id = $_GET['id'];
        if($user->checkIfUserExists()){
            $user->getDataFromDatabase();
        }else{
            header("Location: 404.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>My profile</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>

       <div class="alles">
            <div class="profile">
                <div class="About">

                   <div>
                        <h1 class="h1Profile"><?php echo $user->firstname . " " . $user->lastname; ?></h1>
                        <h3 class="h3Profile"><?php echo $user->username; ?></h2>
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