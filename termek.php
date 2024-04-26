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
    <?php
    $webshop->navbar(1);
    ?>

    <div class="container-fluid tartalomnak">
            <div class="content">
                <?php
                $_SESSION['termekId'] = $_GET['id'];
                $webshop->egyTermekMegjelenit($_GET['id']);
                ?>
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