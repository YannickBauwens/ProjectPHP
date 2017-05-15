<?php
    session_start();

    include_once("classes/User.class.php");

    if (!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
        $user->Login();

        if ($user->Login()) {
            $_SESSION['email'] = $email;
            header('Location: index.php');
        } else {
            $error = "Username or password is incorrect.";
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





    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Log in</h3>
        </div>
        <div class="panel-body">
            <form action="" method="post">
                <label for="email">email</label>
                <input type="text" name="email" id="email"></br>

                <label for="password">Password</label>
                <input type="password" name="password" id="password"></br>

                <button type="submit">Login</button>

                <?php
                if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                }

                ?>
            </form>

        </div>

</body>
</html>