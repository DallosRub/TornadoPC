<?php
session_start();
ob_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->head(); ?>
</head>

<body>
    <?php
    $webshop->navbar(1);
    ?>

    <div class="container-fluid tartalomnak">
        <div class="content">
        <?php    
            echo $_SESSION['fid'];
            $sql = "SELECT * 
                    FROM felhasznalok
                    WHERE id = {$_SESSION['fid']}";
            //form kitöltve adatokkal, submit, sql UPDATE a form tartalma
        ?>
        </div>
    </div>

    <footer class="footer">
        <?php $webshop->footer(); ?>
    </footer>
</body>

</html>
<?php ob_end_flush(); ?>