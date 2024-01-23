<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alaplap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    require_once "adatbazis.php";

    $termek_id = 3;
    $limit = 2;
    $aktualisOldal = isset($_GET['oldal']) ? (int) $_GET['oldal'] : 1;

    $eltolas = ($aktualisOldal - 1) * $limit;

    $sql = "SELECT * FROM termekek INNER JOIN markak ON markak.id = termekek.marka_id WHERE markak.id = $termek_id LIMIT :eltolas, :limit";

    $db = kapcs();
    $stm = $db->prepare($sql);
    $stm->bindParam(':eltolas', $eltolas, PDO::PARAM_INT);
    $stm->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stm->execute();

    echo "<div class='row'>
          <form method='post' action='.php'>";
    //print_r($stm->fetchAll(PDO::FETCH_ASSOC));
    foreach ($stm as $sor) {
        echo "
            <div class='col-md-3'>
            <div class='card mb-4 h-100 shadow-sm'>
                <img
                  src='https://www.freepnglogos.com/uploads/notebook-png/download-laptop-notebook-png-image-png-image-pngimg-2.png'
                  class='card-img-top' alt='...' />
                <div class='card-body'>
                  <div class='clearfix mb-3'>
                    <span class='float-start badge rounded-pill bg-primary'>{$sor['megnevezes']}</span>
                    <span class='float-start badge rounded-pill bg-primary'>{$sor['megn']}</span>
                    <span class='float-end'>{$sor['ar']} Ft</span>
                  </div>
                  <h5 class='card-title'>
                    Lorem, ipsum dolor sit amet 
                  </h5>
    
                  <div class='text-center my-4'>
                    <a href='#' class='btn btn-info'>Vásárlás</a>
                  </div>
                  <div class='sor'>
                    <div class='text-center'>
                      <a href='#' class='btn'><img class='kosar' src='shopping-cart.png'></a>
                    </div>
                    <div class='text-center'>
                      <a href='#' class='btn'><img class='sziv' src='heart.png'></a>
                    </div>
                  
                </div>
              </div>
            </div>
    ";
    echo"</form>
         </div>";

        /*
        echo "
    <div class='egysor'>
        <div class='elem'>
            <p>id:{$sor['0']}</p>
            <h2><b>{$sor['megnevezes']}</b> {$sor['megn']}</h2>
            <p>{$sor['ar']} Ft</p>
        </div>
    </div>";*/
    }

    echo "<br>";
    $lapok = ceil($db->query("SELECT COUNT(*) FROM termekek WHERE id = $termek_id")->fetchColumn() / $limit);
    for ($i = 1; $i <= $lapok; $i++) {
        echo "<a href='?oldal=$i'>$i</a> ";
    }
    ?>
</body>

</html>