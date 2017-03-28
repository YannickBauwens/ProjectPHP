<?php

    include_once ("includes/db.inc.php");

    class Topic{

        public function getFeed(){
            global $conn;

            $statement = $conn->prepare("SELECT * FROM topics");
            $statement->execute();

            $statement->fetchAll();
        }

    }


