<?php
include("config.php");
//Hago el query con el select
$query = "SELECT * FROM tb_area WHERE estado = 1";
$result = mysqli_query($mysqli, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
    <title>Areas</title>
</head>

<body>
    <!-- Creamos un menu     -->
    <div class="icon-bar">
        <a href="registro.php"><i class="fa fa-registered"></i></a>
        <a href="home_use.html"><i class="fa fa-home"></i></a>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <h2>Areas</h2>
    <hr>
    <div class="container">
        <!-- Creo la tabla para presentar las areas de la base de datos -->
        <?php
        echo "<table border='1'>
        <tr>
            <th>Codigo</th>
		    <th>Descripcion</th>    
		    <th>Actualizar</th>
		    <th>Eliminar</th>
        </tr>";
        while ($row = mysqli_fetch_array($result)) {
            //Recorro cada uno del array y lo voy presentando
            echo "<tr>";
            echo "<td>" . $row['id_area'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td><a href='editar.php?id=" . $row['id_area'] . "'><img src='./images/icons8-Edit-32.png' alt='Edit'></a></td>";
            echo "<td><a href='eliminar.php?id=" . $row['id_area'] . "'><img src='./images/icons8-Trash-32.png' alt='Delete'></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        //Fin de la tabla
        ?>
</body>

</html>