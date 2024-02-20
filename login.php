<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Bejelentkezés</title>
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

    if (isset($_POST['fnev']) && isset($_POST['jelsz'])) {
        $fnev = $_POST['fnev'];
        $e = $_POST['jelsz'];
        //$jelszo=password_hash($e,PASSWORD_DEFAULT);
        $jelszo = sha1($e);
        include 'adatbazis.php';
        $db = kapcs();
        $sql = "select *from felhasznalok where nev = '$fnev' and jelszo = '$jelszo'";
        //$sql = "select *from felhasznalok where nev = '$fnev'";
        $csulkospacal = $db->prepare($sql);
        $csulkospacal->execute();
        $ell = $csulkospacal->fetchAll(PDO::FETCH_ASSOC);
        print_r($ell);
        /*print_r($ell);
        var_dump($jelszo);
        var_dump($ell);
        var_dump(password_verify($e,$ell[3]));*/
        if (count($ell) > 0) {
            /*echo '<script language="javascript">';
            echo 'window.location( "index.php" )';
            echo '</script>';*/
            header("Location: index.php");
            session_start();
            $_SESSION['fnev'] = $fnev;
            echo $_SESSION['fnev'];
            //echo"<p class='row'>"
        } else {
            print_r("Valami gond van csikánó");
        }
    }

    /*
            $sql = "select *from felhasznalok where nev = '$fnev' and jelszo = '$jelszo'";  
            $result = mysqli_query($kapcs, $sql);  
            $count = mysqli_num_rows($result);  
            if($count>0){
                print_r("Siker");
            }
            else{print_r("Kaki van a palacsintában");}*/
    ?>



</body>

</html>