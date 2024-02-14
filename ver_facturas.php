<?php
include("config.php");

$query = "SELECT tb_facturas.id_factura, tb_citas.fecha AS fecha_cita, tb_urgencias.descripcion AS descripcion_urgencia, tb_tratamientos.nombre AS nombre_tratamiento, tb_facturas.cantidad, tb_facturas.total 
          FROM tb_facturas 
          LEFT JOIN tb_citas ON tb_facturas.id_cita = tb_citas.id_cita
          LEFT JOIN tb_urgencias ON tb_facturas.id_urgencia = tb_urgencias.id_urgencia
          LEFT JOIN tb_tratamientos ON tb_facturas.id_tratamiento = tb_tratamientos.id_tratamiento
          WHERE tb_facturas.estado = 1";
$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Facturas</title>
</head>
<body>
    <div class="icon-bar">
        
        <a href="home_use.html"><i class="fa fa-home"></i></a>
    </div>
    <h2>Facturas</h2>
    <hr>
    <div class="container">
        <?php
        echo "<table border='1'>
        <tr>
            <th>ID de la Factura</th>
            <th>Fecha de la Cita</th>
            <th>Descripción de la Urgencia</th>
            <th>Nombre del Tratamiento</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Eliminar</th>
        </tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_factura'] . "</td>";
            echo "<td>" . $row['fecha_cita'] . "</td>";
            echo "<td>" . $row['descripcion_urgencia'] . "</td>";
            echo "<td>" . $row['nombre_tratamiento'] . "</td>";
            echo "<td>" . $row['cantidad'] . "</td>";
            echo "<td>" . $row['total'] . "</td>";
            echo "<td><a href='eliminar_factura.php?id=" . $row['id_factura'] . "'><img src='./images/icons8-Trash-32.png' alt='Delete'></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>
