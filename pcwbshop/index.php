<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pc-Webshop</title>
  <link rel="icon" type="image/x-icon" href="4703487.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="style.css">
</head>


<body>

  <div class="mindenseg">
    <div class="w3-sidebar w3-bar-block  w3-card bg-info" style="width:15%;" id="mySidebar">
      <input placeholder="Keresés..." type="search" class="input">
      <br>
      <div class="border">
        <form>
          <?php

          require_once "adatbazis.php";
          $sql = 'SELECT megnevezes FROM termek_kategoriak';

          $db = kapcs();
          $stm = $db->prepare($sql);
          $stm->execute();


          foreach ($stm as $sor) {
            echo "<input type='checkbox' name='' id=''> <label>{$sor['megnevezes']}</label> <br>";
          }
          ?>
        </form>
      </div>
    </div>
    <div class="blue-bg"></div>
    <div class="white-bg shadow"></div>
    <div class="content w3-main" style="margin-left:20%">
      <h1>PC-Webshop</h1>

      <?php
      $sql = 'SELECT megnevezes FROM termek_kategoriak';

      $db = kapcs();
      $stm = $db->prepare($sql);
      $stm->execute();

      //print_r($stm->fetchAll(PDO::FETCH_ASSOC));
      echo "<div class='row'>";
      foreach ($stm as $sor) {
        echo "
          <div class='col-3 col-sm-6 col-md-3'>
              <div class='card mb-4 h-100 shadow-sm'>
                  <img src='https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png' class='card-img-top' alt='...' />
                  <div class='card-body'>
                      <div class='clearfix mb-3'>
                          <span class='kat'>{$sor['megnevezes']}</span>
                      </div>
                      <div class='text-center my-4'>
                          <a href='{$sor['megnevezes']}.php' class='btn btn-outline-info' target='_blank'>Tovább...</a>
                      </div>
                </div>
              </div>
          </div>
        ";
      }
      echo "</div>";




      ?>
    </div>
  </div>
</body>

</html>