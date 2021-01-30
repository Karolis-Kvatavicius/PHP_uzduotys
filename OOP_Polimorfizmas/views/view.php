<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    require "../controllers/data.php";

    if(isset($errors)) {
        echo $errors;
        exit();
    }
    foreach ($articles as $article) {
        $link = "<a href='views/images_preview.php?article_id=".$article->getID()."'>Preview images</a>";
        $article_content = "<a href='views/article_view.php?article_id=".$article->getID()."'>Article content</a>";
        $article->printInfo($link, $article_content);
    }
    ?>
</body>
</html>