<?php
session_start();
ob_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
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
            <?php
            if (empty($_GET)) {
                echo "<h1>Kategória nem található</h1>";
            } else {
                $p = isset($_GET['p']) ? (int) $_GET['p'] : 1;
                if (isset($_GET['kategoria_id'])) {
                    $webshop->termekekMegjelenit($p, $_GET['kategoria_id']);
                } elseif (isset($_GET['osszes_termek'])) {
                    $_GET['kategoria_id'] = 0;
                    $webshop->termekekMegjelenit($p, $_GET['kategoria_id']);
                }
            }
            //Keresés
            if (isset($_GET['keres'])) {
                $keres = $_GET['keres'];
                $termek = explode(" ", $keres);
                foreach ($termek as $elem) {
                    $webshop->termekekMegjelenit($p, '', $elem);
                }
            }
            ?>
            <script>
                function rendezeshez() {
                    document.getElementById('rendezForm').submit();
                }
            </script>
        </div>
    </div>

    <footer>
        <?php $webshop->footer(); ?>
    </footer>

    <script src='js/kosarhozAd.js'></script>
    <script src='js/kedvencekhezAd.js'></script>
    <script src='js/kosar_db_megad.js'></script>

</body>
</html>
<?php ob_end_flush(); ?>