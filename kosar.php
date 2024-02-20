<?php
session_start();
require_once "adatbazis.php";
$db = kapcs();
ob_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->headInsert(' - Kosár'); ?>
</head>

<body>
    <div class="background-image">
        <?php
        $webshop->navbarInsert();
        ?>

        <div class="container-fluid tartalomnak">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content">
                        <?php //ell fh_id
                        $webshop->displayCartInTable();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <?php $webshop->footerInsert(); ?>
    </footer>

</body>

</html>
<?php ob_end_flush(); ?>