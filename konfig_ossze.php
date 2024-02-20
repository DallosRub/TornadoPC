<?php
session_start();
require_once "adatbazis.php";
$db = kapcs();
//print_r($_POST);
$sql="SELECT id FROM felhasznalok WHERE nev='{$_SESSION['fnev']}'";
$fhidk=$db->query($sql);    
$fhid=$fhidk->fetchAll(PDO::FETCH_ASSOC);
$sql="SELECT MAX(id) AS max FROM konfig_id";
$kidk=$db->query($sql);
$kid=$kidk->fetchAll(PDO::FETCH_ASSOC);

print_r($fhid[0]['id']);
print_r("Abalencsik");
print_r($_POST);
$valami=$kid[0]['max'];
/*$konfig="
<div class='card'>
<div class='card-body'>
    <h5 class='card-title' style='margin-bottom: 0px;'>Bencs</h5>
        <table style=''>
            <tr>
                <td>Processzor:</td>
                <td>{$_POST['Processzor']}</td>
            </tr>
            <tr>
                <td>Videókártya:</td>
                <td>{$_POST['Videókártya']}</td>
            </tr>
            <tr>
                <td>Alaplap:</td>
                <td>{$_POST['Alaplap']}</td>
            </tr>
            <tr>
                <td>Memória:</t d>
                <td>{$_POST['Memória']}</td>
            </tr>
            <tr>
                <td>Merevlemez:</td>
                <td>{$_POST['Merevlemez']}</td>
            </tr>
            <tr>
                <td>SSD:</td>
                <td>{$_POST['SSD']}</td>
            </tr>
            <tr>
                <td>Tápegység:</td>
                <td>{$_POST['Tápegység']}</td>
            </tr>
            <tr>
                <td>Processzor hűtő:</td>
                <td>{$_POST['Processzor_hűtő']}</td>
            </tr>
            <tr>
                <td>Számítógépház:</td>
                <td>{$_POST['Számítógépház']}</td>
            </tr>
        </table>
    <img src='like.png' alt='' style='display: block; float: inline-start;'>
    <img src='dislike.png' alt='' style='display: block; float: inline-end;'>
</div>
</div>
";        
$sql="INSERT INTO konfig(felh_id, konfig) VALUES ({$fhid[0]}, '$konfig')";
$db->exec($sql);*/


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
        <?php require_once "navbar.php"; ?>

        </div>
    </div>
    <div class="white-bg shadow">
    </div>

        <div class="content w3-main" style="margin-left:20%">
            <h1>Konfiguráció összeállító</h1>
            <form action="" method="post">
                <table>
                            <?php
                                $sql = 'SELECT * FROM termek_kategoriak WHERE kat_id=1' ;

                                $stmtKat = $db->query($sql);
                                $kategoriak = $stmtKat->fetchAll(PDO::FETCH_ASSOC);
                                $kat_db=0;
                                foreach ($kategoriak as $kategoria) {
                                    $kat_db++;
                                }

                                $sql="SELECT t.id, t.kategoria_id, CONCAT(m.megnevezes,' - ', t.megn) AS nev 
                                FROM termekek AS t
                                INNER JOIN markak AS m ON m.id=t.marka_id";
                                $term=$db->query($sql);
                                $termekek=$term->fetchAll(PDO::FETCH_ASSOC);

                                $szam=0;
                                foreach ($kategoriak as $kategoria) {
                                    if ($kategoria['kat_id'] == 1) {
                                        echo "<tr>
                                                <td>
                                                    {$kategoria['megnevezes']} :
                                                </td>
                                                <td>
                                                    <select name='$szam'>
                                                
                                            ";
                                        $szam++;
                                        foreach ($termekek as $termek) {
                                            if($termek['kategoria_id']==$kategoria['id']){
                                                
                                               echo "<option value='{$termek['id']}'>{$termek['nev']}</option>";
                                            }
                                                                                
                                        }
                                    }

                                }
                                echo "</td>";
                                
                                

                                $sql="INSERT INTO konfig_id (felh_id) VALUES({$fhid[0]['id']})";
                                $db->query($sql);
                                for ($i=0; $i < count($_POST); $i++) { 
                                    $sql="INSERT INTO konfig (termek_id, konf_id) VALUES({$_POST[$i]}, {$valami})";
                                    //print_R($sql);
                                    $db->query($sql);
                                }

                            ?>

                            
                </table>
                
            </div>
                <input type="submit" value="Beküldés">
            </form>
            </div>
        </div>

</body>

</html>