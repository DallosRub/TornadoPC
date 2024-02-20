<?php
class Webshop
{
  protected $db;
  public function __construct()
  {
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $dbname = "pc-webshop";

    $s = "mysql:host=$host;dbname=$dbname;charset=utf8;port=3306";
    $this->db = new PDO($s, $user, $pwd);
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

  public function navbarDropdownAssoc($kat_id){
      $sql = "SELECT * FROM termek_kategoriak
              WHERE kat_id = $kat_id";
      $kategoriak = $this->sqlAssoc($sql);
      return $kategoriak;
  }
  public function dropdownInsert($cime, $kat_id = null)
  {
   if ($kat_id != null) {
      $kategoriak=$this->navbarDropdownAssoc($kat_id);
    } 
    /*else { //navbar fh adatait
      $sql = "SELECT * FROM felhasznalok
              WHERE id = {$_SESSION['fh_id']}";
    }*/
    //$kategoriak = $this->sqlAssoc($sql);
    
    echo "<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'
                aria-expanded='false'>
                $cime
              </a>
              <ul class='dropdown-menu'>";

    foreach ($kategoriak as $kategoria) {
      $this->postButton('dropdown', $kategoria['id'], $kategoria['megnevezes']);
    }
    echo "</ul></li>";
  }


  public function navbarInsert()
  {
    $fn = "";
    if (isset($_SESSION['fnev'])) {
      $fn = $_SESSION['fnev'];
    }
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
    $this->dropdownInsert("Perifériák", 1);
    $this->dropdownInsert("PC Alkatrészek", 2);
    $this->dropdownInsert("Egyéb", 3);

    $this->postButton('osszes_termek');
    echo "
                  </ul>
                  <div class='collapse navbar-collapse'>
                      <ul class='navbar-nav ms-auto'>
                          <li class='nav-item'>
                              <a class='nav-link' href='konfig.php'>Konfigurációk</a>  
                          </li>      
                          <li class='nav-item'>
                              <a class='nav-link' href='konfig_ossze.php'>Konfiguráció összerakó</a>  
                          </li>
                          <li class='nav-item'>
                              <a class='nav-link' href='kosar.php'>Kosár</a>
                          </li>                          
                          <li class='nav-item'>
                              <a class='nav-link' href='login.php'>Bejelentkezés</a>
                          </li>
                          <li class='nav-item'>
                               <a class='nav-link' href='index.php'>$fn</a>  
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>";
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
  public function accordionInsert($cime, $kat_id = null)
  {
    $sqlKategoriak = "SELECT * FROM termek_kategoriak
                      WHERE kat_id = $kat_id";

    $kategoriak = $this->sqlAssoc($sqlKategoriak);

    echo "
<div class='accordion-item'>
  <h2 class='accordion-header'>";
      if($kat_id==1){
        $collapse_id = "collapseOne";
        $aria_expanded=true;
        $show="show";
      }
      elseif($kat_id==2){
        $collapse_id = "collapseTwo";
        $aria_expanded=false;
      }
      elseif($kat_id==3){
        $collapse_id = "collapseThree";
        $aria_expanded=false;
      }
      echo"
      <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#$collapse_id' aria-expanded='$aria_expanded' aria-controls='$collapse_id'>
        $cime
      </button>
  </h2>
  <div id='$collapse_id' class='accordion-collapse collapse "; if (isset($show)) echo"$show"; echo"' data-bs-parent='#accordionExample'>
    <div class='accordion-body'>";

          if (!isset($_POST['kategoria_id'])) {
            echo "<div class='row'>";
            foreach ($kategoriak as $kategoria) {
              echo "
      <div class='col-4 col-md-4'>
        <div class='card mb-4 h-100 shadow-sm border border-info'>
          <img src='https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png' class='card-img-top' alt='...' />
            <div class='card-body'>
              <div class='clearfix mb-3'>
                  <span class='kat'>{$kategoria['megnevezes']}</span>
              </div>";
              $this->postButton('kat', $kategoria['id']);
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
    if (isset($_POST['kategoria_id'])){
      return $_POST['kategoria_id'];
    }
  }
  public function categoriesInsert()
  {
    echo "
    <div class='accordion' id='accordionExample'>";

    $vissza = $this->accordionInsert('Perifériák',1);
    $vissza = $this->accordionInsert('PC Alkatrészek',2);
    $vissza = $this->accordionInsert('Egyéb',3);
    
    echo "</div>";
    
  //kell-e igy??? vagy ugy mint AddToCart()
      return $vissza;
    
  }
  public function productsInsert($p, $kategoria_id = null)
  {
    // if (isset($_POST['kategoria'])) {
    // $kategoria_id = $_POST['kategoria_id'];
    $lapozas = $this->page($p, 3);

    $egyoldalon = (int) $lapozas[0];
    $start = (int) $lapozas[1];

    if ($kategoria_id == null) {
      $sql = "SELECT t.id, m.megnevezes, t.megn, t.ar
              FROM termekek AS t
              INNER JOIN markak AS m ON m.id=t.marka_id
              LIMIT $start, $egyoldalon";
    } else {
      $sql = "SELECT t.id, m.megnevezes, t.megn, t.ar
              FROM termekek AS t
              INNER JOIN markak AS m ON m.id=t.marka_id
              WHERE t.kategoria_id=$kategoria_id
              ORDER BY 2,3
              LIMIT $start, $egyoldalon";
    }
    $termekek = $this->sqlAssoc($sql);

    echo '<div class="row">';
    foreach ($termekek as $termek) {
      echo "
        <div class='col-lg-4'>
            <div class='card mb-4 h-100 shadow-sm border border-info'>
                <img src='https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png' class='card-img-top' alt='...' />
                <div class='card-body'>
                    <div class='clearfix mb-3'>
                        <span class='float-start marka border border-info'>{$termek['megnevezes']}</span>
                        <span class='float-end ar'>";echo number_format($termek['ar'], 0,'',' ');echo" Ft</span>
                    </div>
                    <h3 class='card-title'>{$termek['megn']}</h3>
                    <div class='text-center my-4'>
                        <a href='termek.php?id={$termek['id']}' class='btn btn-info'>Vásárlás</a>
                    </div>
                    <div class='sor'>
                       ";  // stretched-link
      $this->postButton('kosar', $kategoria_id, $termek['id']);
      $this->postButton('kedvencek', $kategoria_id, $termek['id']);
      echo "
                    </div>
                </div>
            </div>
        </div>
    ";
    }
    echo '</div>';
  }
  public function productInsert($id){
    $sql = "SELECT t.id, m.megnevezes, t.megn, t.ar
              FROM termekek AS t
              INNER JOIN markak AS m ON m.id=t.marka_id
              WHERE t.id=$id";

    $termekek = $this->sqlAssoc($sql);
    //print_r($termekek);

    echo '<div class="row">';
    foreach ($termekek as $termek) {
    echo"
    <div>
      <h1>{$termek['megnevezes']} {$termek['megn']}</h1>
      <img src='https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png' class='card-img-top'>
      <p>{$termek['ar']} Ft</p>
     "; 
     $this->postButton('kosar', $_SESSION['katId'], $_SESSION['termekId']);
    echo"</div>";
    
    }
  }

  public function addToCart()
  {
    // Kosar id termek_id fh_id ar mennyiseg	
    if (isset($_POST['kosarba_helyezes'])) {
      $termek_id = $_POST['kosarba_helyezes'];

      $sql = "SELECT * FROM termekek WHERE id = $termek_id";
      $termekek = $this->sqlAssoc($sql);

      foreach ($termekek as $t) {

        $sql = "INSERT INTO tetelek(termek_id, fh_id, ar, mennyiseg) VALUES ($termek_id, 1, {$t['ar']}, 1)";
        $this->sqlQuery($sql);
      }
    }
  }
  public function displayCartInTable()
  {
    echo "<table class='table table-hover table-bordered border-info table-responsive'>
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
            </tr>";

    $sql = 'SELECT * FROM tetelek';
    $kosar = $this->sqlAssoc($sql);

    foreach ($kosar as $elem) {
      $sql = "SELECT t.id, CONCAT(m.megnevezes,' ', t.megn) AS nev 
                        FROM termekek AS t
                        INNER JOIN markak AS m ON m.id=t.marka_id
                        WHERE t.id = {$elem['termek_id']}
                        ORDER BY 2";

      $termekek = $this->sqlAssoc($sql);

      foreach ($termekek as $termek) {
        echo "<tr>
                            <td>{$elem['id']}</td>
                            <td>{$termek['nev']}</td>
                            <td>{$elem['ar']} Ft</td>
                            <td>{$elem['mennyiseg']} db</td>
                          </tr>";
      }
    }
    echo "</table>";

  }
  public function page($p, $egyoldalon)
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
  }
  private function hiddenInput($name, $value)
  {
    echo "<input type='hidden' name='$name' value='{$value}'>";
  }
  public function postButton($funkcio, $e1 = null, $e2 = null)
  {
    switch ($funkcio) {
      case 'kosar':
        echo "
          <form action={$_SERVER['REQUEST_URI']} method='POST'>";
        $this->hiddenInput('kategoria_id', $e1);
        $this->hiddenInput('kosarba_helyezes', $e2);
        echo "<button type='submit' class='btn'><img class='kosar' src='shopping-cart.png'></button>
          </form>";

         // $_SESSION['kosarba_helyezes'] = $_POST['kosarba_helyezes'];
        break;
      case 'kedvencek':
        echo "
        <form action={$_SERVER['PHP_SELF']} method='POST'>";
        $this->hiddenInput('kategoria_id', $e1);
        $this->hiddenInput('kedvencekhez_ad', $e2);
        echo "<button type='submit' class='btn'><img class='sziv' src='heart.png'></button>
        </form>";
        break;
      case 'dropdown':
        echo "<li>
        <form action={$_SERVER['PHP_SELF']} method='POST'>";
        $this->hiddenInput('kategoria_id', $e1);
        echo "<button type='submit' class='dropdown-item'>{$e2}</button>
        </form>
      </li>";
        break;

      case 'osszes_termek':
        echo "<li class='nav-item'>
        <form action={$_SERVER['PHP_SELF']} method='POST'>";
        $this->hiddenInput('a', $funkcio);
        echo "<button type='submit' class='nav-link' style='background: none; border: none;'>Összes termék</button>
        </form>
      </li>";
        break;

      case 'kat':
        echo "<form action={$_SERVER['PHP_SELF']} method='POST'>";
        $this->hiddenInput('kategoria_id', $e1);
        echo "<div class='text-center'><button type='submit' class='btn btn-info kozepre'>Tovább...</button>
        </form></div>";
        break;
      /*default:
    # code...
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
class DB{
  protected $db;
  public function __construct()
  {
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $dbname = "pc-webshop";

    $s = "mysql:host=$host;dbname=$dbname;charset=utf8;port=3306";
    $this->db = new PDO($s, $user, $pwd);
  }
}
class DB_Dict extends DB{
  protected $tablaNev;
  public function __construct($tablaNev)
  {
    parent::__construct();
  }
}
class DB_Select extends DB{
  protected $db;
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

}
class Kosar extends Webshop
{

}
