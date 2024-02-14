<!DOCTYPE html>
<html>
<head>
    <title>Editar Cita</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
</head>
<body>
    <div class="icon-bar">
        <a href="crear_cita.html"><i class="fa fa-plus"></i></a>
        <a href="home_use.html"><i class="fa fa-home"></i></a>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <h2>Editar Cita</h2>
    <hr>
    <div class="container">
        <?php
        include("config.php");

        if(isset($_GET['id'])) {
            $id_cita = $_GET['id'];

            // Obtén los datos actuales de la cita
            $query = "SELECT tb_citas.fecha, tb_citas.hora, tb_mascota.nombre AS nombre_mascota, tb_medico.nombre AS nombre_medico, tb_propietario.nombre AS nombre_propietario, tb_citas.observaciones 
            FROM tb_citas 
            JOIN tb_mascota ON tb_citas.id_mascota = tb_mascota.id_mascota 
            JOIN tb_medico ON tb_citas.id_medico = tb_medico.id_medico 
            JOIN tb_propietario ON tb_citas.id_propietario = tb_propietario.id_propietario 
            WHERE tb_citas.id_cita=$id_cita";
            $result = mysqli_query($mysqli, $query);
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <form action="editar_cita.php" method="post">
            <input type="hidden" id="id_cita" name="id_cita" value="<?php echo $id_cita; ?>">
            <label for="fecha">Fecha:</label><br>
            <input type="date" id="fecha" name="fecha" value="<?php echo $row['fecha']; ?>"><br>
            <label for="hora">Hora:</label><br>
            <input type="time" id="hora" name="hora" value="<?php echo $row['hora']; ?>"><br>
            <label for="nombre_mascota">Nombre de la Mascota:</label><br>
            <input type="text" id="nombre_mascota" name="nombre_mascota" value="<?php echo $row['nombre_mascota']; ?>"><br>
            <label for="nombre_medico">Nombre del Médico:</label><br>
            <input type="text" id="nombre_medico" name="nombre_medico" value="<?php echo $row['nombre_medico']; ?>"><br>
            <label for="nombre_propietario">Nombre del Propietario:</label><br>
            <input type="text" id="nombre_propietario" name="nombre_propietario" value="<?php echo $row['nombre_propietario']; ?>"><br>
            <label for="observaciones">Observaciones:</label><br>
            <input type="text" id="observaciones" name="observaciones" value="<?php echo $row['observaciones']; ?>"><br>
            <input type="submit" name="update" value="Actualizar Cita">
        </form>
    </div>
</body>
</html>
