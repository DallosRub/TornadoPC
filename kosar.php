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
    <nav class='navbar navbar-expand-sm bg-body fixed'>
        <div class='container'>
            <a class='navbar-brand' href='index.php'>TornadoPC</a>
        </div>
    </nav>
    <div class="background-image">
        <div class="container-fluid kosarnak">
            <div class="row">
                <div class="col-md-8">
                    <h1>Kosár tartalma</h1>
                    <?php
                        $cart->displayCartInTable();
                    ?>
                </div>
                <div class="col-md-3">
                    <p>Rendelés...</p>
                </div>
            </div>
        </div>
    </div>



    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='menny_nov.js'></script>
    <script src='menny_csokk.js'></script>
    <script src='torol.js'></script>
    <?php
    /*    <footer class="footer">
        <?php $webshop->footerInsert(); ?>
    </footer>*/

    $db = new DB();
    if (isset($_POST['kosar_id'])) {
        $kosar_id = $_POST['kosar_id'];
    }

    if (isset($_POST['kosar_id']) && $_POST['funkcio'] == 'n') {
        $sql = "UPDATE kosar SET mennyiseg = mennyiseg + 1 WHERE id = $kosar_id";    
        $webshop->sqlQuery($sql);
    }
    elseif (isset($_POST['kosar_id']) && $_POST['funkcio'] == 'cs') {
        $sql = "SELECT mennyiseg FROM kosar WHERE id = $kosar_id";
        $sv = $db->sqlSelect($sql);
        $menny = $sv['mennyiseg'] - 1;

        if ($menny < 1) {
            echo "Törlés?";
        }
        else {
            $sql = "UPDATE kosar SET mennyiseg = mennyiseg - 1 WHERE id = $kosar_id";
            $webshop->sqlQuery($sql);
        }
    }
    elseif (isset($_POST['kosar_id']) && $_POST['funkcio'] == 't') {
        $sql = "DELETE FROM kosar WHERE id = $kosar_id";
        $webshop->sqlQuery($sql);
    }
    ?>
</body>

</html>
<?php ob_end_flush(); ?>