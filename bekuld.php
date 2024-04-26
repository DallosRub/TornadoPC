<?php
require_once ("fuggvenyek.php");
$webshop = new Webshop();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["sub"]) || isset($_POST["kosar"])) {
        $felh_id = $_SESSION["fid"];
        $sql = "INSERT INTO konfig_id (felh_id) VALUES('$felh_id')";

        $webshop->sqlQuery($sql);
        $sql = "SELECT LAST_INSERT_ID() AS id ";
        $sv = $webshop->sqlSelect($sql);
        $konfig_id = $sv["id"];

        print_r($_POST);
        for ($i = 0; $i < count($_POST) - 1; $i++) {
            $sql = "INSERT INTO konfig (termek_id, konf_id) VALUES({$_POST[$i]}, $konfig_id)";
            echo "<br>" . $sql;
            $webshop->sqlQuery($sql);
        }
        if (isset($_POST["kosar"])) {
            print_r($_POST);
            for ($i = 0; $i < count($_POST) - 1; $i++) {
                $sql = "INSERT INTO kosar(termek_id, fh_id, mennyiseg, allapot) VALUES ({$_POST[$i]}, $felh_id, 1, 0)";
                echo "<br>" . $sql;
                $webshop->sqlQuery($sql);
            }
            $_SESSION["info"] = "Konfiguráció sikeresen mentve és kosárhoz adva.";
            header("location:konfig_ossze.php");
        } else {
            $_SESSION["info"] = "Konfiguráció sikeresen mentve";
            header("location:konfig_ossze.php");
        }
    }
}