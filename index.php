<!DOCTYPE html>
<html lang="hu">
<?php require_once "fuggvenyek.php"; ?>
<head>
  <?php $webshop = new Webshop(); $webshop->HeadInsert(); ?>
</head>
<body>
  <?php
    session_start();
  ?>

  <div class="mindenseg">
    <div class="w3-sidebar w3-bar-block  w3-card bg-info" style="width:15%;" id="mySidebar">
      <input placeholder="Keresés..." type="search" class="input">
      <br>
      <div class="border">
        <form>
        </form>
      </div>
    </div>


    <div class="blue-bg">

      <?php require_once "navbar.php"; ?>

      <div class='text-center my-4'>
      </div>
    </div>
    <div class="white-bg shadow">

    </div>
    <div class="content w3-main" style="margin-left:20%">
      <h1>Tornado PC</h1>
      <?php

      
      // Kosar  // id termek_id fh_id ar mennyiseg	
      if (isset($_GET['kosarba_helyezes'])) {
        $termek_id = $_GET['kosarba_helyezes'];

        $sql_termekekbol = "SELECT * FROM termekek WHERE id = $termek_id";
        $stmt_termekekbol = $db->prepare($sql_termekekbol);
        $stmt_termekekbol->execute();
        $termekekbol_adatok = $stmt_termekekbol->fetch(PDO::FETCH_ASSOC);

        $sql_ell = "SELECT * FROM tetelek WHERE termek_id = $termek_id";
        $stmt_ell = $db->prepare($sql_ell);
        $stmt_ell->execute();
        //$van = $stmt_ell->fetch(PDO::FETCH_ASSOC);

       /* if ($van) {
          $uj_menny = $van['mennyiseg'] + 1;
          $sql_update = "UPDATE tetelek SET mennyiseg = $uj_menny WHERE termek_id = $termek_id";
          $stmt_update = $db->prepare($sql_update);
          $stmt_update->execute();
        } else {*/
          $sql_insert = "INSERT INTO tetelek(termek_id, fh_id, ar, mennyiseg) VALUES (?, 1, ?, 1)";
                                      //($termek_id, sessionbol fh_id, $termek_ar, ? )
          $stmt_insert = $db->prepare($sql_insert);
          $stmt_insert->execute([$termek_id, $termekekbol_adatok['ar']]);
        //}
      }

      $sqlKategoriak = 'SELECT * FROM termek_kategoriak';
      $stmtKategoriak = $db->query($sqlKategoriak);
      $kategoriak = $stmtKategoriak->fetchAll(PDO::FETCH_ASSOC);

      if (!isset($_GET['kategoria'])) {
      echo "<div class='row'>";
      foreach ($kategoriak as $kategoria) {
        echo "
          <div class='col-3 col-sm-6 col-md-3'>
              <div class='card mb-4 h-100 shadow-sm'>
                  <img src='https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png' class='card-img-top' alt='...' />
                  <div class='card-body'>
                      <div class='clearfix mb-3'>
                          <span class='kat'>{$kategoria['megnevezes']}</span>
                      </div>
                      <div class='text-center my-4'>
                          <a href='index.php?kategoria={$kategoria['id']}' class='btn btn-outline-info'>Tovább...</a>
                      </div>
                </div>
              </div>
          </div>
        ";
      }
      echo '</div>';
    }


      if (isset($_GET['kategoria'])) {
       $kategoriaId = $_GET['kategoria'];

        $sql = "SELECT t.id, m.megnevezes, t.megn, t.ar
                FROM termekek AS t
                INNER JOIN markak AS m ON m.id=t.marka_id
                WHERE t.kategoria_id=$kategoriaId
                ORDER BY 2,3";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        //print_r($stmt);
      
        echo '<div class="row">';
        foreach ($stmt as $sor) {
          //print_r($sor);
          echo "
              <div class='col-md-3'>
                  <div class='card mb-4 h-100 shadow-sm'>
                      <img src='https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png' class='card-img-top' alt='...' />
                      <div class='card-body'>
                          <div class='clearfix mb-3'>
                              <span class='float-start badge rounded-pill bg-primary'>{$sor['megnevezes']}</span>
                              <span class='float-end'>{$sor['ar']} Ft</span>
                          </div>
                          <h5 class='card-title'>{$sor['megn']}</h5>
                          <div class='text-center my-4'>
                              <a href='#' class='btn btn-info'>Vásárlás</a>
                          </div>
                          <div class='sor'>
                              <div class='text-center'>
                                  <a href='index.php?kategoria={$kategoria['id']}&kosarba_helyezes={$sor['id']}' class='btn'><img class='kosar' src='shopping-cart.png'></a>
                              </div>
                              <div class='text-center'>
                                  <a href='#' class='btn'><img class='sziv' src='heart.png'></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          ";
        }
        echo '</div>';
      }
    








      ?>

    </div>
  </div>
</body>

</html>