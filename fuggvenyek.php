<?php
class Webshop extends DB
{
  public function head($cim = null)
  {
    echo "
      <meta charset='UTF-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Tornado PC$cim</title>
      <link rel='icon' type='image/x-icon' href='kepek/favicon.png'>
      <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
      <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4'
        crossorigin='anonymous'></script>
      <link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
      <link rel='stylesheet' href='css/style.css'>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
";
  }
  public function dropdown($cime, $kat_id = null)
  {
    if ($kat_id != null) {
      $sql = "SELECT * FROM termek_kategoriak
      WHERE kat_id = $kat_id
      ORDER BY 2";
      $kategoriak = parent::sqlAssoc($sql);
    } elseif (isset($_SESSION['fid'])) {
      $sql = "SELECT * FROM felhasznalok
              WHERE id = {$_SESSION['fid']}";
      $felhasznalok = parent::sqlAssoc($sql);
    }

    echo "
                    <li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'
                        aria-expanded='false'>
                        $cime
                      </a>
                      <ul class='dropdown-menu'>";
    if (isset($kategoriak)) {
      foreach ($kategoriak as $kategoria) {
        echo "
                        <li>
                          <a href='termekek.php?kategoria_id={$kategoria['id']}' class='dropdown-item linkbol_gombnak'>{$kategoria['megnevezes']}</a>
                        </li>";
      }
    } elseif (isset($felhasznalok)) {
      echo "
                      <li class='nav-item'>
                        <button class='nav-link linkbol_gombnak kijel'>Kijelentkezés</button>
                      </li>
                      ";
      echo "
                      <li class='nav-item'>
                        <a class='nav-link' href='rendeles_elozmenyek.php'>Rendelési előzmények</a>  
                      </li>
                      ";
    }
    echo "
                    </ul>
                  </li>
                  ";
  }
  public function navbar($valtozat)
  {
    if ($valtozat == 1) {
      $bejelentkezettE = isset($_SESSION['fid']) ? false : true;
      echo "
            <nav class='navbar navbar-expand-xl bg-body fixed'>
              <div class='container'>
                <a class='navbar-brand' href='index.php'>TornadoPC</a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                  <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                  <ul class='navbar-nav'>";
      $this->dropdown("PC Alkatrészek", 1);
      $this->dropdown("Perifériák", 2);
      $this->dropdown("Egyéb", 3);
      echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='termekek.php?osszes_termek'>Összes termék</a>
                    </li>
                    <form method='GET' action='termekek.php'>
                      <input type='text' class='keresosav ms-2' name='keres' value='";
      isset($_GET['keres']) ? $_GET['keres'] : '';
      echo "'>
                      <button type='submit' class='btn'><img class='keres' src='kepek/search.png'></button>
                    </form>
                  </ul>
                  </div>
                <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                  <ul class='navbar-nav ms-auto'>
                    ";
      if ($bejelentkezettE) {
        echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='bejelentkezes.php'>Bejelentkezés</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='regisztracio.php'>Regisztráció</a>
                    </li>
                    <li class='nav-item' title='Jelentkezzen be a kosár használatához!'>
                      <a class='nav-link disabled' href='kosar.php'><img class='kosar' src='kepek/shopping-cart.png'></a>
                    </li>
                    <li class='nav-item' title='Jelentkezzen be a kedvencek használatához!'>
                      <a class='nav-link disabled' href='kedvencek.php'><img class='sziv' src='kepek/heart.png'></a>
                    </li>
                    ";
      } else {
        $sql = "SELECT COUNT(id) AS db FROM kosar WHERE fh_id = {$_SESSION['fid']} AND allapot = 0";
        $darabszam = parent::sqlSelect2($sql);
        echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='konfig.php'>Konfigurációk</a>  
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='konfig_ossze.php'>Konfiguráció összerakó</a>  
                    </li>
                    ";
        $this->dropdown($_SESSION['fnev']);
        echo "
                      <li class='nav-item'>
                        <a class='nav-link btn' href='kosar.php'>
                          <img class='kosar' src='kepek/shopping-cart.png'><span class='friss translate-middle badge rounded-pill bg-danger' value='$darabszam'>$darabszam</span>
                        </a>
                      </li>
                      <li class='nav-item'>
                        <a class='nav-link btn' href='kedvencek.php'><img class='sziv' src='kepek/heart.png'></a>
                      </li>
                      ";
      }
      echo "     
                    </ul>
                </div>
              </div>
            </nav>
            ";

      echo "<script src='js/kijelentkezes.js'></script>";
      if (isset($_POST['funkcio']) && $_POST['funkcio'] == 'k') {
        $_SESSION = array();
        session_destroy();
      }

    } elseif ($valtozat == 2) {
      $sql = "SELECT COUNT(id) AS db FROM kosar WHERE fh_id = {$_SESSION['fid']} AND allapot = 0";
      $darabszam = parent::sqlSelect2($sql);
      echo "
      <nav class='navbar navbar-expand-xl bg-body fixed'>
        <div class='container'>
            <a class='navbar-brand' href='index.php'>TornadoPC</a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
              <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNavDropdown'>
              <ul class='navbar-nav ms-auto'>
                <li class='nav-item'>
                  <a class='nav-link btn' href='kosar.php'>
                    <img class='kosar' src='kepek/shopping-cart.png'><span class='friss translate-middle badge rounded-pill bg-danger' value='$darabszam'>$darabszam</span>
                  </a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link btn' href='kedvencek.php'><img class='sziv' src='kepek/heart.png'></a>
                </li>
              </ul>
            </div>
        </div>
      </nav>
      ";
    } elseif ($valtozat == 3) {
      echo "
      <nav class='navbar navbar-expand-xl bg-body fixed'>
        <div class='container'>
            <a class='navbar-brand' href='index.php'>Vissza a főoldalra</a>
        </div>
      </nav>
      ";
    }
  }
  public function footer()
  {
    $ev = date("Y");
    echo "
    <div class='bg-info'>      
        <a class='text-center' href='index.php'><img src='kepek/favicon.png' class='img-fluid kis_kep' alt='logo'> TornadoPC</a>
        <p class='text-center'>Dallos Ruben, Herédi Gábor</p>
        <p class='text-center'>$ev</p>
    </div>
   ";
  }
  private function image($id, $hova, $nagy = null)
  {
    if ($hova == "kat") {
      $sql = "SELECT * FROM kepek
              WHERE hova = 1 AND megjelenitett_id = $id";
      $kepek = parent::sqlAssoc($sql);
    } elseif ($hova == "termek") {
      $sql = "SELECT * FROM kepek
              WHERE hova = 2 AND megjelenitett_id = $id";
      $kepek = parent::sqlAssoc($sql);
    }

    if (empty($kepek)) {
      echo "<img src='kepek\\noimage.jpg' class='card-img-top' alt='kép nem elérhető'>";
    } else {
      foreach ($kepek as $kep) {
        $class = isset($nagy) ? 'img-fluid' : 'img-fluid card-img-top';
        echo "<img src='{$kep['utvonal']}' class='$class' alt='$id'>";
      }
    }
  }

