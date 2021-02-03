<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form style="text-align: center;" action="../controllers/comment_controller.php" method="post">
<textarea name="comment" id="" cols="30" rows="10" placeholder="Enter your comment"></textarea><br><br>
<input type="submit" name="submit" value="Komentuoti">
<input type="hidden" name="straipsnio_id" value="<?= $_GET['id'] ?>">
</form>
</body>

</html>