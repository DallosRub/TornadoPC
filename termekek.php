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
    <?php $webshop->headInsert(); ?>
</head>

<body>
        <?php
        $webshop->navbarInsert();
        ?>

        <div class="container-fluid tartalomnak">
            <div class="row">
                <div class="col-lg-2">
                    <div class="sidebar">
                        <h2>Sidebar</h2>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="content">
                        <h1>Tornado PC</h1>
                        <?php

                        $p = isset($_GET['p']) ? (int) $_GET['p'] : 1;
                        
                        //$_POST['kategoria_id'];
                        
                        if (isset($_POST['kategoria_id'])) {
                            $webshop->productsInsert($p, $_POST['kategoria_id']);

                        } else {
                            $p = isset($_GET['p']) ? (int) $_GET['p'] : 1;
                            if (isset($_POST['a']) && $_POST['a'] == 'osszes_termek') {
                                $_POST['kategoria_id']=0;
                                $webshop->productsInsert($p, $_POST['kategoria_id']);
                            }
                        }
                        echo"Post: ";print_r($_POST);
                        $cart->addToCart();
                        ?>
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