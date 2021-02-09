<?php
require "../controllers/db_connection.php";
require '../controllers/control_panel/get_user_comments.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="text-align: center;">
    <?php
    if (mysqli_num_rows($records) == 0) {
        header('location: ../views/control_panel.php');
        exit();
    }
    ?>
    <div style="text-align: left;">
        <a href="control_panel.php">Get back</a>
    </div>
    <?php
    while ($record = $records->fetch_array(MYSQLI_ASSOC)) {
        echo "<p><b>Komentaro id:</b> " . $record['id'] . "</p>";
        echo "<p>Turinys: " . $record['turinys'] . "</p>";
        echo "<p>Vartotojas: " . $record['vartotojo_vardas'] . "</p>";
        echo "<p><a href='../controllers/control_panel/delete_user_comments.php?id=" . $record['id'] . "'>Ištrinti komentarą</a></p><br>";
    }
    ?>
</body>

</html>