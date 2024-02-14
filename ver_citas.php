<?php
include("config.php");

$query = "SELECT tb_citas.id_cita, tb_citas.fecha, tb_citas.hora, tb_mascota.nombre AS nombre_mascota, tb_medico.nombre AS nombre_medico, tb_propietario.nombre AS nombre_propietario, tb_citas.observaciones 
FROM tb_citas 
JOIN tb_mascota ON tb_citas.id_mascota = tb_mascota.id_mascota 
JOIN tb_medico ON tb_citas.id_medico = tb_medico.id_medico 
JOIN tb_propietario ON tb_citas.id_propietario = tb_propietario.id_propietario where tb_citas.estado = 1";
$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
    
    <title>Citas</title>
</head>

<body>
    <div class="icon-bar">
        <a href="crear_citaa.php"><i class="fa fa-plus"></i></a>
        <a href="home_use.html"><i class="fa fa-home"></i></a>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <h2>Citas</h2>
    <hr>
    <div class="container">
        <?php
        echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Mascota</th>
            <th>Médico</th>
            <th>Propietario</th>
            <th>Observaciones</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_cita'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "<td>" . $row['hora'] . "</td>";
            echo "<td>" . $row['nombre_mascota'] . "</td>";
            echo "<td>" . $row['nombre_medico'] . "</td>";
            echo "<td>" . $row['nombre_propietario'] . "</td>";
            echo "<td>" . $row['observaciones'] . "</td>";
            echo "<td><a href='editarr_cita.php?id=" . $row['id_cita'] . "'><img src='./images/icons8-Edit-32.png' alt='Edit'></a></td>";
            echo "<td><a href='eliminar_cita.php?id=" . $row['id_cita'] . "'><img src='./images/icons8-Trash-32.png' alt='Delete'></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <div class="hola">
            <a href="fpdf\PruebaV.php" target="_blank" class="btn btn-success"> Generar reporte</a>
        </div>
    </div>
</body>

</html>
