<?php
include("config.php");
$result = mysqli_query($mysqli, "CALL sp_getPropietarios()");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Propietarios</title>
</head>
<body>
    <div class="icon-bar">
        <a href="home_use.html"><i class="fa fa-home"></i></a>
    </div>
    <h2>Propietarios</h2>
    <hr>
    <div class="container">
        <?php
        echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cédula</th>
           
        </tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_propietario'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['cedula'] . "</td>";
           
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>
