<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require "data.php";

    if(isset($errors)) {
        echo $errors;
        exit();
    }
    foreach ($articles as $article) {
        $article->printInfo();
    }
    ?>
</body>
</html>