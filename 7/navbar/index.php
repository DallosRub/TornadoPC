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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
    integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
    crossorigin="anonymous"></script>
</head>
<style>
  p {
    font-family: 'Open Sans', sans-serif;
    text-align: justify;
  }

  .blue-bg {
    position: fixed;
    background: url(check_computer_specification.webp);
    background-size: cover;
    background-color: #58aff6;
    top: 0;
    height: 100%;
    width: 100%;
    z-index: -1;
    overflow-x: hidden;
  }

  .white-bg {
    position: absolute;
    top: 0;
    background-color: white;
    min-height: 500px;
    margin: 210px 0px;
    width: 100%;
    height: 100vh;
    transform: skewY(3deg);
    z-index: -1;
  }

  .content {
    position: absolute;
    top: 0;
    margin: 250px 10vw;
    max-width: 60vw;
    background-color: transparent;
  }

  .shadow {
    box-shadow: -2px -5px 5px 0px rgba(0, 0, 0, 0.3);
  }

  .mindenseg {
    width: 100%;
  }

  .input {
    margin-left: 10px;
    margin-top: 10px;
    width: 80%;
    height: 40px;
    line-height: 28px;
    padding: 0 1rem;
    padding-left: 2.5rem;
    border: 2px solid transparent;
    border-radius: 8px;
    outline: none;
    background-color: #f3f3f4;
    color: #0d0c22;
    transition: .3s ease;
  }

  .border {
    box-shadow: 0 0 7px 7px blue;
    width: 80%;
    margin-top: 10%;
    margin-left: 10px;
    margin-right: 10px;
    overflow-y: scroll;
    height: 30%;
    padding: 20px;
  }
</style>


<body>
  <div class="mindenseg">
    <div class="w3-sidebar w3-bar-block  w3-card bg-info" style="width:15%;" id="mySidebar">
      <input placeholder="Keresés..." type="search" class="input">
      <br>
      <div class="border">
        <form>
          <input type="checkbox" name="" id=""> <label for="">Cpu</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Gpu</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Alaplap</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Ram</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Hdd</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Ssd</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Tápegység</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Cpu hűtő</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Pc ház</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Monitor</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Egér</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Billentyűzet</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Fejhallgató</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Konzol</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Nyomtató</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Összeépített PC</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Laptop</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Tablet</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Telefon</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Nintendo</label> <br>
          <input type="checkbox" name="" id=""> <label for="">VR eszköz</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Drón</label> <br>
          <input type="checkbox" name="" id=""> <label for="">Fényképezőgép</label> <br>
        </form>
      </div>
    </div>
    ------
    <nav class="navbar navbar-expand-sm bg-body-tertiary fixed">
      <div class="container">
        <a class="navbar-brand" href="#">PC Webshop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Perifériák
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Egerek</a></li>
                <li><a class="dropdown-item" href="#">Billentyűzetek</a></li>
                <li><a class="dropdown-item" href="#">Fejhallgatók</a></li>
                <li><a class="dropdown-item" href="#">Monitorok</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                PC Alkatrészek
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">CPU</a></li>
                <li><a class="dropdown-item" href="#">GPU</a></li>
                <li><a class="dropdown-item" href="#">Alaplapok</a></li>
                <li><a class="dropdown-item" href="#">RAM</a></li>
                <li><a class="dropdown-item" href="#">HDD</a></li>
                <li><a class="dropdown-item" href="#">SSD</a></li>
                <li><a class="dropdown-item" href="#">Tápegységek</a></li>
                <li><a class="dropdown-item" href="#">CPU hűtők</a></li>
                <li><a class="dropdown-item" href="#">Gépházak</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Egyéb
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Játékkonzolok</a></li>
                <li><a class="dropdown-item" href="#">Nyomtatók</a></li>
                <li><a class="dropdown-item" href="#">Összeépített számítógépek</a></li>
                <li><a class="dropdown-item" href="#">Laptopok</a></li>
                <li><a class="dropdown-item" href="#">Tabletek</a></li>
                <li><a class="dropdown-item" href="#">Telefonok</a></li>
                <li><a class="dropdown-item" href="#">Nintendok</a></li>
                <li><a class="dropdown-item" href="#">VR eszközök</a></li>
                <li><a class="dropdown-item" href="#">Drónok</a></li>
                <li><a class="dropdown-item" href="#">Fényképezőgépek</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Rólunk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Bejelentkezés</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Regisztráció</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    ------
    <div class="blue-bg"></div>
    <div class="white-bg shadow"></div>
    <div class="content w3-main" style="margin-left:20%">
      <h1>PC-Webshop</h1>
      <?php

      require_once "adatbazis.php";
      $sql = "SELECT * FROM termekek INNER JOIN markak ON markak.id = termekek.marka_id";

      $limit = 2;
      $aktualisOldal = isset($_GET['oldal']) ? (int) $_GET['oldal'] : 1; // Aktuális oldal, alapértelmezetten az első
      
      $eltolas = ($aktualisOldal - 1) * $limit; // Számoljuk ki, hol kell kezdeni az eredmények kiválasztását
      
      $sql = "SELECT * FROM termekek INNER JOIN markak ON markak.id = termekek.marka_id LIMIT :eltolas, :limit";

      $db = kapcs();
      $stm = $db->prepare($sql);
      $stm->bindParam(':eltolas', $eltolas, PDO::PARAM_INT);
      $stm->bindParam(':limit', $limit, PDO::PARAM_INT);
      $stm->execute();


      //print_r($stm->fetchAll(PDO::FETCH_ASSOC));
      foreach ($stm as $sor) {
        echo "
              <div class='egysor'>
                  <div class='elem'>
                      <p>id:{$sor['0']}</p>
                      <h2><b>{$sor['megnevezes']}</b> {$sor['megn']}</h2>    
                      <p>{$sor['ar']} Ft</p>
                  </div>
              </div>";
      }

      echo "<br>";
      $lapok = ceil($db->query("SELECT COUNT(*) FROM termekek")->fetchColumn() / $limit);
      for ($i = 1; $i <= $lapok; $i++) {
        echo "<a href='?oldal=$i'>$i</a> ";
      }

      $db = null;




      ?>
    </div>
  </div>
</body>

</html>