<?php
session_start();
ob_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
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
                        /*if (isset($_POST['a'])) {
                            $p = isset($_GET['p']) ? (int) $_GET['p'] : 1;
                            if ($_POST['a'] === 'osszes_termek') {
                                $webshop->productsInsert($p);
                            }
                        }
                        else{*/
                            $p = isset($_GET['p']) ? (int) $_GET['p'] : 1;
                            $webshop->productsInsert($p, $_POST['kategoria_id']);
                            //if (isset($_SESSION['kat_id'])) {
                                //$webshop->productsInsert($p, $_SESSION['kat_id']);
                                //$_SESSION['kat_id'] = $_POST['kategoria_id'];
                                //echo $_SESSION['kat_id'];
                                echo" ";
                                echo $_POST['kategoria_id'];
                                //$_SESSION['kat_id']=null;
                            //}
                        //}
                        $webshop->addToCart();
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