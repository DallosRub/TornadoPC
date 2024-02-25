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
    <div class="background-image">
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
                            echo $_GET['id'].", ".$_POST['kategoria_id'];
                            $_SESSION['termekId'] = $_GET['id'];
                            $webshop->productInsert($_GET['id']);
                            
                            echo $_POST['kategoria_id'].", ".$_SESSION['termekId'];
                            print_r($_POST);
                            $cart->addToCart();
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