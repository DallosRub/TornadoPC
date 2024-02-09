<?php
    session_start();
    require_once "adatbazis.php";
    $db = kapcs();
    ob_start();
    require_once "fuggvenyek.php";
    $webshop = new Webshop();
?> 
<!DOCTYPE html>
<html lang="hu">
<head>
    <?php $webshop->HeadInsert(' - Kosár'); ?>
</head>

<body>
    <div class="mindenseg">
        <div class="blue-bg">
        <?php $webshop->NavbarInsert(); ?>

        </div>
    </div>
    <div class="white-bg shadow">
    </div>

        <div class="content w3-main" style="margin-left:20%">
            <h1>Kosár tartalma</h1>
            <?php        
            //ell fh_id
                $webshop->DisplayCartInTable();
            ?>
        </div>
</body>

</html>
<?php ob_end_flush(); ?>