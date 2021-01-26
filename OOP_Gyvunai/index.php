<?php
require "../autoloader.php";

$mysqli = new mysqli("localhost", "root", "student", "regionai");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
} else {
    $result = $mysqli->query("SELECT pavadinimas FROM regionai;");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">

        <!-- tipas -->
        <input type="radio" id="zole" name="tipas" value="zole">
        <label for="zole">Žolė</label><br>
        <input type="radio" id="vandens_gyvis" name="tipas" value="vandens_gyvis">
        <label for="vandens_gyvis">Vandens gyvis</label><br>
        <input type="radio" id="zemes_gyvis" name="tipas" value="zemes_gyvis">
        <label for="zemes_gyvis">Žemės gyvis</label><br><br>

        <!-- zoledis, mesedis -->
        <div style="display: none;" id="mesedis_zoledis">
            <input type="radio" id="zoledis" name="mesedis_zoledis" value="zoledis">
            <label for="zoledis">Žolėdis</label><br>
            <input type="radio" id="mesedis" name="mesedis_zoledis" value="mesedis">
            <label for="mesedis">Mesėdis</label><br><br>
        </div>

        <!-- Laukai savybiu ivedimui -->
        <div style="display: none;" id="savybes">
            <input required type="text" id="svoris" name="svoris" placeholder="Svoris">
            <br>
            <input required style="display: none;" type="number" min="1" max="10" id="dantu_astrumas" name="dantu_astrumas" placeholder="Dantų aštrumas">

            <select name="regionas" id="regionas">

                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row["pavadinimas"]?>"><?php echo $row["pavadinimas"]?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <!-- Pateikti -->
            <input type="submit" name="pateikti" value="Pateikti">
        </div>

    </form><br>
    <?php
    if (isset($_POST['pateikti'])) {

        function makeAnimal()
        {
            if ($_POST['tipas'] == "zemes_gyvis" && $_POST['mesedis_zoledis'] == "zoledis") {
                return new Kiskis($_POST['svoris'], $_POST['regionas']);
            } else if ($_POST['tipas'] == "vandens_gyvis" && $_POST['mesedis_zoledis'] == "zoledis") {
                return new Tunas($_POST['svoris'], $_POST['regionas']);
            } else if ($_POST['tipas'] == "vandens_gyvis" && $_POST['mesedis_zoledis'] == "mesedis") {
                return new Ryklys($_POST['svoris'], $_POST['regionas'], $_POST['dantu_astrumas']);
            } else if ($_POST['tipas'] == "zemes_gyvis" && $_POST['mesedis_zoledis'] == "mesedis") {
                return new Liutas($_POST['svoris'], $_POST['regionas'], $_POST['dantu_astrumas']);
            } else {
                return  new Zole($_POST['svoris'], $_POST['regionas']);
            }
        }
        echo "<pre>";
        print_r(makeAnimal());
        echo "</pre>";
    }
    ?>
    <script src="js/main.js"></script>
</body>

</html>