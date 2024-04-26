<?php
session_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
$rendeles = new Rendeles();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->head(" - Rendelési előzmények"); ?>
</head>

<body>
    <?php $webshop->navbar(1); ?>

    <div class="container-fluid tartalomnak">
        <div class="w-75 mx-auto">
            <?php $rendeles->rendelesElozmenyekTablazatban(); ?>
        </div>
    </div>

</body>
</html>