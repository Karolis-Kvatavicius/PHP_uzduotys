<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>

<body style="text-align: center;">
    <h1>Welcome, <?= $_COOKIE['vardas'] . ' ' . $_COOKIE['pavarde']  ?></h1>
    <form action="../controllers/user_update.php" method="post">
        <label for="vardas">Pakeisti vardą:</label><br>
        <input type="text" name="vardas" id="vardas" value="<?= $_COOKIE['vardas'] ?>"><br>
        <br>
        <label for="pavarde">Pakeisti pavardę:</label><br>
        <input type="text" name="pavarde" id="pavarde" value="<?= $_COOKIE['pavarde'] ?>"><br>
        <br>
        <label for="vartotojas">Pakeisti vartotojo vardą:</label><br>
        <input type="text" name="vartotojas" id="vartotojas" value="<?= $_COOKIE['vartotojas'] ?>"><br>
        <br>
        <label for="slaptazodis">Pakeisti slaptažodį:</label><br>
        <input type="password" name="slaptazodis" id="slaptazodis" value=""><br>
        <br>
        <input type="submit" name="keisti_duomenis" value="Keisti duomenis"><br>
    </form>
</body>

</html>