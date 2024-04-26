<?php
session_start();
require_once ("fuggvenyek.php");
$webshop = new Webshop();
$cucc = 4 * $_SESSION['o'];
$sql = "SELECT id FROM konfig_id";
$szam_Tomb = $webshop->sqlAssoc($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["k"])) {
        if (count($szam_Tomb) > 4 * ($_SESSION['o'] + 1)) {
            $_SESSION['o']++;
            header("location:konfig.php");
            $_SESSION['ize'] = count($szam_Tomb);
        } else {
            header("location:konfig.php");
            $_SESSION['ize'] = count($szam_Tomb);
        }
    }
    if (isset($_POST["e"])) {
        if ($_SESSION['o'] > 0) {
            $_SESSION['o']--;
            header("location:konfig.php");
        } else {
            header("location:konfig.php");
        }
    }
}