  public function accordion($cime, $kat_id = null)
  {
    $sqlKategoriak = "SELECT * FROM termek_kategoriak
                      WHERE kat_id = $kat_id
                      ORDER BY 2";

    $kategoriak = $this->sqlAssoc($sqlKategoriak);
    echo "
  <div class='accordion-item'>
    <h2 class='accordion-header'>";
    if ($kat_id == 1) {
      $collapse_id = "collapseOne";
      $aria_expanded = true;
      $show = "show";
    } elseif ($kat_id == 2) {
      $collapse_id = "collapseTwo";
      $aria_expanded = false;
    } elseif ($kat_id == 3) {
      $collapse_id = "collapseThree";
      $aria_expanded = false;
    }
    echo "
        <button class='accordion-button collapsed fw-bolder' type='button' data-bs-toggle='collapse' data-bs-target='#$collapse_id' 
        aria-expanded='$aria_expanded' aria-controls='$collapse_id'>
          $cime
        </button>
    </h2>
    <div id='$collapse_id' class='accordion-collapse collapse ";
    if (isset($show))
      echo "$show";
    echo "' data-bs-parent='#accordionExample'>
      <div class='accordion-body'>";

    echo "<div class='row'>";
    foreach ($kategoriak as $kategoria) {
      echo "
        <div class='col-sm-6 col-lg-4 col-xl-3 my-3'>
          <div class='card mb-4 h-100 shadow-sm border border-info'>
            ";
      $this->image($kategoria['id'], "kat");
      echo "<div class='card-body'>
                <div class='clearfix mb-3'>
                    <span class='kategorianak  kozepre  float-start border border-info'>{$kategoria['megnevezes']}</span>
                </div>
                <a href='termekek.php?kategoria_id={$kategoria['id']}' class='btn border-info d-block w-50 mx-auto'>Tovább</a>";
      echo "
            </div>
          </div>
        </div>";
    }
    echo "
        </div>
      </div>
    </div>
  </div>";
  }
  public function kategoriakMegjelenit()
  {
    echo "
    <div class='accordion cucc' id='accordionExample'>";
    $this->accordion('PC Alkatrészek', 1);
    $this->accordion('Perifériák', 2);
    $this->accordion('Egyéb', 3);
    echo "
    </div>";
  }
  public function termekekMegjelenit($p, $kategoria_id = null, $keresett = null)
  {
    $rendez = "2"; //alapértelmezetten abc sorrend
    if (isset($_SESSION['rendez']) && isset($_POST['rendez'])) {
      $_SESSION['rendez'] = $_POST['rendez'];
    } elseif ((!isset($_POST['rendez'])) && (!isset($_SESSION['rendez']))) {
      $_SESSION['rendez'] = '0';
    }
    echo "
    <form id='rendezForm' method='POST' action='{$_SERVER['REQUEST_URI']}'>
      <select class='form-select w-25' name='rendez' onchange='rendezeshez()'>
          <option value='0' ";
        if ($_SESSION['rendez'] == '0') {
            echo 'selected';
        }
        echo ">ABC sorrend</option>
        <option value='1' ";
        if ($_SESSION['rendez'] == '1') {
            echo 'selected';
        }
        echo ">Ár csökkenő</option>
        <option value='2' ";
        if ($_SESSION['rendez'] == '2') {
            echo 'selected';
        }
        echo ">Ár növekvő</option>
      </select>
    </form>";

    if (isset($_SESSION['rendez'])) {
      switch ($_SESSION['rendez']) {
        case '0':
          $rendez = 2; //abc sorrend
          break;
        case '1':
          $rendez = '4 DESC'; //ár csökkenő
          break;
        case '2':
          $rendez = '4 ASC'; //ár növekvő
          break;
      }
    }

    if ($kategoria_id == 0) { //összes termék
      $sql = "SELECT Count('id') AS id FROM termekek";
      $sv = parent::sqlSelect($sql);
      $darabszam = $sv['id'];

      $mennyi = 12;
      $lapozas = $this->lapozas($p, $mennyi, $darabszam);
      $egyoldalon = (int) $lapozas[0];
      $start = (int) $lapozas[1];

      $sql = "SELECT t.id, m.megnevezes, t.megn, t.ar
              FROM termekek AS t
              INNER JOIN markak AS m ON m.id = t.marka_id
              ORDER BY $rendez
              LIMIT $start, $egyoldalon";

    } elseif ($kategoria_id > 0) { //kiválasztott kategória termékei
      $sql = "SELECT Count('id') AS id FROM termekek WHERE kategoria_id = $kategoria_id";
      $sv = parent::sqlSelect($sql);
      $darabszam = $sv['id'];

      $mennyi = 4;
      $lapozas = $this->lapozas($p, $mennyi, $darabszam);
      $egyoldalon = (int) $lapozas[0];
      $start = (int) $lapozas[1];

      $sql = "SELECT t.id, m.megnevezes, t.megn, t.ar
              FROM termekek AS t
              INNER JOIN markak AS m ON m.id = t.marka_id
              WHERE t.kategoria_id = $kategoria_id
              ORDER BY $rendez
              LIMIT $start, $egyoldalon";

    } elseif (isset($keresett)) { //keresett kulcsszó termékei
      $sql = "SELECT Count('t.id') AS id
              FROM termekek AS t
              INNER JOIN markak AS m ON m.id = t.marka_id
              WHERE 1 AND CONCAT_WS(' ', m.megnevezes, t.megn) LIKE '%$keresett%'";
      $sv = parent::sqlSelect($sql);
      $darabszam = $sv['id'];

      $mennyi = 4;
      $lapozas = $this->lapozas($p, $mennyi, $darabszam);
      $egyoldalon = (int) $lapozas[0];
      $start = (int) $lapozas[1];

      $sql = "SELECT t.id, m.megnevezes, t.megn, t.ar
              FROM termekek AS t
              INNER JOIN markak AS m ON m.id = t.marka_id
              WHERE 1 AND CONCAT_WS(' ', m.megnevezes, t.megn) LIKE '%$keresett%' 
              ORDER BY $rendez
              LIMIT $start, $egyoldalon";
    }
    $termekek = parent::sqlAssoc($sql);

    echo "<div class='row'>";
    foreach ($termekek as $termek) {
      echo "
        <div class='col-sm-6 col-lg-4 col-xl-3 my-3'>
          <div class='card mb-4 h-100 shadow-sm border border-info'>";
          $this->image($termek['id'], 'termek');
      echo "<div class='card-body'>
              <div class='clearfix mb-3'>
                  <span class='markanak float-start border border-info'>{$termek['megnevezes']}</span>
              </div>
              <h3 class='card-title'>{$termek['megn']}</h3>
              <p class='float-start ar'>" . number_format($termek['ar'], 0, '', ' ') . " Ft</p>
              <div class='sor'>
                <button class='kosarGomb btn' data-termek-id='{$termek['id']}'><img class='kosar' src='kepek/shopping-cart.png'></button>
                <button class='kedvencekGomb btn' data-termek-id='{$termek['id']}'><img class='sziv' src='kepek/heart.png'></button>
                <div class='vasarlas_gomb'>
                    <a href='termek.php?id={$termek['id']}' class='btn btn-info vasarlas_gomb'>Tovább</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    ";
    }
    echo "</div>";
  }
  public function egyTermekMegjelenit($id)
  {
    $sql = "SELECT t.id, m.megnevezes, t.megn, t.ar
              FROM termekek AS t
              INNER JOIN markak AS m ON m.id=t.marka_id
              WHERE t.id=$id";

    $termekek = parent::sqlAssoc($sql);
    echo "
      <div class='row'>";
    foreach ($termekek as $termek) {
      $nev = "{$termek['megnevezes']} {$termek['megn']}";
      echo "
        <div class='col-md-3 nagy_kep'>";
      $this->image($termek['id'], 'termek', 1);
      echo "</div>
        <div class='col-md-9'>
          <h1>$nev</h1>
          <p class='ar'>" . number_format($termek['ar'], 0, '', ' ') . " Ft</p>
          <div class='muvelet_szelesseg'>
            <input class='db_szelesseg' type='number' id='menny' min='1' max='99' value='1'>
            <button class='kosarGomb btn' data-termek-id='{$termek['id']}'><img class='kosar' src='kepek/shopping-cart.png'></button>
            <label class='db_szelesseg' for='kedvencek'>Kedvencek közé:</label>
            <button class='kedvencekGomb btn' id='kedvencek' data-termek-id='{$termek['id']}'><img class='sziv' src='kepek/heart.png'></button>
          </div>
            ";
      $sql = "SELECT *
              FROM jellemzok
              WHERE termek_id = {$termek['id']}";
      $jellemzok = parent::sqlAssoc($sql);

      echo "
      <table class='table table-striped table-responsive'>
        <tr>
          <th colspan=2>
            <h1>" . (empty($jellemzok) ? "Ez a termék nem rendelkezik jellemzőkkel" : "Jellemzők") . "</h1>
          </th>
        </tr>";

      if (isset($jellemzok)) {
        foreach ($jellemzok as $jell) {
          echo "
        <tr>
          <td>{$jell['megnevezes']}</td>
          <td>{$jell['jellemzo']}</td>
        </tr>";
        }

      }
      echo "
    </table>";
      echo "
      </div>
    </div>
    ";
    }
  }

