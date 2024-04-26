<?php
session_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
$rendeles = new Rendeles();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->head(" - Rendelés"); ?>
</head>

<body>
    <?php $webshop->navbar(2); ?>

    <div class="container-fluid tartalomnak">
        <div class="content">
            <?php $rendeles->rendelesAdatokBeker(); ?>
        </div>
    </div>
    
</body>
</html>