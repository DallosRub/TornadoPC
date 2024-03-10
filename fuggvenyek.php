<?php
class Webshop extends DB
{
  public function headInsert($cim = null)
  {
    echo "<meta charset='UTF-8'>
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
        <link rel='stylesheet' href='css/style.css'>";
  }
  public function jQueryInsert()
  {
    echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>";
  }
  private function navbarDropdownAssoc($kat_id)
  {
    $sql = "SELECT * FROM termek_kategoriak
              WHERE kat_id = $kat_id
              ORDER BY 2";
    $kategoriak = parent::sqlAssoc($sql);
    return $kategoriak;
  }
  public function dropdownInsert($cime, $kat_id = null)
  {
    if ($kat_id != null) {
      $kategoriak = $this->navbarDropdownAssoc($kat_id);
    } elseif (isset($_SESSION['fid'])) { //navbar fh adatai
      $sql = "SELECT * FROM felhasznalok
              WHERE id = {$_SESSION['fid']}";
      $felhasznalok = parent::sqlAssoc($sql);
    }

    echo "<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'
                aria-expanded='false'>
                $cime
              </a>
              <ul class='dropdown-menu'>";

    if (isset($kategoriak)) {
      foreach ($kategoriak as $kategoria) {
        $this->postButton('dropdown', 'kategoria_id', $kategoria['id'], '', '', $kategoria['megnevezes']);
      }
    } else {
      foreach ($felhasznalok as $fh) {
        $this->postButton('dropdown', 'fh_adatok', $fh['id'], '', '', 'Adatok');
        $this->postButton('dropdown', 'rendeles_elozmenyek', $fh['id'], '', '', 'Rendelési előzmények');
      }
    }
    echo "</ul></li>";
  }
  public function navbarInsert()
  {
    $bejelentkezettE= !isset($_SESSION['fid']) ? true : false;
    echo "
          <nav class='navbar navbar-expand-sm bg-body fixed'>
              <div class='container'>
                  <a class='navbar-brand' href='index.php'>TornadoPC</a>
                  <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavDropdown'
                      aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                      <span class='navbar-toggler-icon'></span>
                  </button>
                  <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                      <ul class='navbar-nav'>";
    $this->dropdownInsert("PC Alkatrészek", 1);
    $this->dropdownInsert("Perifériák", 2);
    $this->dropdownInsert("Egyéb", 3);

    $this->postButton('osszes_termek');
    echo "
                      <li class='nav-item'>
                      <a class='nav-link' href='konfig.php'>Konfigurációk</a>  
                  </li>      
                  <li class='nav-item'>
                      <a class='nav-link' href='konfig_ossze.php'>Konfiguráció összerakó</a>  
                  </li>
                  </ul>
                  <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                      <ul class='navbar-nav ms-auto'>";
    if ($bejelentkezettE) {
      echo "
                            <li class='nav-item'>
                              <a class='nav-link' href='login.php'>Bejelentkezés</a>
                            </li>
                            <li class='nav-item'>
                              <a class='nav-link' href='reg.php'>Regisztráció</a>
                            </li>
                            <li class='nav-item' title='Jelentkezzen be a kosár használatához!'>
                              <a class='nav-link disabled' href='kosar.php'><img class='kosar'  src='shopping-cart.png'></a>
                            </li>";
    } else {
          $sql = "SELECT COUNT(id) AS db FROM `kosar` WHERE fh_id = {$_SESSION['fid']}";
          $darabszam = parent::sqlSelect($sql);

      $this->dropdownInsert($_SESSION['fnev']);
      $this->postButton('kijel', 'kijel');
      echo "                <li class='nav-item'>
                              <a class='nav-link btn' href='kosar.php'>
                                <img class='kosar' src='shopping-cart.png'><span class='translate-middle badge rounded-pill bg-danger'>$darabszam[db]</span>
                              </a>
                            </li>";
    }
    echo "     
                      </ul>
                  </div>
              </div>
          </nav>";
    if (isset($_POST['kijel']) && $_POST['kijel'] == 1) {
      $_SESSION = array();
      session_destroy();
      header('Location: index.php');
    }
  }
  public function footerInsert()
  {
    $ev = date("Y");
    echo "
    <div class='le bg-info'>      
        <a class='text-center' href='index.php'><img src='kepek/favicon.png' class='img-fluid kisKep' alt='logo'> TornadoPC</a>
        <p class='text-center'>Dallos Ruben, Herédi Gábor</p>
        <p class='text-center'>$ev</p>
    </div>
   ";
  }
  private function imageInsert($id, $hova)
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

