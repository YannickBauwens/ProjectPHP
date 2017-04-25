<?php
include_once('includes/no-session.inc.php');
include_once('includes/db.inc.php');

    if (isset($_GET['txtSearch'])) {
        $searchKeyword = $_GET['txtSearch'];
        $results = array();
        $statement = $conn->prepare("SELECT *
                          FROM posts
                          WHERE description
                          LIKE :keywords");
        $statement->bindValue(':keywords', '%' . $searchKeyword . '%');
        $statement->execute();

        if ($statement->rowCount() >= 1) {
            $results = $statement->fetchAll();
            $countPosts = $statement->rowCount();
        } else {
            $errorMessage = "No matching results with: ".$_GET['txtSearch'];
        }
    }

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include_once("includes/nav.inc.php"); ?>

<div>
    <div>
        <?php foreach ($results as $result): ?>
            <p><?php echo $result['image']; ?></p>
        <?php endforeach;?>
    </div>
</div>

</body>
</html>










