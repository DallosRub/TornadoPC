<?php
session_start();
require_once "fuggvenyek.php";
$webshop = new Webshop();
$fh = new Felhasznalo();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->head(" - Regisztráció"); ?>
</head>

<body>
    <?php
    $fh->regisztracioForm();
    $fh->regisztracio();
    ?>

<script>
    document.getElementById("myBtn").disabled = true;
    function valt(ert) {
        if (ert.length>=8) {
            document.getElementById("jsz").innerHTML="";
            document.getElementById("jsz").innerHTML="A jelszó megfelelő hosszúságú";
            let regex =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?-_&])[A-Za-z\d@.#$!%*?-_&]{8,15}$/;
            if (regex.test(ert)) {
                document.getElementById("regbtn").disabled=false;
                document.getElementById("jsz").innerHTML="";
                document.getElementById("jsz").innerHTML="Minden jó";
            }
        }
        else{
            document.getElementById("jsz").innerHTML="";
            document.getElementById("jsz").innerHTML="Eddigi hossz: "+(ert.length);
            document.getElementById("myBtn").disabled = true;
        }
        
    }
</script>
</body>

</html>