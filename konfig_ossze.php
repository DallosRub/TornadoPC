<?php
session_start();
require_once "adatbazis.php";
$db = kapcs();
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

                                $sql="SELECT * FROM termekek WHERE kategoria_id <= $kat_db";
                                $term=$db->query($sql);
                                $termekek=$term->fetchAll(PDO::FETCH_ASSOC);


                                foreach ($kategoriak as $kategoria) {
                                    if ($kategoria['kat_id'] == 1) {
                                        echo "<tr>
                                                <td>
                                                    {$kategoria['megnevezes']} :
                                                </td>
                                                <td>
                                                    <select name='{$kategoria['megnevezes']}'>
                                            ";
                                        foreach ($termekek as $termek) {
                                            if($termek['kategoria_id']==$kategoria['id']){
                                                
                                                $sql="SELECT megnevezes FROM markak WHERE id={$termek['marka_id']}";
                                                $geci=$db->query($sql);
                                                $fasz=$geci->fetchAll(PDO::FETCH_ASSOC);
                                                var_dump($fasz);
                                                echo"<option value='{$termek['megn']}'>{$fasz['megnevezes']} {$termek['megn']}</option>";
                                            }
                                                                                    
                                        }
                                      }
                                }
                            ?>
                </table>
            </form>
            </div>
        </div>

</body>

</html>