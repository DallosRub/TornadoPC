<?php

require_once "adatbazis.php";
$sql = 'SELECT megn FROM termekek';

$db = kapcs();
$stm = $db->prepare($sql);
$stm->execute();

foreach ($stm as $sor) {
    echo "
        <div>
            <span>{$sor['megn']}</span>
        </div>
    ";
}
?>
