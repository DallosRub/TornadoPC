<?php
    session_start();
    ob_start();
    require_once "fuggvenyek.php";
    $webshop = new Webshop();
    $cart = new Cart();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->headInsert(' - Kosár'); ?>
</head>

<body>
    <div class="background-image">
        <div class="container-fluid tartalomnak">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content">
                        <a href="index.php">Főoldal</a>
                        <?php
                        $cart->displayCartInTable();
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