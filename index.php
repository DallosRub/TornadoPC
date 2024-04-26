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
    <?php $webshop->navbar(1); ?>

    <div class="container-fluid tartalomnak">
        <div class="content">
            <?php
            $webshop->kategoriakMegjelenit();

            if (isset($_POST['kategoria_id'])) {
                header('Location: termekek.php');
            }
            ?>
        </div>
    </div>

    <footer>
        <?php $webshop->footer(); ?>
    </footer>
</body>
</html>
<?php ob_end_flush(); ?>