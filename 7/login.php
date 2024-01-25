<?php
        if(isset($_POST['fnev']) && isset($_POST['jszo'])){
        $fnev=$_POST['fnev'];
        $e=$_POST['jszo'];
        //$jelszo=password_hash($e,PASSWORD_DEFAULT);
        $jelszo=sha1($e);
        include 'adatbazis.php';
        $db=kapcs();
        $sql = "select *from felhasznalok where nev = '$fnev' and jelszo = '$jelszo'";
        //$sql = "select *from felhasznalok where nev = '$fnev'";
        $csulkospacal=$db->prepare($sql);
        $csulkospacal->execute();
        $ell=$csulkospacal->fetchAll(PDO::FETCH_ASSOC);
        /*print_r($ell);
        var_dump($jelszo);
        var_dump($ell);
        var_dump(password_verify($e,$ell[3]));*/
        if(count($ell)>0){
            /*echo '<script language="javascript">';
            echo 'window.location( "index.php" )';
            echo '</script>';*/
            header("Location: index.php");
            session_start();
            $_SESSION['fnev']=$fnev;
            console.log($_SESSION);
            }
        else{print_r("Valami gond van csikánó");}
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


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login_reg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezes</title>
</head>
<body>

    <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 


     <div class="signin"> 
  
      <div class="content"> 
  
       <h2>Bejelentkezés</h2> 
       <form method="post" action="">
       <div class="form"> 
       
        <div class="inputBox"> 
  
         <input type="text" required name="fnev"> <i>Felhasználónév</i> 
  
        </div> 
  
        <div class="inputBox"> 
  
         <input type="password" required name="jszo"> <i>Jelszó</i> 
  
        </div> 
  
        <div class="links"> <a href="reg.php">Még nincs fiókja?</a> <a href="reg.php">Regisztráció</a> 
  
        </div> 
  
        <div class="inputBox"> 
  
         <input type="submit" value="Belépés"> 
  
        </div> 
  
       </div> 
  
      </div> 

     </div> 
     </form>
  
    </section>
    
   </body>
</html>