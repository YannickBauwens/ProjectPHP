<?php
session_start();
$conn = new PDO('mysql:host=localhost; dbname=IMDterest', 'root', '');
$statement = $conn->prepare("select * from posts limit 5");
$statement->execute();

$result = serialize($statement->fetch());

echo $result;

