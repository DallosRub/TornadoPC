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
    <title>Kosár</title>
</head>

<body>

    <h1>Kosár tartalma</h1>

    <?php
    $sql = 'SELECT * FROM tetelek';
    $stmt = $db->query($sql);
    $kosar = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($kosar);


    echo "<table border='1'>";
    foreach ($kosar as $elem) {
    $sql_t = "SELECT * FROM termekek WHERE id = {$elem['$termek_id']}";
    $stmt_t = $db->prepare($sql_t);
    $stmt_t->execute();
    $termekek = $stmt_t->fetchAll(PDO::FETCH_ASSOC);

        foreach ($termekek as $termek){
        echo "<tr>
                <td>{$elem['id']}</td>
                <td>{$termek['megn']}</td>
                <td>{$elem['ar']} Ft</td>
            </tr>";
      }
    }
    echo "</table>";
    ?>

</body>

</html>
