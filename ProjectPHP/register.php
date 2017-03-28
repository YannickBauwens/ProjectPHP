<?php
    include_once ("classes/User.class.php");

    if( !empty( $_POST ) ){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ( !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen(trim($firstname)) === 0 || strlen(trim($lastname)) === 0
            || strlen(trim($username)) === 0 || strlen(trim($password)) === 0 )
        {
            $errorMessage = "Please fill in all fields.";
            $error = true;
        }
        else{
            $errorMessage = "";
            $error = false;
        }

        if( $error == false)
        {
            $user = new User();
            $user->setMSFirstname($firstname);
            $user->setMSLastname($lastname);
            $user->setMSEmail($email);
            $user->setMSUsername($username);
            $user->setMSPassword($password);
            $user->Register();

            header('Location: login.php');
        }
    }

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Register</h1>

    <form action="" method="post">

        <div>
            <?php
            if( isset($error) ) {
                echo "<p class='error'>$errorMessage</p>";
            }
            ?>
        </div>

        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname">

        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname">

        <label for="email">email</label>
        <input type="text" name="email" id="email">

        <label for="username">Username</label>
        <input type="text" name="username" id="username">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button type="submit">Register</button>
    </form>
</body>
</html>