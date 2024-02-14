<!DOCTYPE html>
<html>
<head>
    <title>Crear Cita</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
</head>
<body>
    <div class="icon-bar">
        <a href="crear_cita.html"><i class="fa fa-plus"></i></a>
        <a href="home_use.html"><i class="fa fa-home"></i></a>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <h2>Crear Cita</h2>
    <hr>
    <div class="container">
        <form action="crear_cita.php" method="post">
            <label for="fecha">Fecha de la cita:</label><br>
            <input type="date" id="fecha" name="fecha"><br>
            <label for="hora">Hora:</label><br>
            <input type="time" id="hora" name="hora"><br>
            <label for="nombre_mascota">Nombre de la Mascota:</label><br>
            <input type="text" id="nombre_mascota" name="nombre_mascota"><br>
            <label for="especie_mascota">Especie de la Mascota:</label><br>
            <input type="text" id="especie_mascota" name="especie_mascota"><br>
            <label for="sexo_mascota">Sexo de la Mascota (1 para Macho, 0 para Hembra):</label><br>
            <input type="number" id="sexo_mascota" name="sexo_mascota" min="0" max="1"><br>
            <label for="nacimiento_mascota">Fecha de Nacimiento de la Mascota:</label><br>
           <input type="date" id="nacimiento_mascota" name="nacimiento_mascota"><br>
           <label for="edad_mascota">Edad de la Mascota:</label><br>
        <input type="number" id="edad_mascota" name="edad_mascota" min="0" required><br>

            <label for="nombre_medico">Nombre del Medico:</label><br>
            <select id="nombre_medico" name="nombre_medico">
            <?php
            include("config.php");
            $medicos = mysqli_query($mysqli, "SELECT nombre FROM tb_medico");
            while ($medico = mysqli_fetch_array($medicos)) {
                echo "<option value='" . $medico['nombre'] . "'>" . $medico['nombre'] . "</option>";
            }
            ?>
            </select><br>
            <label for="nombre_propietario">Nombre del Propietario:</label><br>
            <input type="text" id="nombre_propietario" name="nombre_propietario"><br>
            <label for="cedula_propietario">Cédula del Propietario:</label><br>
            <input type="text" id="cedula_propietario" name="cedula_propietario"><br>
            <label for="apellido_propietario">Apellido del Propietario:</label><br>
            <input type="text" id="apellido_propietario" name="apellido_propietario"><br>
            <label for="telefono_propietario">Teléfono del Propietario:</label><br>
            <input type="text" id="telefono_propietario" name="telefono_propietario"><br>
            <label for="direccion_propietario">Dirección del Propietario:</label><br>
            <input type="text" id="direccion_propietario" name="direccion_propietario"><br>
            <label for="correo_propietario">Correo del Propietario:</label><br>
            <input type="email" id="correo_propietario" name="correo_propietario"><br>
            <label for="observaciones">Observaciones:</label><br>
            <input type="text" id="observaciones" name="observaciones"><br>
            <input type="submit" name="submit" value="Crear Cita">
        </form>
    </div>
</body>
</html>

