<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login_reg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login_reg.css">
    <title>Regisztráció</title>
</head>

<body>
    <div class="container">
        <form method="post" action="">
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
    if (isset($_POST['fnev']) && isset($_POST['email']) && isset($_POST['jelsz'])) {
        $fnev = $_POST['fnev'];
        $email = $_POST['email'];
        $e = $_POST['jelsz'];

        //$jelszo=password_hash($e,PASSWORD_DEFAULT);
        $jelszo = sha1($e);
        include 'adatbazis.php';
        $db = kapcs();
        $sql = 'INSERT INTO felhasznalok (nev,email,jelszo) VALUES ("' . $fnev . '","' . $email . '","' . $jelszo . '")';

        try {
            $db->exec($sql);
            print_r("Nagyon baba");
        } catch (Exception $e) {
            print_r("Nem sikerült");
        }
    }

    ?>
</body>

</html>