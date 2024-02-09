<nav class="navbar navbar-expand-sm bg-body fixed">
  <div class="container">
    <a class="navbar-brand" href="index.php">TornadoPC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <?php
        require_once "adatbazis.php";
        $db = kapcs();

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
        echo '</li></ul>';
        ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Összes termék</a>
        </li>
      </ul>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">

          <li class="nav-item">
            <a class="nav-link" href="kosar.php">Kosár</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="login.php">Bejelentkezés</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php"><?=$_SESSION['fnev']?></a>
          </li>
        </ul>
      </div>


    </div>
  </div>
</nav>