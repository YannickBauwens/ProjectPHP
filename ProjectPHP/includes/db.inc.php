<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
    }
    catch(PDOException $e){
        echo "Connection failed " . $e->getMessage();
    }