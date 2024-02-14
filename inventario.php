<?php
include("config.php");

$query = "SELECT * FROM tb_inventario WHERE estado = 1";
$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Inventario</title>
</head>
<body>
    <div class="icon-bar">
        
        <a href="home_use.html"><i class="fa fa-home"></i></a>
    </div>
    <h2>Inventario</h2>
    <hr>
    <div class="container">
        <?php
        echo "<table border='1'>
        <tr>
            <th>ID del Producto</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Costo</th>
        </tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_producto'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>" . $row['cantidad'] . "</td>";
            echo "<td>" . $row['costo'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>
