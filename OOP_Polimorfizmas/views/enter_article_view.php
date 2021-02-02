<!DOCTYPE html>
<html lang="en">
<?php

require '../controllers/insert_article.php';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter new article</title>
</head>

<body>
    <a style="display: block; margin-bottom: 20px;" href="view.php">Back To Articles List</a>
    <form action="" method="post">
        <input name="title" type="text" placeholder="Article title"><br>
        <input name="author" type="text" placeholder="Author"><br>
        <textarea name="short_content" id="" cols="30" rows="10" placeholder="Short content"></textarea><br>
        <textarea name="content" id="" cols="30" rows="10" placeholder="Full content"></textarea><br>
        <input name="preview" type="text" placeholder="Preview image link"><br>
        <label for="publish_date">Publish date</label><br>
        <input name="publish_date" id="publish_date" type="date"><br>
        <input name="type" type="text" placeholder="Article type"><br>
        <h3>Straipsnio temos:</h3>
        <?php
        foreach ($straipsnio_temos as $tema) {
        ?>
            <input type="checkbox" id="<?= $tema['pavadinimas'] ?>" name="<?= $tema['pavadinimas'] ?>" value="<?= $tema['id'] ?>">
            <label for="<?= $tema['pavadinimas'] ?>"><?= $tema['pavadinimas'] ?></label><br>
        <?php
        }
        ?>
       <br><input name="submit" type="submit" value="Add article">
    </form>
</body>

</html>