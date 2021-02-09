<?php
require '../models/classes.php';
require "../controllers/db_connection.php";
require '../controllers/control_panel/get_user_articles.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Articles</title>
</head>

<body style="text-align: center;">
    <?php
    if(mysqli_num_rows($records) == 0) {
        header('location: ../views/control_panel.php');
        exit();
    }

    foreach ($articles as $article) {
        $article->printArticle(true, $_GET['id']);
    }
    ?>
</body>

</html>