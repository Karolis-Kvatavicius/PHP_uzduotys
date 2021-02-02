<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_COOKIE['vartotojas'])) {
    ?>
        <a href="../user_login/atsijungti.php">Logout</a><br>
    <?php
    } else {
    ?>
        <a href="../user_login/prisijungimas.php">Login</a><br>
    <?php
    }
    ?>

    <a href="enter_article_view.php">Add new article</a>
    <?php
    require "../controllers/data.php";

    if (isset($errors)) {
        echo $errors;
        exit();
    }
    foreach ($articles as $article) {
        $link = "<a href='images_preview.php?article_id=" . $article->getID() . "'>Preview images</a>";
        $article_content = "<a href='article_view.php?article_id=" . $article->getID() . "'>Article content</a><br>";
        $article->printInfo($link, $article_content, $_COOKIE);
    }
    ?>
</body>

</html>