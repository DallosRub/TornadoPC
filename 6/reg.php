<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login_reg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztracio</title>
</head>
<body>

    

    <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
  
     <div class="signin"> 
  
      <div class="content"> 
  
       <h2>Regisztráció</h2> 
       <form method="post" action="">
       <div class="form"> 
  
        <div class="inputBox"> 
  
         <input type="text" required name="fnev"> <i>Felhasználónév</i> 
  
        </div> 

        <div class="inputBox"> 
  
            <input type="email" required name="email"> <i>E-mail cím</i> 
     
        </div>
  
        <div class="inputBox"> 
  
         <input type="password" required name="jelsz"> <i>Jelszó</i> 
  
        </div> 
  
        <div class="links"> <a href="login.php">Már van fiókja?</a> <a href="login.php">Bejelentkezés</a> 
  
        </div> 
  
        <div class="inputBox"> 
  
         <input type="submit" value="Regisztráció"> 
  
        </div> 
        </form> 
       </div> 
  
      </div> 
  
     </div> 
  
    </section> <!-- partial --> 
    <?php
        $fnev=$_POST['fnev'];
        $email=$_POST['email'];
        $jelszo=$_POST['jelsz'];
        $kapcs=mysqli_connect('localhost','root','','pc-webshop');
        
        $sql="SELECT nev FROM `felhasznalok`";
        $ftomb=mysqli_query($kapcs,$sql);
        print_r($ftomb);

        $sql='INSERT INTO felhasznalok (nev,email,jelszo) VALUES ("'.$fnev.'","'.$email.'","'.$jelszo.'")';
        try{
            mysqli_query($kapcs,$sql);
            print_r("Nagyon baba");
        }
        catch(Exception $e){
            print_r("Nem sikerült");
        }


        mysqli_close($kapcs);
    ?>
   </body>
</html>