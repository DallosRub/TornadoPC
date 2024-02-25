<?php
    session_start();
    ob_start();
    require_once "fuggvenyek.php";
    $webshop = new Webshop();
    $user = new User();
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $webshop->headInsert(" - Regisztráció"); ?>
</head>

<body>
    <div class="container_form">
        <form class="formnak" method="post" action="<?=$_SERVER['PHP_SELF']?>">
            <div class="head">
                <span>Regisztráció</span>
            </div>
            <div class="inputs">
                <input type="text" name="fnev" placeholder="Felhasználónév" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="jelsz" placeholder="Jelszó" required>
            </div>
            <input type="submit" class="button" value="Regisztráció">
        </form>
        <div class="form-footer">
            <p>Regisztrált már? <a href="login.php">Bejelentkezés</a></p>
        </div>
    </div>

<?php
    $user->registration();
?>
</body>

</html>