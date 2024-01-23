<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pc-Webshop</title>
  <link rel="icon" type="image/x-icon" href="4703487.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="style.css">
</head>


<body>
  <?php
  session_start();
  require_once "adatbazis.php";
  $db = kapcs();
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
      <nav class="navbar navbar-expand-sm bg-body fixed">
        <div class="container">
          <a class="navbar-brand" href="#">PC Webshop</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

              <?php
              $sqlKat = 'SELECT * FROM termek_kategoriak';

              $stmtKat = $db->query($sqlKat);
              $kategoriak = $stmtKat->fetchAll(PDO::FETCH_ASSOC);

              echo '
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Perifériák
                </a>';
              echo "<ul class='dropdown-menu'>";
              foreach ($kategoriak as $kategoria) {
                if ($kategoria['kat_id'] == 1) {
                  echo "
                      <li><a class='dropdown-item' href='index.php?kategoria={$kategoria['id']}'>{$kategoria['megnevezes']}</a></li>
                    ";
                }
              }
              echo '</ul></li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  PC Alkatrészek
                </a>';
              echo "<ul class='dropdown-menu'>";
              foreach ($kategoriak as $kategoria) {
                if ($kategoria['kat_id'] == 2) {
                  echo "
                      <li><a class='dropdown-item' href='index.php?kategoria={$kategoria['id']}'>{$kategoria['megnevezes']}</a></li>
                    ";
                }
              }
              echo '</ul></li>

                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Egyéb
                  </a>';
              echo "<ul class='dropdown-menu'>";
              foreach ($kategoriak as $kategoria) {
                if ($kategoria['kat_id'] == 3) {
                  echo "
                      <li><a class='dropdown-item' href='index.php?kategoria={$kategoria['id']}'>{$kategoria['megnevezes']}</a></li>
                    ";
                }
              }
              echo '</ul></li>';
              ?>
            
            <li class="nav-item">
              <a class="nav-link" href="kosar.php">Kosár</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Bejelentkezés</a>
            </li>
          </ul>
          </div>
        </div>
      </nav>


      <div class='text-center my-4'>
      </div>
    </div>
    <div class="white-bg shadow">

    </div>
    <div class="content w3-main" style="margin-left:20%">
      <h1>Tornado PC</h1>
      <?php

      if (!isset($_SESSION['kosar'])) {
        $_SESSION['kosar'] = array();
      }

      function addToCart($productId, $productName, $productPrice)
      {
        $item = array(
          'id' => $productId,
          'name' => $productName,
          'price' => $productPrice
        );

        $_SESSION['kosar'][] = $item;
      }

      if (isset($_GET['kosarba_helyezes'])) {
        $productId = $_GET['kosarba_helyezes'];

        $productQuery = "SELECT * FROM termekek WHERE id = :productId";
        $stmtProduct = $db->prepare($productQuery);
        $stmtProduct->bindParam(':productId', $productId);
        $stmtProduct->execute();
        $product = $stmtProduct->fetch(PDO::FETCH_ASSOC);

        $productId = $_GET['kosarba_helyezes'];
        $kosarbanVanE = false;
        foreach ($_SESSION['kosar'] as $item) {
          if ($item['id'] == $productId) {
            $kosarbanVanE = true;
            break;
          }
        }
        if (!$kosarbanVanE) {
          addToCart($productId, $product['megn'], $product['ar']);
        }
      }

      $sqlKategoriak = 'SELECT * FROM termek_kategoriak';

      $stmtKategoriak = $db->query($sqlKategoriak);
      $kategoriak = $stmtKategoriak->fetchAll(PDO::FETCH_ASSOC);

      // if (!isset($_GET['kategoria']) || empty($_GET['kategoria'])) {
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


      if (isset($_GET['kategoria'])) {
        $kategoriaId = $_GET['kategoria'];

        $sql = "SELECT * FROM termekek WHERE kategoria_id = :kategoriaId";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':kategoriaId', $kategoriaId);
        $stmt->execute();
        // print_r($kategoriak);
      
        echo '<div class="row">';
        foreach ($stmt as $sor) {
          echo "
              <div class='col-md-3'>
                  <div class='card mb-4 h-100 shadow-sm'>
                      <img src='https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png' class='card-img-top' alt='...' />
                      <div class='card-body'>
                          <div class='clearfix mb-3'>
                              <span class='float-start badge rounded-pill bg-primary'>{$sor['megn']}</span>
                              <span class='float-end'>{$sor['ar']} Ft</span>
                          </div>
                          <h5 class='card-title'>{$sor['megn']}</h5>
                          <div class='text-center my-4'>
                              <a href='#' class='btn btn-info'>Vásárlás</a>
                          </div>
                          <div class='sor'>
                              <div class='text-center'>
                                  <a href='index.php?kategoria={$kategoria['id']}&kosarba_helyezes={$sor['id']}'' class='btn'><img class='kosar' src='shopping-cart.png'></a>
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