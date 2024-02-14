<?php
include("config.php");

$query = "SELECT tb_urgencias.*, tb_mascota.nombre AS nombre_mascota, tb_medico.nombre AS nombre_medico, tb_propietario.nombre AS nombre_propietario 
          FROM tb_urgencias 
          JOIN tb_mascota ON tb_urgencias.id_mascota = tb_mascota.id_mascota 
          JOIN tb_medico ON tb_urgencias.id_medico = tb_medico.id_medico 
          JOIN tb_propietario ON tb_urgencias.id_propietario = tb_propietario.id_propietario 
          WHERE tb_urgencias.estado = 1";
$result = mysqli_query($mysqli, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Urgencias</title>
</head>
<body>
    <div class="icon-bar">
        <a href="home_use.html"><i class="fa fa-home"></i></a>
        <a href="crear_urgencia.php"><i class="fa fa-plus"></i></a> 
    </div>
    <h2>Urgencias</h2>
    <hr>
    <div class="container">
        <?php
        echo "<table border='1'>
        <tr>
            <th>ID de la Urgencia</th>
            <th>Fecha y Hora</th>
            <th>Nombre de la Mascota</th>
            <th>Nombre del Médico</th>
            <th>Nombre del Propietario</th>
            <th>Descripción</th>
            
        </tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_urgencia'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "<td>" . $row['nombre_mascota'] . "</td>";
            echo "<td>" . $row['nombre_medico'] . "</td>";
            echo "<td>" . $row['nombre_propietario'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
           
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>
