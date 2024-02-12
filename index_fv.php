<?php
session_start();
ob_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->HeadInsert(); ?>
</head>

<body>

    <div class="mindenseg">
        <div class="w3-sidebar w3-bar-block  w3-card bg-info" style="width:15%;" id="mySidebar">
            <input placeholder="Keresés..." type="search" class="input">
            <br>
            <div class="border">

            </div>
        </div>
        <div class="blue-bg">
            <?php
            $webshop->NavbarInsert();
            ?>
            <div class='text-center my-4'>

            </div>
        </div>
        <div class="white-bg shadow d-flex" id="white-bg">


        </div>
        <div class="content w3-main" style="margin-left:20%">
            <h1>Tornado PC</h1>
            <?php
            /*bootstrap accordion*/
            if (isset($_POST['a'])) {
                $p = isset($_GET['p']) ? (int) $_GET['p'] : 1;
                if ($_POST['a'] === 'osszes_termek') {
                    $webshop->ProductsInsert($p);
                }
            } else {
                $p = isset($_GET['p']) ? (int) $_GET['p'] : 1;
                $katId = $webshop->CategoriesInsert($p);
                if (isset($_POST['kategoria_id'])) {
                    $webshop->ProductsInsert($p, $katId);
                }
            }
            $webshop->AddToCart();
            ?>
        </div>

        <div class="footernek text-center">
            
            <?php $webshop->FooterInsert(); ?>
        </div>
        <!-- <script>
            window.addEventListener('DOMContentLoaded', function () {
                    var whiteBg = document.getElementById('white-bg');
                    var contentHeight = whiteBg.clientHeight; // Az elem magassága

                    whiteBg.style.minHeight = contentHeight + 'px';
                console.log(contentHeight);});
                
        </script>  -->
</body>

</html>
<?php ob_end_flush(); ?>