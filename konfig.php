<?php
session_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
$oldal = $_SESSION['o'];

$cucc = 4 * $oldal;

$sql = "SELECT * FROM konfig_id LIMIT 4 OFFSET $cucc";
$szam_Tomb = $webshop->sqlAssoc($sql);
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->head(); ?>
</head>
<body>

    <div class="blue-bg">
        <?php $webshop->navbar(1); ?>
    </div>

    <div class="container-fluid tartalomnak content container">
        <h1>Konfigurációk</h1>
        <?php
        $szamolo = 0;
        for ($i = 0; $i < count($szam_Tomb); $i++) {
            if ($szamolo == 0) {
                echo "<div class='row'>";
            }
            $szamolo++;
            echo "
                    <div class='col-sm-12 col-lg-6 my-3'>
                    \t<div class='card w-100 konfig_card' >
                    \t\t<div class='card-body'>";
            $sql = "SELECT nev FROM felhasznalok WHERE id={$szam_Tomb[$i]['felh_id']}";
            $nev = $webshop->sqlAssoc($sql);

            $sql = "SELECT felh_id, konf_id, termek_id FROM konfig_id as ki INNER JOIN konfig as k ON k.konf_id = ki.id WHERE ki.id={$szam_Tomb[$i]['id']}";
            $vtomb = $webshop->sqlAssoc($sql);

            echo "\t<h1>";
            print_R($nev[0]['nev']);
            echo "</h1><br>";
            echo "\t<table class='w-100 konfig border border-2 mx-auto'>";

            for ($j = 0; $j < count($vtomb); $j++) {
                echo "<tr class='border'><td class='border'>";
                $sql = "SELECT megnevezes
                        FROM termekek AS t
                        INNER JOIN termek_kategoriak AS k
                        ON t.kategoria_id=k.id
                        WHERE t.id={$vtomb[$j]['termek_id']}";
                $kat = $webshop->sqlAssoc($sql);

                echo $kat[0]['megnevezes'] . "</td><td class='border'>";
                $sql = "SELECT CONCAT(m.megnevezes,' - ', t.megn) AS nev
                        FROM termekek AS t
                        INNER JOIN markak AS m
                        ON m.id=t.marka_id
                        WHERE t.id={$vtomb[$j]['termek_id']}";
                $tomb = $webshop->sqlAssoc($sql);
                echo $tomb[0]['nev'] . "</td></tr>";
            }

            $sql1 = "SELECT COUNT(konfig_id) AS likes FROM ertekeles  WHERE ertekeles=1 AND konfig_id=$i";
            $sql2 = "SELECT COUNT(konfig_id) AS dislikes FROM ertekeles  WHERE ertekeles=2 AND konfig_id=$i";
            $like = $webshop->sqlAssoc($sql1);
            $dislike = $webshop->sqlAssoc($sql2);

            $fid = $_SESSION['fid'];
            $sql = "SELECT ertekeles FROM ertekeles WHERE konfig_id=$i AND felh_id=$fid";
            $select = $webshop->sqlAssoc($sql);

            echo " 
                    \t\t</table>  <button class='";
            if (isset($select[0]['ertekeles']) && $select[0]['ertekeles'] == 1) {
                echo "selected_like ";
            }
            echo "like btn btn-primary m-2' id='" . $i . "l'><i class='fa fa-thumbs-up fa-lg'>  " . $like[0]['likes'] . "</i></button><button class='";
            if (isset($select[0]['ertekeles']) && $select[0]['ertekeles'] == 2) {
                echo "selected_dislike ";
            }
            echo "dislike btn btn-primary m-2' id='" . $i . "d'><i class='fa fa-thumbs-down fa-lg'>  " . $dislike[0]['dislikes'] . "</i></button>
                    \t\t</div>
                    \t</div>
                    </div>";
        }
        ?>
        <form action="limit.php" method="post">
            <div class="container-fluid"><input type="submit" value="Előző" name="e" class="btn btn-primary m-2">
                <?php echo $oldal + 1; ?><input type="submit" value="Következő" name="k" class="btn btn-primary m-2">
            </div>
        </form>

    </div>

    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <script>
        $(document).ready(function () {
            let fid = "<?php echo $_SESSION['fid'] ?>";
            
            $(".like").click(function () {
                var id = this.id;
                $.ajax({
                    url: "rating.php",
                    type: "POST",
                    data: { felh_id: fid, konf_id: id[0], ert: 1 },
                    success: function (response) {
                        location.reload();
                    }
                });
            });

            $(".dislike").click(function () {
                var id = this.id;
                $.ajax({
                    url: "rating.php",
                    type: "POST",
                    data: { felh_id: fid, konf_id: id[0], ert: 2 },
                    success: function (response) {
                        location.reload();
                    }
                });
            });
        });
    </script>

</body>
</html>