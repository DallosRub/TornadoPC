<?php
session_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
$rendeles = new Rendeles();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
  <?php $webshop->head(); ?>
</head>

<body>
  <?php $webshop->navbar(3); ?>

  <div class="container-fluid tartalomnak">
    <div class="content">
      <?php $rendeles->rendelesFeldolgoz(); ?>
    </div>
  </div>
  
</body>
</html>