    foreach ($kepek as $kep) {
      echo "<img src='{$kep['utvonal']}' class='card-img-top img-fluid kep' alt='$id'>";
    }

  }
  public function accordionInsert($cime, $kat_id = null)
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
      <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#$collapse_id' aria-expanded='$aria_expanded' aria-controls='$collapse_id'>
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
      <div class='col-4 col-md-4'>
        <div class='card mb-4 h-100 shadow-sm border border-info'>
          ";
      $this->imageInsert($kategoria['id'], "kat");
      echo "{$kategoria['id']}
            <div class='card-body'>
              <div class='clearfix mb-3'>
                  <span class='kat'>{$kategoria['megnevezes']}</span>
              </div>";
      $this->postButton('kat', 'kategoria_id', $kategoria['id']);
      echo "
            </div>
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
  public function categoriesInsert()
  {
    echo "
    <div class='accordion' id='accordionExample'>";

    $this->accordionInsert('PC Alkatrészek', 1);
    $this->accordionInsert('Perifériák', 2);
    $this->accordionInsert('Egyéb', 3);
    //$vissza=$this->
    //return $vissza
    echo "</div>";

  }
  public function productsInsert($p, $kategoria_id)
  {
    if ($kategoria_id == 0) {
      $sql = "SELECT Count('id') AS id FROM termekek";
      $sv = parent::sqlSelect($sql);
      $darabszam = $sv['id'];

      $mennyi = 9;
      $lapozas = $this->page($p, $mennyi, $darabszam, $kategoria_id);
      $egyoldalon = (int) $lapozas[0];
      $start = (int) $lapozas[1];

      $sql = "SELECT t.id, m.megnevezes, t.megn, t.ar
              FROM termekek AS t
              INNER JOIN markak AS m ON m.id = t.marka_id
              ORDER BY 2
              LIMIT $start, $egyoldalon";
    } else {
      $sql = "SELECT Count('id') AS id FROM termekek WHERE kategoria_id = $kategoria_id";
      $sv = parent::sqlSelect($sql);
      $darabszam = $sv['id'];

      $mennyi = 3;
      $lapozas = $this->page($p, $mennyi, $darabszam, $kategoria_id);
      $egyoldalon = (int) $lapozas[0];
      $start = (int) $lapozas[1];

      $sql = "SELECT t.id, m.megnevezes, t.megn, t.ar
              FROM termekek AS t
              INNER JOIN markak AS m ON m.id = t.marka_id
              WHERE t.kategoria_id = $kategoria_id
              ORDER BY 2
              LIMIT $start, $egyoldalon";
    }
    $termekek = parent::sqlAssoc($sql);

    echo '<div class="row">';
    foreach ($termekek as $termek) {
      echo "
        <div class='col-lg-4'>
            <div class='card mb-4 h-100 shadow-sm border border-info'>
                <img src='https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png' class='card-img-top' alt='...' />
                <div class='card-body'>
                    <div class='clearfix mb-3'>
                        <span class='float-start marka border border-info'>{$termek['megnevezes']}</span>
                        <span class='float-end ar'>";
      echo number_format($termek['ar'], 0, '', ' ');
      echo " Ft</span>
                    </div>
                    <h3 class='card-title'>{$termek['megn']}</h3>
                    <div class='text-center my-4'>
                        <a href='termek.php?id={$termek['id']}' class='btn btn-info'>Vásárlás</a>
                    </div>
                    <div class='sor'>

                       ";

      $this->postButton('kosar', 'kategoria_id', $kategoria_id, 'kosarba_helyezes', $termek['id']);
      //$this->postButton('kedvencek', $kategoria_id, $termek['id']);
      echo "
                    </div>
                </div>
            </div>
        </div>
    ";
    }
    echo '</div>';
  }
  public function productInsert($id)
  {
    $sql = "SELECT t.id, m.megnevezes, t.megn, t.ar
              FROM termekek AS t
              INNER JOIN markak AS m ON m.id=t.marka_id
              WHERE t.id=$id";

    $termekek = parent::sqlAssoc($sql);
    print_r($termekek);
    echo '<div class="row">';
    foreach ($termekek as $termek) {
      echo "
    <div>
      <h1>{$termek['megnevezes']} {$termek['megn']}</h1>
      <img src='https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png' class='card-img-top'>
      <p>{$termek['ar']} Ft</p>
     ";
      $this->postButton('kosar2', 'kategoria_id', $_POST['kategoria_id'], 'kosarba_helyezes', $_SESSION['termekId']);
      echo "</div>";

    }
  }

  public function page($p, $egyoldalon, $darabszam, $kategoria_id)
  {
    $start = ($p - 1) * $egyoldalon;
    $lapok = ceil($darabszam / $egyoldalon);
    echo "
    <nav class='egysor'>
      <ul class='pagination'>
        <form action='?p=1' method='POST'>
          <input type='hidden' name='kategoria_id' value='$kategoria_id'>
          <li class='page-item'><button type='submit' class='page-link post_gombnak'>&laquo;</button></li>
        </form>
      </ul>
    </nav>";

    $darab = floor($darabszam/$egyoldalon);
    $kezdoLap = max(1, min($p - floor($darab / 2), $lapok - $darab + 1));

    for ($i = $kezdoLap; $i < $kezdoLap + $darab && $i <= $lapok; $i++) {
      echo "
      <nav class='egysor'>
        <ul class='pagination'>
          <form action='?p=$i' method='POST'>
            <input type='hidden' name='kategoria_id' value='$kategoria_id'>
            <li class='page-item'><button type='submit' class='page-link post_gombnak'>$i</button></li>
          </form>
        </ul>
      </nav>";
    }
    echo "
    <nav class='egysor'>
      <ul class='pagination'>
        <form action='?p=$lapok' method='POST'>
          <input type='hidden' name='kategoria_id' value='$kategoria_id'>
          <li class='page-item'><button type='submit' class='page-link post_gombnak'>&raquo;</button></li>
        </form>
      </ul>
    </nav>";

    return array($egyoldalon, $start);
  }
  /*public function page($p, $egyoldalon)
  {
    $start = ($p - 1) * $egyoldalon;

    $lapok = ceil(22 / 3);   //!

    for ($i = 1; $i <= $lapok; $i++) {
      echo "
      <nav class='egysor'>
        <ul class='pagination'>
          <li class='page-item'><a class='page-link' href='?p=$i'>$i</a></li>
        </ul>
      </nav>";
    }
    return array($egyoldalon, $start);
  }*/
  private function hiddenInput($name, $value)
  {
    echo "<input type='hidden' name='$name' value='$value'>";
  }
  //public function postButton($funkcio, $e1 = null, $e2 = null, $e3 = null)
  public function postButton($funkcio, $n1 = null, $v1 = null, $n2 = null, $v2 = null, $m = null)
  { //mint 'dropdown' és $_SERVER? külön <button> és <a href

    /* if($funkcio == 'dropdown' || ''){
       echo "<li>
         <form action={$_SERVER['PHP_SELF']} method='POST'>";
         $this->hiddenInput($e1, $e2);
         echo "<button type='submit' class='dropdown-item' id='{$e1}'>{$e3}</button>
         </form>
       </li>";
     }
 */
    switch ($funkcio) {
      case 'kat':
        echo "
        <form action='termekek.php' method='POST'>";
          $this->hiddenInput($n1, $v1);
        echo "<div class='text-center'><button type='submit' class='btn btn-info kozepre'>Tovább...</button>
          </form>";
        break;
      case 'kijel':
        echo "
        <li class='nav-item'>
          <form action={$_SERVER['PHP_SELF']} method='POST'>";
          $this->hiddenInput($n1, 1);
        echo "<button type='submit' class='nav-link post_gombnak'>Kijelentkezés</button>
          </form>
        </li>";
        break;

      case 'kosar':
        echo "
        <form action={$_SERVER['PHP_SELF']} method='POST'>";
          $this->hiddenInput($n1, $v1);
          $this->hiddenInput($n2, $v2);
          $this->hiddenInput('menny', 1);
        echo "<button type='submit' class='btn'><img class='kosar' src='shopping-cart.png'></button>
        </form>";
        break;
      case 'kosar2':
        echo "
        <form action='termek.php?id=$v2' method='POST'>";
          $this->hiddenInput($n1, $v1);
          $this->hiddenInput($n2, $v2);
        echo "<input type='number' name='menny' min='1' max='100' value='1'>
          <button type='submit' class='btn'><img class='kosar' src='shopping-cart.png'></button>
        </form>";
        break;

      case 'dropdown':
        echo "
        <li>
          <form action='termekek.php' method='POST'>";
          $this->hiddenInput($n1, $v1);
        echo "<button type='submit' class='dropdown-item' id='{$n1}'>{$m}</button>
          </form>
        </li>";
        break;

      case 'osszes_termek':
        echo "
        <li class='nav-item'>
          <form id='osszes_termek_form' action='termekek.php' method='POST'>";
            $this->hiddenInput('a', $funkcio);
        echo "<button type='submit' class='nav-link post_gombnak'>Összes termék</button>
          </form>
        </li>";
        break;

      /*$this->postButton('dropdown', 'fh_adatok', $fh['id'], 'Adatok');
      $this->postButton('dropdown', 'rendeles_elozmenyek', $fh['id'], 'Rendelési előzmények');
*/
      /*case 'kedvencek':
        echo "
        <form action={$_SERVER['PHP_SELF']} method='POST'>";
        $this->hiddenInput('kategoria_id', $e1);
        $this->hiddenInput('kedvencekhez_ad', $e2);
        echo "<button type='submit' class='btn'><img class='sziv' src='heart.png'></button>
        </form>";
        break;*/


    }
  }

  /*public function Lapozas($lapdb, $linkdb) //osztályfőnöktől
  {
    $sql = "SELECT COUNT(t.id) AS darab
            FROM termekek AS t";
    $sordb = $this->sqlAssoc($sql);
    $n = 0;
    foreach ($sordb as $sor) {
      $n = $sor['darab'];
    }

    if (!isset($_REQUEST['p']) || $_REQUEST['p'] == "")
      $lapszam = 1;
    else
      $lapszam = $_REQUEST['p'];

    // url-ből kiszedni a "p=" részt
    $url = $_SERVER['QUERY_STRING'];

    $del = array("p");
    for ($i = 0; $i < count($del); $i++)
      $url = $this->DeleteQueryString($url, $del[$i]);

    if ($url == "")
      $url = "index.php?p=";
    else
      $url = "index.php?" . $url . "&p=";

    $osszes_lap = $n / $lapdb;
    $osszes_lap = (integer) $osszes_lap;
    if ($n % $lapdb != 0)
      $osszes_lap++;

    $s = '<div class="lapoz_main">';

    // előző oldal
    if ($lapszam > 1)
      $s .= '<a class="lapoz" title="előző" href="' . $url . ($lapszam - 1) . '">&laquo;</a>';
    else
      $s .= '<span class="lapoz_szurke">&nbsp;&laquo;&nbsp;</span>';

    $s .= '<span class="lapoz_space">&nbsp;</span>';

    // oldalszámok kiíratása
    for ($i = ($lapszam - ($linkdb + 1)); $i < ($lapszam + $linkdb); $i++) {
      if (($i + 1) > 0) {
        if ($i == ($lapszam - 1)) {
          $s .= '<span class="lapoz_aktualis">&nbsp;' . $lapszam . '&nbsp;</span>';
        } elseif ($i < $osszes_lap) {
          $s .= '<span class="lapoz_keret">[</span><a class="lapoz" href="' . $url . ($i + 1) . '">' . ($i + 1) . '</a><span class="lapoz_keret">]</span><span class="lapoz_space"> </span>';
        }
      }
    }

    $s .= '<span class="lapoz_space">&nbsp;</span>';

    // következő oldal
    if ($lapszam < $osszes_lap)
      $s .= '<a class="lapoz" title="következő" href="' . $url . ($lapszam + 1) . '">&raquo;</a>';
    else
      $s .= '<span class="lapoz_szurke">&raquo;</span>';

    $s .= '</div>';
    return $s;
  }
*/


  /*   function Lapozas2($n, $lapdb)
     {
       if(!isset($_REQUEST['p']) || $_REQUEST['p']=="") $lapszam=1; else $lapszam=$_REQUEST['p'];
     
       // url-ből kiszedni a "p=" részt
       $url=$_SERVER['QUERY_STRING'];
     
       $del=array("p");
       for ($i=0; $i<count($del); $i++)
         $url=DeleteQueryString($url,$del[$i]);
     
       if ($url=="")
         $url="index.php";
       else
         $url="index.php?".$url;
     
        $osszes_lap=$n/$lapdb;
        $osszes_lap=(integer)$osszes_lap;
       if ($n % $lapdb != 0)
         $osszes_lap++;
       $s='<form method="get" m="index.php">'.UrlToHidden().'<select name="p" onchange="submit()">';
       
       // oldalszámok kiíratása
       for($i = 1; $i <= $osszes_lap; $i++)
       {
         if($i==$lapszam) 
           $sv='selected';
         else
           $sv='';
         
         $s.='<option value="'.$i.'" '.$sv.'>'.$i.'</option>';
       }
     
       $s.='</select></form>';
       return $s;
     }
  */

}
class DB
{
  protected $db;
  public function __construct()
  {
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $dbname = "pc-webshop";

    $s = "mysql:host=$host;dbname=$dbname;charset=utf8;port=3306";
    $db = new PDO($s, $user, $pwd);
    $this->db = $db;
  }
  public function sqlAssoc($sql) //FETCH_ASSOC
  {
    $stmt = $this->db->query($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function sqlQuery($sql)
  {
    $stmt = $this->db->prepare($sql); //nem lehet ->query() pl: 2x helyez kosárba 
    $stmt->execute();
    return $stmt;
  }
  public function sqlSelect($sql)
  {
    $stmt = $this->db->query($sql);
    $stmt->execute();
    return $stmt->fetch();
  }
}
class User extends DB
{
  public function registration()
  {
    if (isset($_POST['fnev']) && isset($_POST['email']) && isset($_POST['jelsz'])) {
      $fnev = $_POST['fnev'];
      $email = $_POST['email'];
      $j = $_POST['jelsz'];

      $jelszo = sha1($j);
      $sql = "INSERT INTO felhasznalok (nev,email,jelszo) VALUES ('$fnev', '$email', '$jelszo')";
      print_r($_POST);

      try {
        parent::sqlQuery($sql);
        print_r("Nagyon baba");
      } catch (Exception $e) {
        print_r("Nem sikerült");
        echo $e;
      }
    }
  }
  public function login()
  {
    if (isset($_POST['fnev']) && isset($_POST['jelsz'])) {
      $fnev = $_POST['fnev'];
      $j = $_POST['jelsz'];
      $jelszo = sha1($j);

      $sql = "SELECT * FROM felhasznalok WHERE nev = '$fnev' AND jelszo = '$jelszo'";
      $ell = parent::sqlAssoc($sql);

      //print_r($ell);
      if (count($ell) > 0) {
        header("Location: index.php");
      } else {
        print_r("Valami gond van csikánó");
      }
      foreach ($ell as $e) {
        $_SESSION['fid'] = $e['id'];
        $_SESSION['fnev'] = $fnev;
      }
    }
  }
}
/*class DB_Dict extends DB
{
  protected $tablaNev;
  public function __construct($tablaNev)
  {
    parent::__construct();
  }
}
class DB_Select extends DB
{
}*/


class Cart extends DB
{
  public function addToCart()
  {
    if (isset($_POST['kosarba_helyezes'])) {
      if (isset($_SESSION['fid'])) {

        $termek_id = $_POST['kosarba_helyezes'];
        $fh_id = $_SESSION['fid'];
        $menny = $_POST['menny'];

        $sql = "INSERT INTO kosar(termek_id, fh_id, mennyiseg) VALUES ($termek_id, $fh_id, $menny)";
        parent::sqlQuery($sql);
      } else {
        echo "<script>alert('Bejelentkezés szükséges a kosárba helyezéshez!');</script>";
      }
    }

  }
  public function displayCartInTable()
  {
    echo "<table class='table table-hover table-bordered border-info table-responsive kosar_tablazat'>
    <tr>
        <th>
        </th>
        <th>
            Termék neve
        </th>
        <th>
            Ár
        </th>
        <th>
            Mennyiség
        </th>
        <th>
            Műveletek
        </th>
    </tr>";
    $sql = "SELECT k.id, k.termek_id, CONCAT(m.megnevezes,' ', t.megn) AS nev, k.mennyiseg, t.ar
      FROM kosar AS k
      JOIN termekek AS t
      ON t.id = k.termek_id
      JOIN markak AS m
      ON m.id=t.marka_id
      WHERE k.fh_id = {$_SESSION['fid']}";

    $termekek = parent::sqlAssoc($sql);
    //print_r($termekek);

    if (empty($termekek)) {
      echo "<h1>A kosár üres</h1>";
    } else {
      $sorszam = 0;
      foreach ($termekek as $termek) {
        $sorszam++;
        $ar = $termek['ar'] * $termek['mennyiseg'];
        echo "
      <tr>
        <td>{$sorszam}</td>
        <td>{$termek['nev']}</td>
        <td class='w-25'>";
        echo number_format($ar, 0, '', ' ');
        echo " Ft</td>
        <td class='w-25'><button class='csokk' value='{$termek['id']}'>-</button>
         {$termek['mennyiseg']} db 
        <button class='nov' value='{$termek['id']}'>+</button></td>
        <td><button class='torol' value='{$termek['id']}'>Töröl</button></td>
      </tr>";
      }
      echo "
    </table>
    ";
    }

  }
}
