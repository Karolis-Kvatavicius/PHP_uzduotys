<?php
if (isset($_COOKIE['vartotojas'])) {
    header('Location: ../views/view.php');
    exit();
}

if (isset($_POST['prisijungimas'])) {
    require "../controllers/db_connection.php";
    $query = "SELECT * FROM vartotojai WHERE username='" . $_POST['vartotojas'] . "';";
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_assoc($result);

    if(is_array($row)) {
        if ($row['slaptazodis'] == $_POST['slaptazodis']) {
            if($row['statusas'] == 'Uzblokuotas') {
                $result = "Jūsų vartotojas laikinai nepasiekiamas. Susisiekite su administracija";
                header('Location: ./prisijungimas.php?error=' . $result);
                exit();
            }
            setcookie('vartotojas', $row["username"], time() + (3600 * 4), '/');
            setcookie('vardas', $row["vardas"], time() + (3600 * 4), '/');
            setcookie('pavarde', $row["pavarde"], time() + (3600 * 4), '/');
            setcookie('role', $row["role"], time() + (3600 * 4), '/');
            header('Location: ../views/view.php');
            exit();
        } else {
            $result = "Prisijungimas nepavyko";
            header('Location: ./prisijungimas.php?error=' . $result);
            exit();
        }
    } else {
        $result = "Prisijungimas nepavyko";
        header('Location: ./prisijungimas.php?error=' . $result);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div style="text-align: center;" class="row mt-5">
        <h1 class="col">Prisijunkite prie savo paskyros</h1>

        <form class="col" action="" method="post">
            <h5><?= (isset($_GET['error'])) ? $_GET['error'] : ''; ?></h5>
            <input class="form-control" required name="vartotojas" type="text" placeholder="Jūsų vartotojo vardas"><br><br>
            <input class="form-control my-3" required name="slaptazodis" type="password" placeholder="Slaptažodis"><br><br>
            <input class="btn btn-primary" type="submit" name="prisijungimas" value="Prisijungti">
        </form>
    </div>
</body>

</html>