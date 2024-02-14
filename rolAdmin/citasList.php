<?php 

include("config.php");
//Hago el query con el select
$sql = "SELECT rc.*, p.nombre AS nombre_propietario, m.nombre AS nombre_mascota, md.nombre AS nombre_medico
        FROM tb_reserva_cita rc
        JOIN tb_propietario p ON rc.id_propietario = p.id_propietario
        JOIN tb_mascota m ON rc.id_mascota = m.id_mascota
        JOIN tb_medicos md ON rc.id_medico = md.id_medico WHERE rc.estado = 1 ";
         
$result = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/menulat.css" />
    <title>Document</title>
</head>
<body>
<div class="icon-bar">
    <div class="logo"> Logo</div>
    <div class="hamburguer">
<div class="line"></div>
<div class="line"></div>
<div class="line"></div>
</div>
<nav class="nav-bar">
<ul>
<li>
<a href="../rolAdmin/home.php" class="">Home</a>
</li>
<li>
<a href="../rolAdmin/registro.php" class="">Registros Hospital</a>
</li>
<li>
<a href="../rolAdmin/areas.php" class="active">Listado de Registros</a>
</li>
<li>
<a href="../rolAdmin/registroMascota.php" class="">Registro de Clientes</a>

</li>
<li>
<a href="../rolAdmin/inventario.php" class="">Inventario</a>
</li>
<li>
<a href="" class="">Salir</a>
</li>

</ul>
    </div>
    <button id="openSidenavButton">Abrir Menú</button>
    <div id="sidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul>
        <li><a href="areas.php">Lista de Areas</a></li>
            <li><a href="../rolAdmin/medicosList.php">Lista de Medicos</a></li>
            <li><a href="../rolAdmin/usuariosList.php">Lista de Usuarios</a></li>
            <li><a href="../rolAdmin/propietarios.php">Lista de Popietarios</a></li>
            <li><a href="../rolAdmin/serviciosList.php">Lista de Servicios</a></li>
            <li><a href="../rolAdmin/citasList.php">Lista de Citas</a></li>
     
        </ul>
    </div>
    <script src="../js/scripts.js"></script>
</ul>
    <h2>Servicios</h2>
    <hr>
    <div class="container">

    
        <!-- Creo la tabla para presentar las areas de la base de datos -->

 <?php
       echo "<table border='1' id='tab'>
       <tr>
            <th>Codigo</th>
            <th>Fecha</th>
            <th>Propietario</th>
            <th>Mascota</th>
            <th>Médico</th>
            <th>Actualizar</th>
		    <th>Eliminar</th>
        </tr>";
        while ($row = mysqli_fetch_array($result)) {
            //Recorro cada uno del array y lo voy presentando
            echo "<tr>";
            echo "<td>" . $row["id_cita"].  "</td>";
            echo "<td>" . $row["fecha"]."</td>";
            echo "<td>" . $row["nombre_propietario"]."</td>";
            echo "<td>" . $row["nombre_mascota"]. "</td>";
            echo "<td>" . $row["nombre_medico"]. "</td>";
            echo "<td><a href='ActualizarCitas.php?id=" . $row['id_cita'] . "'><img src='../images/icons8-Edit-32.png' alt='Edit'></a></td>";
            echo "<td><a href='EliminarCitas.php?id=" . $row['id_cita'] . "'><img src='../images/icons8-Trash-32.png' alt='Delete'></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        //Fin de la tabla
        ?> 

</body>
</html>