<?php
if (!isset($_COOKIE['vartotojas']) || $_COOKIE['role'] != 'Administratorius') {
    header('Location: view.php');
}
require "../controllers/get_all_users.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Panel</title>
</head>

<body style="text-align: center;">
    <div style="text-align: left;">
        <a href="view.php">Get back</a>
    </div>
    <?php
    if (empty($vartotojai)) {
        echo "<p>No users to load</p>";
    } else {
        foreach ($vartotojai as $vartotojas) {
            $vartotojas->printUserInfo();
        }
    }
    ?>
</body>

</html>