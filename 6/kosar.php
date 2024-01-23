<?php
session_start();
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
    if (!empty($_SESSION['kosar'])) {
        echo "<table border='1'>
            <tr>
                <th>Termék neve</th>
                <th>Ár</th>
            </tr>";

        foreach ($_SESSION['kosar'] as $item) {
            echo "<tr>
                    <td>{$item['name']}</td>
                    <td>{$item['price']} Ft</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>A kosár üres.</p>";
    }
    ?>

</body>

</html>
