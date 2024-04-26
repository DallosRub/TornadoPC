<?php
session_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
$fh = new Felhasznalo();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->head(" - Bejelentkezés"); ?>
</head>

<body>
    <?php
        $fh->bejelentkezesForm();
        $fh->bejelentkezes();
    ?>
</body>
</html>