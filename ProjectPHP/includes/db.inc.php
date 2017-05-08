<?php
    /*try {
        $conn = new PDO("mysql:host=localhost;dbname=pieter1q_IMDterest", "pieter1q_root", "rooter");
    } catch (PDOException $e) {
        echo "Connection failed " . $e->getMessage();
    }*/

try {
    $conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
} catch (PDOException $e) {
    echo "Connection failed " . $e->getMessage();
}
