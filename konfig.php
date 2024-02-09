<?php
session_start();
require_once "adatbazis.php";
$db = kapcs();
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfigurációk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>
<style>
    table, td, th{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<body>
    <div class="mindenseg">
        <div class="blue-bg">
        <?php require_once "navbar.php"; ?>

        </div>
    </div>
    <div class="white-bg shadow">
    </div>

        <div class="content w3-main" style="margin-left:20%">
            <h1>Konfigurációk</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="margin-bottom: 0px;">Bencs</h5>
                    <table style="">
                        <tr>
                            <td>Alaplap:</td>
                            <td>Valami valami 12345</td>
                        </tr>
                        <tr>
                            <td>CPU:</td>
                            <td>alami valami 12345</td>
                        </tr>
                    </table>
                    <img src="like.png" alt="" style="display: block; float: inline-start;">
                    <img src="dislike.png" alt="" style="display: block; float: inline-end;">
                </div>
            </div>
        </div>

</body>

</html>