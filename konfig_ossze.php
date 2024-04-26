<?php
session_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();

$sql = "SELECT id
        FROM felhasznalok
        WHERE nev='{$_SESSION['fnev']}'";
$fhid = $webshop->sqlAssoc($sql);

$sql = "SELECT MAX(id) AS max FROM konfig_id";
$kid = $webshop->sqlAssoc($sql);
$valami = $kid[0]['max'];
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->head(); ?>
</head>

<body>
    <?php $webshop->navbar(1); ?>

    <div class="container-fluid tartalomnak">
        <div class="content">
            <h1>Konfiguráció összeállító</h1>
            <?php
            if (isset($_SESSION["info"])) {
                echo $_SESSION["info"];
                unset($_SESSION["info"]);
            }
            ?>

            <form action="bekuld.php" method="post">
                <table class='konfig mx-auto border border-primary'>
                    <?php
                    $sql = 'SELECT * FROM termek_kategoriak WHERE kat_id=1';
                    $kategoriak = $webshop->sqlAssoc($sql);
                    $kat_db = 0;
                    foreach ($kategoriak as $kategoria) {
                        $kat_db++;
                    }

                    $sql = "SELECT t.id, t.kategoria_id, CONCAT(m.megnevezes,' - ', t.megn) AS nev 
                            FROM termekek AS t
                            INNER JOIN markak AS m ON m.id=t.marka_id";
                    $termekek = $webshop->sqlAssoc($sql);
                    
                    $szam = 0;
                    foreach ($kategoriak as $kategoria) {
                        if ($kategoria['kat_id'] == 1) {
                            echo "<tr class='border border-2'>
                                    <td class='border'>
                                        {$kategoria['megnevezes']} :
                                    </td>
                                    <td class='border'>
                                        <select name='$szam' id='{$kategoria['megnevezes']}'>
                                ";
                            $szam++;
                            foreach ($termekek as $termek) {
                                if ($termek['kategoria_id'] == $kategoria['id']) {
                                    echo "<option value='{$termek['id']}'>{$termek['nev']}</option>";
                                }
                            }
                        }
                    }
                    echo "</td>";
                    ?>
                </table>
                <input type="submit" value="Beküldés" name="sub" class="btn btn-info">
                <input type="submit" value="Beküldés és kosár" name="kosar" class="btn btn-info">
            </form>
        </div>
    </div>

    <footer>
        <?php $webshop->footer(); ?>
    </footer>
    <script src='js/kosar_db_megad.js'></script>

</body>
</html>