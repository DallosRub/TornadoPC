<?php
session_start();
require_once "fuggvenyek.php";
require_once "adatbazis.php";
$db_kapcs = new DB();
$db = $db_kapcs;
$webshop = new Webshop();

//SELECT megnevezes FROM termekek AS t INNER JOIN termek_kategoriak AS k ON t.kategoria_id=k.id WHERE t.megn="Core i7-13700KF"


/*$sql="SELECT felh_id, konf_id, termek_id FROM konfig_id as ki INNER JOIN konfig as k ON k.konf_id = ki.id";
$tomb=$webshop->sqlQuery($sql);    
$vtomb=$tomb->fetchAll(PDO::FETCH_ASSOC);*/

//print_r($vtomb);


$sql="SELECT * FROM konfig_id";
$tomb=$webshop->sqlQuery($sql);    
$szam_Tomb=$tomb->fetchAll(PDO::FETCH_ASSOC);
//SELECT felh_id, konf_id, termek_id FROM konfig_id as ki INNER JOIN konfig as k ON k.konf_id = ki.id

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfigurációk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>
<style>
    table, td, th{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<body>
    <div class="mindenseg">
        <div class="blue-bg">
        <?php $webshop->navbarInsert();?>

        </div>
    </div>
    <div class="white-bg shadow">
    </div>

        <div class="content w3-main" style="margin-left:20%">
            <h1>Konfigurációk</h1>
            <?php
                for ($i=0; $i < count($szam_Tomb); $i++) {
                    //<div class='card' style='width: 30rem;'>
                    echo"
                    
                    <div class='card' style='width: 30rem;'>
                    
                    <div class='card-body'>";
                    $sql="SELECT nev FROM felhasznalok WHERE id={$szam_Tomb[$i]['felh_id']}";
                    $nevek=$webshop->sqlQuery($sql);
                    $nev=$nevek->fetchAll(PDO::FETCH_ASSOC);

                    $sql="SELECT felh_id, konf_id, termek_id FROM konfig_id as ki INNER JOIN konfig as k ON k.konf_id = ki.id WHERE ki.id={$szam_Tomb[$i]['id']}";
                    $tomb=$webshop->sqlQuery($sql);    
                    $vtomb=$tomb->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($szam_Tomb[$i]['felh_id']);
                    //print_r($nev[0]['nev']);
                    echo"<h1>";print_R($nev[0]['nev']);echo"</h1><br>";
                    echo"<table>";
                    for ($j=0; $j < count($vtomb); $j++) {
                        echo"<tr><td>";
                        $sql="SELECT megnevezes FROM termekek AS t INNER JOIN termek_kategoriak AS k ON t.kategoria_id=k.id WHERE t.id={$vtomb[$j]['termek_id']}";
                        $cucc=$webshop->sqlQuery($sql);
                        $kat=$cucc->fetchAll(PDO::FETCH_ASSOC);
                        echo $kat[0]['megnevezes']."</td><td>";
                        $sql="SELECT CONCAT(m.megnevezes,' - ', t.megn) AS nev FROM termekek AS t INNER JOIN markak AS m ON m.id=t.marka_id WHERE t.id={$vtomb[$j]['termek_id']}"; 
                        $cucc=$webshop->sqlQuery($sql);
                        $cuccli=$cucc->fetchAll(PDO::FETCH_ASSOC);
                        echo $cuccli[0]['nev']."</td></tr>";
                        
                    }
                    echo" 
                    <table>  
                    </div>
                    </div><br>";//</div>
                }
            ?>
        </div>

</body>

</html>