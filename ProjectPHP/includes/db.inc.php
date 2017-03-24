<?php
$servername = "localhost";
$dbname = "IMDterest";
$username = "root";
$password = "";

    try{
        $conn = new PDO("mysql:$servername;dbname=$dbname", $username, $password);
    }
    catch(PDOException $e){
        echo "Connection failed " . $e->getMessage();
    }