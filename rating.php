<?php
session_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();

$felh_id = $_POST['felh_id'];
$konf_id = $_POST['konf_id'];
$ert = $_POST['ert'];

$sql = "SELECT COUNT(id) AS ratings
        FROM ertekeles
        WHERE konfig_id=$konf_id AND felh_id=$felh_id";
$r = $webshop->sqlAssoc($sql);

$sql = "SELECT ertekeles AS ert
        FROM ertekeles
        WHERE konfig_id=$konf_id AND felh_id=$felh_id";
$adott = $webshop->sqlAssoc($sql);

if ($r[0]['ratings'] < 1) {
    $sql = "INSERT INTO ertekeles(konfig_id, felh_id, ertekeles) VALUES('$konf_id','$felh_id','$ert')";
    $webshop->sqlQuery($sql);
}

if ($r[0]['ratings'] > 0) {
    if ($adott[0]['ert'] != $ert) {
        $sql = "UPDATE ertekeles SET ertekeles=$ert WHERE konfig_id=$konf_id AND felh_id=$felh_id";
        $webshop->sqlQuery($sql);
    } else {
        $sql = "DELETE FROM ertekeles WHERE konfig_id=$konf_id AND felh_id=$felh_id";
        $webshop->sqlQuery($sql);
    }
}