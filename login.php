<?php
    session_start();
    //ob_start();
    require_once "fuggvenyek.php";
    $webshop = new Webshop();
    $user = new User();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->headInsert(" - Bejelentkezés"); ?>
</head>

<body>
    <div class="container_form">
        <form class="formnak" method="post" action="<?=$_SERVER['PHP_SELF']?>">
            <div class="head">
                <span>Bejelentkezés</span>
            </div>
            <div class="inputs">
                <input type="text" name="fnev" placeholder="Felhasználónév" required>
                <input type="password" name="jelsz" placeholder="Jelszó" required>
            </div>
            <input type="submit" class="button" value="Bejelentkezés">
        </form>
        <div class="form-footer">
            <p>Regisztráljon itt! <a href="reg.php">Regisztráció</a></p>
        </div>
    </div>

<?php
    /*https://uiverse.io/TasneemHatem97/strange-deer-62*/

    $user->login();
?>



</body>

</html>