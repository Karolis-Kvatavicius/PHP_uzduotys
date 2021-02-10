<!DOCTYPE html>
<html lang="en">
<?php

if(!isset($_COOKIE['vartotojas']) || $_COOKIE['role'] != 'Autorius') {
    header('location: view.php');
    exit();
}

require '../controllers/insert_article.php';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter new article</title>
</head>

<body>
    <a style="display: block; margin-bottom: 20px;" href="view.php">Back To Articles List</a>
    <form style="text-align: center;" action="" method="post">
        <input name="title" type="text" placeholder="Article title"><br><br>
        <input name="author" type="hidden" value="<?= $_COOKIE['vartotojas'] ?>"><br><br>
        <textarea name="short_content" id="" cols="30" rows="10" placeholder="Short content"></textarea><br><br>
        <textarea name="content" id="" cols="30" rows="10" placeholder="Full content"></textarea><br><br>
        <input name="preview" type="text" placeholder="Preview image link"><br><br>
        <!-- additional images -->
        <input name="additional_image_1" type="text" placeholder="Additional image 1"><br>
        <input name="additional_image_2" type="text" placeholder="Additional image 2"><br>
        <input name="additional_image_3" type="text" placeholder="Additional image 3"><br><br>
        <label for="type">Choose Article Type:</label><br>
        <select name="type" id="type">
        <?php
        //  Print article types
        foreach ($matches[1] as $match) {
        ?>
            <option value="<?= $match ?>"><?= $match ?></option>
        <?php
        }
        ?>
        </select><br><br>
        <h3>Article topics:</h3>
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