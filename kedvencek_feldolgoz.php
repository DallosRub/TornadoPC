<?php
session_start();
require_once "fuggvenyek.php";
$db = new DB();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['termek_id'])) {
  if (isset($_SESSION['fid'])) {

    $termek_id = $_POST['termek_id'];
    $fh_id = $_SESSION['fid'];

    $sql = "SELECT id FROM kedvencek WHERE termek_id = $termek_id AND fh_id = $fh_id";
    $vanE  = $db->sqlSelect2($sql);
    if (empty($vanE)) {
      $sql = "INSERT INTO kedvencek(termek_id, fh_id) VALUES ($termek_id, $fh_id)";
      $db->sqlQuery($sql);
    }
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false, 'message' => 'Jelentkezzen be a kedvencek használatához!']);
  }
}