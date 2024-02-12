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
    
</body>
</html>
<?php ob_end_flush(); ?>