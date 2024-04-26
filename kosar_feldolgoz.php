<?php
session_start();
require_once "fuggvenyek.php";
$db = new DB();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['termek_id']) && isset($_POST['termek_menny'])) {
    if (isset($_SESSION['fid'])) {
        $termek_id = $_POST['termek_id'];
        $menny = $_POST['termek_menny'];
        $fh_id = $_SESSION['fid'];

        $sql = "SELECT id FROM kosar WHERE termek_id = $termek_id AND fh_id = $fh_id AND allapot = 0";
        $vanE  = $db->sqlSelect2($sql);
        if (empty($vanE)) {
            $sql = "INSERT INTO kosar(termek_id, fh_id, mennyiseg, allapot) VALUES ($termek_id, $fh_id, $menny, 0)";
            $db->sqlQuery($sql);
        } else {
            if ($menny >= 1) {
                $sql = "UPDATE kosar SET mennyiseg = $menny WHERE id = $vanE AND allapot = 0";
            } else {
                $sql = "UPDATE kosar SET mennyiseg = mennyiseg + 1 WHERE id = $vanE AND allapot = 0";
            }
            $db->sqlQuery($sql);
        }
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Jelentkezzen be a kosár használatához!']);
    }
}
