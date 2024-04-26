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
            $webshop->kedvencekTablazatban();
        ?>
    </div>

    <script src='js/torol.js'></script>
    <script src='js/kosarhozAd.js'></script>
    <script src='js/kosar_db_megad.js'></script>

<?php
    if (isset($_POST['kosar_id']) && $_POST['funkcio'] == 't') {
        $kosar_id = $_POST['kosar_id'];
        $sql = "DELETE FROM kedvencek WHERE id = $kosar_id";
        $webshop->sqlQuery($sql);
    }
    ?>
</body>
</html>