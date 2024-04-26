<?php
session_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->head(); ?>
</head>

<body>
    <?php $webshop->navbar(2); ?>
    
    <div class="container-fluid kosar_kedvencek">
        <?php
            $webshop->kosarTablazatban();
        ?>
    </div>

    <script src='js/menny_nov.js'></script>
    <script src='js/menny_csokk.js'></script>
    <script src='js/torol.js'></script>
    <script src='js/teljes_kosar_torol.js'></script>
    <script src='js/kosar_db_megad.js'></script>

    <?php
    $db = new DB();
    if (isset ($_POST['kosar_id'])) {
        $kosar_id = $_POST['kosar_id'];
    }

    //kosár termék mennyiség növelése
    if (isset ($_POST['kosar_id']) && $_POST['funkcio'] == 'n') {
        $sql = "SELECT mennyiseg FROM kosar WHERE id = $kosar_id AND allapot = 0";
        $sv = $db->sqlSelect($sql);
        $menny = $sv['mennyiseg'] + 1;

        if ($menny > 99) {
            echo "Törlés?";
        } else {
            $sql = "UPDATE kosar SET mennyiseg = mennyiseg + 1 WHERE id = $kosar_id AND allapot = 0";
            $webshop->sqlQuery($sql);
        }
    }
    //kosár termék mennyiség csökkentése
    elseif (isset ($_POST['kosar_id']) && $_POST['funkcio'] == 'cs') {
        $sql = "SELECT mennyiseg FROM kosar WHERE id = $kosar_id";
        $sv = $db->sqlSelect($sql);
        $menny = $sv['mennyiseg'] - 1;

        if ($menny < 1) {
            echo "Törlés?";
        } else {
            $sql = "UPDATE kosar SET mennyiseg = mennyiseg - 1 WHERE id = $kosar_id AND allapot = 0";
            $webshop->sqlQuery($sql);
        }
    }
    //egy termék törlése
    elseif (isset ($_POST['kosar_id']) && $_POST['funkcio'] == 't') {
        $sql = "DELETE FROM kosar WHERE id = $kosar_id";
        $webshop->sqlQuery($sql);
    }
    //teljes kosár törlése
    elseif (isset($_POST['funkcio']) && $_POST['funkcio'] == 'teljes_kosar_torol') {
        $sql="SELECT id AS kosar_id, fh_id
              FROM kosar
              WHERE fh_id = {$_SESSION['fid']} AND allapot = 0";

        $kosar = $webshop->sqlAssoc($sql);
        foreach ($kosar as $k) {
            $sql = "DELETE FROM kosar WHERE id = {$k['kosar_id']}";
            $webshop->sqlQuery($sql);
        }
    }
    ?>
</body>
</html>