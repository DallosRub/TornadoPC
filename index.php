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
                        <?php
                        if (isset($_POST['a'])) {
                            $p = isset($_GET['p']) ? (int) $_GET['p'] : 1;
                            if ($_POST['a'] === 'osszes_termek') {
                                $webshop->ProductsInsert($p);
                            }
                        } else {
                            $katId = $webshop->categoriesInsert();
                            $_SESSION['katId'] = $katId;
                            if (isset($_SESSION['katId'])) {
                                header('Location: termekek.php');
                            }
                        }
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
    <script> 
       /* $(document).ready(function () { 
            $('#navbarNavDropdown').hover(function () { 
                $(this).addClass('show'); 
                $(this).find('.nav-menu').addClass('show'); 
            }, function () { 
                $(this).removeClass('show'); 
                $(this).find('.nav-menu').removeClass('show'); 
            }); 
        }); */
    </script> 
</body>

</html>
<?php ob_end_flush(); ?>