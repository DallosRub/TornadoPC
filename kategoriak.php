<?php
require_once "adatbazis.php";

if (isset($kivKat)) {
    $kivKat = $_GET['kategoria'];
    $sql = "SELECT * FROM termekek WHERE kategoria_id='$kivKat'";
    //echo $kivKat;
    
    $db = kapcs();
    $stm = $db->prepare($sql);
    $stm->execute();

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
    }
}




?>