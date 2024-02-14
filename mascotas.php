<?php
include("config.php");
$result = mysqli_query($mysqli, "SELECT tb_mascota.id_mascota, tb_mascota.nombre, tb_mascota.especie, tb_mascota.sexo, tb_mascota.nacimiento, tb_mascota.edad, tb_propietario.nombre AS nombre_propietario FROM tb_mascota INNER JOIN tb_propietario ON tb_mascota.id_propietario = tb_propietario.id_propietario where tb_mascota.estado =1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Mascotas</title>
</head>
<body>
    <div class="icon-bar">
        <a href="home_use.html"><i class="fa fa-home"></i></a>
    </div>
    <h2>Mascotas</h2>
    <hr>
    <div class="container">
        <?php
        echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Especie</th>
            <th>Sexo</th>
            <th>Nacimiento</th>
            <th>Edad</th>
            <th>Propietario</th>
        </tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_mascota'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['especie'] . "</td>";
            echo "<td>" . ($row['sexo'] == 1 ? 'Macho' : 'Hembra') . "</td>";
            echo "<td>" . $row['nacimiento'] . "</td>";
            echo "<td>" . $row['edad'] . "</td>";
            echo "<td>" . $row['nombre_propietario'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>
