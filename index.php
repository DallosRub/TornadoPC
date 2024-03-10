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
                        echo "Session: ";
                        print_r($_SESSION);
                        echo "Post: ";
                        print_r($_POST);
                        $webshop->categoriesInsert();

                        if (isset($_POST['kategoria_id'])) {
                            header('Location: termekek.php');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
    <!--<footer class="footer">
        <?php
        $webshop->footerInsert(); ?>
    </footer>-->
</body>

</html>
<?php ob_end_flush(); ?>