  public function lapozas($p, $egyoldalon, $darabszam)
  {
    $start = ($p - 1) * $egyoldalon;
    $lapok = ceil($darabszam / $egyoldalon);
    $url = strtok($_SERVER['REQUEST_URI'], '&');

    echo "
      <div class='egysor'>
        <ul class='pagination'>
          <li class='page-item'><a href='{$url}&p=1' class='page-link'>&laquo;</a></li>";

    $darab = floor($darabszam / $egyoldalon);
    $kezdoLap = max(1, min($p - floor($darab / 2), $lapok - $darab + 1));

    for ($i = $kezdoLap; $i < $kezdoLap + $darab && $i <= $lapok; $i++) {
      echo "<li class='page-item'><a href='{$url}&p=$i' class='page-link'>$i</a></li>";
    }
    echo "<li class='page-item'><a href='{$url}&p=$lapok' class='page-link'>&raquo;</a></li>
        </ul>
      </div>";
    return array($egyoldalon, $start);
  }

  public function kosarTablazatban()
  {
    $sql = "SELECT k.id, k.termek_id, CONCAT(m.megnevezes,' ', t.megn) AS nev, k.mennyiseg, t.ar
            FROM kosar AS k
            JOIN termekek AS t
            ON t.id = k.termek_id
            JOIN markak AS m
            ON m.id=t.marka_id
            WHERE k.fh_id = {$_SESSION['fid']} AND allapot = 0";
    $termekek = parent::sqlAssoc($sql);

    $sqlVegosszeg = "SELECT SUM(t.ar*k.mennyiseg)
                     FROM kosar AS k
                     INNER JOIN termekek AS t
                     ON t.id = k.termek_id
                     WHERE k.fh_id = {$_SESSION['fid']} AND allapot = 0";
    $vegosszeg = parent::sqlSelect2($sqlVegosszeg);
    $_SESSION['vegosszeg'] = $vegosszeg;

    if (empty($termekek)) {
      echo "<h1>A kosár üres!</h1>";
    } else {
      echo "
      <table class='table table-hover table-striped tablazat mx-auto'>
      <tr class='text-center'>
        <th class='border' colspan=2>Termék</th>
        <th class='border'>Ár</th>
        <th class='border'>Mennyiség</th>
      </tr>";
      foreach ($termekek as $termek) {
        $ar = $termek['ar'] * $termek['mennyiseg'];
        echo "
        <tr>
          <td>";
        $this->image($termek['termek_id'], 'termek');
        echo "</td>
          <td class='tetel_szelesseg fs-5'>
            <a href='termek.php?id={$termek['termek_id']}'>{$termek['nev']}</a>
          </td>
          <td class='cella_szelesseg text-center' title='Egységár: 1 db = " . number_format($termek['ar'], 0, '', ' ') . " Ft'>" . number_format($ar, 0, '', ' ') . " Ft</td>
          <td class='cella_szelesseg'>
            <div class='mennyisegnek mx-auto'>
              <span class='menny border border-primary rounded'>{$termek['mennyiseg']} db</span>
              <button class='btn btn-primary csokk menny_gomb' value='{$termek['id']}'>-</button>
              <button class='btn btn-primary nov menny_gomb' value='{$termek['id']}'>+</button>
              <button class='btn btn-outline-danger torol' value='{$termek['id']}'>Törlés</button>
            </div>
          </td>
        </tr>";
      }
      echo "
    </table>
    <div class='vegosszeg w-75 mx-auto py-2'>
      <h2>Végösszeg: " . number_format($vegosszeg, 0, '', ' ') . " Ft</h2>
      <button class='btn btn-danger teljes_kosar_torol' >Teljes kosár törlése</button>
      <a class='btn btn-info float-end' href='rendeles.php'>Tovább a rendeléshez</a>
    </div>
    ";
    }
  }
  public function kedvencekTablazatban()
  {
    echo "
    <table class='table table-hover table-striped tablazat mx-auto'>
      <tr class='text-center'>
        <th class='border'></th>
        <th class='border'colspan=2>Termék</th>
        <th class='border'>Ár</th>
        <th class='border'>Műveletek</th>
      </tr>";

    $sql = "SELECT k.id, k.termek_id AS termek_id, CONCAT(m.megnevezes,' ', t.megn) AS nev, t.ar
            FROM kedvencek AS k
            JOIN termekek AS t
            ON t.id = k.termek_id
            JOIN markak AS m
            ON m.id=t.marka_id
            WHERE k.fh_id = {$_SESSION['fid']}";
    $termekek = parent::sqlAssoc($sql);

    if (empty($termekek)) {
      echo "<h1>A kedvencek üres!</h1>";
    } else {
      $sorszam = 0;
      foreach ($termekek as $termek) {
        $sorszam++;
        echo "
      <tr>
        <td>{$sorszam}</td>
        <td class='cella_szelesseg'>";
        $this->image($termek['termek_id'], 'termek');
        echo "</td>
        <td class='tetel_szelesseg fs-5'><a href='termek.php?id={$termek['termek_id']}'>{$termek['nev']}</a></td>
        <td class='cella_szelesseg w-25'>" . number_format($termek['ar'], 0, '', ' ') . " Ft</td>
        <td class='cella_szelesseg'>
        <div class='mennyisegnek mx-auto'>
          <button class='btn btn-outline-danger torol' value='{$termek['id']}'>Törlés</button>
          <button class='kosarGomb btn' data-termek-id='{$termek['termek_id']}'><img class='kosar' src='kepek/shopping-cart.png'></button>
        </div>
        </td>
      </tr>";
      }
      echo "
    </table>
    ";
    }
  }
}
class DB
{
  protected $db;
  public function __construct()
  {
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $dbname = "tornado-pc";

    $s = "mysql:host=$host;dbname=$dbname;charset=utf8;port=3306";
    $db = new PDO($s, $user, $pwd);
    $this->db = $db;
  }
  public function sqlAssoc($sql)
  {
    $stmt = $this->db->query($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function sqlQuery($sql)
  {
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt;
  }
  public function sqlSelect($sql)
  {
    $stmt = $this->db->query($sql);
    $stmt->execute();
    return $stmt->fetch();
  }
  public function sqlSelect2($sql)
  {
    $stmt = $this->db->query($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
  }
  public function sqlSelect3($sql)
  {
    $stmt = $this->db->query($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}

class Felhasznalo extends DB
{
  public function regisztracioForm()
  {
    echo "
    <div class='container_form'>
      <form class='formnak' method='POST' action='{$_SERVER['PHP_SELF']}'>
          <div class='head'>
              <span>Regisztráció</span>
          </div>
          <div class='inputs'>
              <input type='text' name='fnev' placeholder='Felhasználónév' required>
              <input type='email' name='email' placeholder='Email' required>
              <input type='password' name='jelsz' placeholder='Jelszó (8-15 karakter)' required id='jelsz' onkeyup='valt(this.value)'>
          </div>
          <p id='jsz'></p>
          <input type='submit' class='button' value='Regisztráció' id='regbtn'>
      </form>
      <div class='form-footer'>
          <p>Regisztrált már? <a href='bejelentkezes.php'>Bejelentkezés</a></p>
      </div>
  </div>
  ";
  }
  public function regisztracio()
  {
    if (isset($_POST['fnev']) && isset($_POST['email']) && isset($_POST['jelsz'])) {
      $fnev = $_POST['fnev'];
      $email = $_POST['email'];
      $j = $_POST['jelsz'];

      $jelszo = sha1($j);
      $sql = "INSERT INTO felhasznalok (nev,email,jelszo) VALUES ('$fnev', '$email', '$jelszo')";

      try {
        parent::sqlQuery($sql);
        echo "<script>alert('Regisztráció sikeres!')</script>";
      } catch (Exception $e) {
        echo "<script>alert('Hiba: '+$e)</script>";
      }
    }
  }

  public function bejelentkezesForm()
  {
    echo "
    <div class='container_form'>
      <form class='formnak' method='POST' action='{$_SERVER['PHP_SELF']}'>
          <div class='head'>
              <span>Bejelentkezés</span>
          </div>
          <div class='inputs'>
              <input type='text' name='fnev' placeholder='Felhasználónév' required>
              <input type='password' name='jelsz' placeholder='Jelszó' required>
          </div>
          <input type='submit' class='button' value='Bejelentkezés'>
      </form>
      <div class='form-footer'>
          <p>Regisztráljon itt! <a href='regisztracio.php'>Regisztráció</a></p>
      </div>
  </div>
  ";
  }
  public function bejelentkezes()
  {
    if (isset($_POST['fnev']) && isset($_POST['jelsz'])) {
      $fnev = $_POST['fnev'];
      $j = $_POST['jelsz'];
      $_SESSION['o'] = 0;
      $jelszo = sha1($j);

      $sql = "SELECT * FROM felhasznalok WHERE nev = '$fnev' AND jelszo = '$jelszo'";
      $ell = parent::sqlAssoc($sql);

      if (count($ell) > 0) {
        header("Location: index.php");
      } else {
        echo "<script>alert('Nem megfelelő a felhasználónév vagy jelszó')</script>";
      }
      foreach ($ell as $e) {
        $_SESSION['fid'] = $e['id'];
        $_SESSION['fnev'] = $fnev;
      }
    }
  }
}

class Rendeles extends DB{
  public function rendelesAdatokBeker(){
    $sql = "SELECT * FROM fizetes_modok";
    $fiz_modok = parent::sqlAssoc($sql);

    echo "
    <form action=rendeles_feldolgoz.php method='POST' class='rendeles_form w-50 mx-auto p-3 border border-info rounded'>
      <label for='teljes_nev'>Teljes név</label>
      <input type='text' name='teljes_nev' id='teljes_nev' placeholder='Citrom Cecil' required><br>
      <label for='irsz'>Irányítószám</label>
      <input type='number' name='irsz' id='irsz' placeholder='2600' required>
      <label for='telepules'>Település</label>
      <input type='text' name='telepules' id='telepules' placeholder='Vác' required><br>
      <label for='sz_cim'>Szállítási cím</label>
      <input type='text' name='sz_cim' id='sz_cim' placeholder='Petőfi Sándor u. 68.' required><br>
      <label for='telsz'>Telefonszám</label>
      <input type='tel' name='telsz' id='telsz' placeholder='06301112233' required><br>

      <select class='form-select w-50' name='fiz_mod_id'>
        <option selected disabled>Fizetési módok</option>";
      foreach ($fiz_modok as $f) {
          echo "<option value='{$f['id']}'>{$f['megnevezes']}</option>";
      }
      echo "
          </select>
      <input class='btn btn-info w-25 d-block mx-auto' type='submit' value='Rendelés' name='rendel'>
    </form>";          
  }
  public function rendelesFeldolgoz(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      try {
        if (isset($_POST['rendel'])) {
          $teljes_nev = $_POST['teljes_nev'];
          $cim = "{$_POST['irsz']} {$_POST['telepules']}, {$_POST['sz_cim']}";
          $telsz = $_POST['telsz'];
          $fiz_mod_id = $_POST['fiz_mod_id'];
          $fhid = $_SESSION['fid'];
          $vegosszeg = $_SESSION['vegosszeg'];

          $sql = "UPDATE felhasznalok SET teljes_nev='$teljes_nev', telefonszam='$telsz', szallitasi_cim='$cim' WHERE id=$fhid";
          parent::sqlQuery($sql);

          $sql = "SELECT *
                  FROM kosar
                  WHERE fh_id = $fhid AND allapot = 0";
          $kosar = parent::sqlSelect3($sql);

          $sql = "INSERT INTO rendeles(fh_id, vegosszeg, fiz_mod_id, leadas_datuma, allapot) 
                  VALUES ($fhid, $vegosszeg, $fiz_mod_id, CURRENT_TIMESTAMP, 'leadva')";
          parent::sqlQuery($sql);

          $sql = "SELECT LAST_INSERT_ID()";
          $last_id = parent::sqlSelect2($sql);
          for ($i = 0; $i < count($kosar); $i++) {
            $sql = "INSERT INTO tetelek(fh_id, kosar_id, rendeles_id) 
                    VALUES ({$kosar[$i]['fh_id']}, {$kosar[$i]['id']}, $last_id)";
            parent::sqlQuery($sql);

            $sql = "UPDATE kosar SET allapot = 1 WHERE id = {$kosar[$i]['id']}";
            parent::sqlQuery($sql);
          }
          $sql_fh = "SELECT * FROM felhasznalok WHERE id=$fhid";
          $fh_adatok = parent::sqlSelect($sql_fh);

          $sql_rendeles = "SELECT * FROM rendeles WHERE id=$last_id";
          $rendeles_adatok = parent::sqlSelect($sql_rendeles);
          echo "
            <div class='row'>
              <div class='col-md-8'>
                <img class='mx-auto d-block' src='kepek\\pipa.png'>
                <h1 class='text-center text-success'>Sikeresen megrendelve!</h1>
              </div>
              <div class='col-md-4 border border-2'>
                <h2 class='border-top border-success'>Megrendelő neve</h2>
                <p>{$fh_adatok['teljes_nev']}</p>
                <h2 class='border-top border-success'>Elérhetőségei</h2>
                <p>{$fh_adatok['email']}</p>
                <p>{$fh_adatok['telefonszam']}</p>
                <h2 class='border-top border-success'>Szállítási cím</h2>
                <p>{$fh_adatok['szallitasi_cim']}</p>
                <h2 class='border-top border-success'>Végösszeg</h2>
                <p class='ar'>" . number_format($rendeles_adatok['vegosszeg'], 0, '', ' ') . " Ft</p>
                <p class='border border-info rounded p-2 fst-italic'>A főoldalon a 'Rendelési előzmények' menüpontra kattintva megtekinthetőek a rendelés tételei.</p>
              </div>
            </div>";
        }
      } catch (Exception $e) {
        echo "
            <img class='mx-auto d-block' src='kepek\\X.png'>
            <h1 class='text-center text-danger'>Sikertelen megrendelés!</h1>";
      }
    }
  }
  public function rendelesElozmenyekTablazatban()
  {
    echo "<h1>Rendelési előzmények</h1>";
    
    $vanElozmeny = false;
    $sql = "SELECT * FROM rendeles WHERE fh_id = {$_SESSION['fid']}";
    $rendelesek = $this->sqlAssoc($sql);

    foreach ($rendelesek as $r) {
      $tetelek = [];
      $elozmenyek = [];
      echo "<h2 class='border-top mt-5'>Dátum: {$r['leadas_datuma']}</h2>
              <h3>Végösszeg: " . number_format($r['vegosszeg'], 0, '', ' ') . " Ft</h3>";

      $sql = "SELECT kosar_id FROM tetelek WHERE rendeles_id = {$r['id']}";
      $tetelek_eredmeny = $this->sqlAssoc($sql);
      $tetelek = array_merge($tetelek, $tetelek_eredmeny);
      foreach ($tetelek as $t) {
        $vanElozmeny = true;
        $sql = "SELECT k.id, k.termek_id, CONCAT(m.megnevezes,' ', t.megn) AS nev, k.mennyiseg, t.ar
                            FROM kosar AS k
                            JOIN termekek AS t
                            ON t.id = k.termek_id
                            JOIN markak AS m
                            ON m.id=t.marka_id
                            WHERE k.id = {$t['kosar_id']}";
        $elozmeny_eredmeny = $this->sqlAssoc($sql);
        $elozmenyek = array_merge($elozmenyek, $elozmeny_eredmeny);
      }
      echo "
                <table class='table table-hover table-striped'>
                    <tr><th>Név</th><th>Ár</th><th>Mennyiség</th></tr>";
      if ($vanElozmeny) {
        foreach ($elozmenyek as $e) {
          $ar = $e['ar'] * $e['mennyiseg'];
          echo "
                    <tr>
                        <td>{$e['nev']}</td>
                        <td>" . number_format($ar, 0, '', ' ') . " Ft</td>
                        <td>{$e['mennyiseg']} db</td>
                    </tr>";
        }
      }
      echo "</table>";
    }
    if (!$vanElozmeny) {
      echo "<h1>Nincsenek rendelési előzmények</h1>";
    }
  }
}