<?php
    include_once("classes/User.class.php");

    /*try{*/
        if (!empty($_POST)) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen(trim($firstname)) === 0 || strlen(trim($lastname)) === 0 || strlen(trim($password)) === 0) {
                $errorMessage = "Please fill in all fields.";
                $error = true;
            } else {
                $errorMessage = "";
                $error = false;
            }

            if ($error == false) {
                $user = new User();
                $user->setFirstname($firstname);
                $user->setLastname($lastname);
                $user->setEmail($email);
                $user->setPassword($password);
                $user->Register();

                header('Location: login.php');
            }
        //}
    }/*catch (Exception $e)
    {
        $error = $e->getMessage();
    }*/

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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Register</h3>
    </div>
    <div class="panel-body">
        <form action="" method="post">

            <div>
                <?php
                if (isset($error)) {
                    echo "<p class='error'>$errorMessage</p>";
                }
                ?>
            </div>

            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname"> </br>

            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname"></br>

            <label for="email">email</label>
            <input type="text" name="email" id="email"></br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password"></br>

            <button type="submit">Register</button>
        </form>
    </div>
</div>




</body>
</html>