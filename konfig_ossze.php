<?php
session_start();
require_once "fuggvenyek.php";
require_once "adatbazis.php";
$db_kapcs = new DB();
$db = $db_kapcs;
$webshop = new Webshop();

print_r($_POST);
$sql = "SELECT id FROM felhasznalok WHERE nev='{$_SESSION['fnev']}'";
$fhidk = $webshop->sqlQuery($sql);
$fhid = $fhidk->fetchAll(PDO::FETCH_ASSOC);
$sql = "SELECT MAX(id) AS max FROM konfig_id";
$kidk = $webshop->sqlQuery($sql);
$kid = $kidk->fetchAll(PDO::FETCH_ASSOC);
$valami = $kid[0]['max'];

function hozzadd()
{
    $webshop = new Webshop();

    $sql = "INSERT INTO konfig_id (felh_id) VALUES({$fhid[0]['id']})";
    $webshop->sqlQuery($sql);
    for ($i = 0; $i < count($_POST); $i++) {
        $sql = "INSERT INTO konfig (termek_id, konf_id) VALUES({$_POST[$i]}, {$valami})";
        //print_R($sql);
        $webshop->sqlQuery($sql);
    }
}


/*if (!isset($_POST["ell"])) {
    $sql="INSERT INTO konfig_id (felh_id) VALUES({$fhid[0]['id']})";
    $webshop->sqlQuery($sql);
    for ($i=0; $i < count($_POST); $i++) { 
        $sql="INSERT INTO konfig (termek_id, konf_id) VALUES({$_POST[$i]}, {$valami})";
        //print_R($sql);
        $webshop->sqlQuery($sql);
    
    }
    $_POST["ell"]=0;
}*/




/*print_r($fhid[0]['id']);
print_r("Abalencsik");
print_r($_POST);
print_r($kid);*/




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
    table,
    td,
    th {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>
    <div class="mindenseg">
        <div class="blue-bg">
            <?php $webshop->navbarInsert(); ?>

        </div>
    </div>
    <div class="white-bg shadow">
    </div>

    <div class="content w3-main" style="margin-left:20%">
        <h1>Konfiguráció összeállító</h1>
        <form action="" method="post">
            <table>
                <?php
                $sql = 'SELECT * FROM termek_kategoriak WHERE kat_id=1';

                $stmtKat = $webshop->sqlQuery($sql);
                $kategoriak = $stmtKat->fetchAll(PDO::FETCH_ASSOC);
                $kat_db = 0;
                foreach ($kategoriak as $kategoria) {
                    $kat_db++;
                }

                $sql = "SELECT t.id, t.kategoria_id, CONCAT(m.megnevezes,' - ', t.megn) AS nev 
                                FROM termekek AS t
                                INNER JOIN markak AS m ON m.id=t.marka_id";
                $term = $webshop->sqlQuery($sql);
                $termekek = $term->fetchAll(PDO::FETCH_ASSOC);

                $szam = 0;
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
                            if ($termek['kategoria_id'] == $kategoria['id']) {

                                echo "<option value='{$termek['id']}'>{$termek['nev']}</option>";
                            }

                        }
                    }

                }
                echo "</td>";

                /*if (!isset($_POST["ell"])) {
                    $sql="INSERT INTO konfig_id (felh_id) VALUES({$fhid[0]['id']})";
                    $webshop->sqlQuery($sql);
                    for ($i=0; $i < count($_POST); $i++) { 
                        $sql="INSERT INTO konfig (termek_id, konf_id) VALUES({$_POST[$i]}, {$valami})";
                        //print_R($sql);
                        $webshop->sqlQuery($sql);
                    
                    }
                }*/



                ?>


            </table>

    </div>
    <input type="submit" value="Beküldés" onclick="document.write('<?php hozzadd(); ?>')">
    </form>

    </div>
    </div>

</body>

</html>