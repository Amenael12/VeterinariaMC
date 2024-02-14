<?php
include("config.php");

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos enviados desde el formulario
    $fecha = $_POST['fecha'];
    $id_propietario = $_POST['id_propietario'];
    $id_mascota = $_POST['id_mascota'];
    $id_medico = $_POST['id_medico'];

    // Insertar la nueva reserva de cita en la base de datos
    $sql = "INSERT INTO tb_reserva_cita (fecha, id_propietario, id_mascota, id_medico, estado) VALUES ('$fecha', '$id_propietario', '$id_mascota', '$id_medico',   1)";

    $result = mysqli_query($mysqli, $sql);
}

// Consultas para obtener los nombres de las tablas
$query_propietario = "SELECT id_propietario, nombre FROM tb_propietario";
$result_propietario = $mysqli->query($query_propietario);

$query_mascota = "SELECT id_mascota, nombre FROM tb_mascota";
$result_mascota = $mysqli->query($query_mascota);

$query_medico = "SELECT id_medico, nombre FROM tb_medicos";
$result_medico = $mysqli->query($query_medico);

// Pasar los resultados a variables para usar en el HTML
$opciones_propietarios = array();
while ($row = $result_propietario->fetch_assoc()) {
    $opciones_propietarios[$row['id_propietario']] = $row['nombre'];
}

$opciones_mascotas = array();
while ($row = $result_mascota->fetch_assoc()) {
    $opciones_mascotas[$row['id_mascota']] = $row['nombre'];
}

$opciones_medicos = array();
while ($row = $result_medico->fetch_assoc()) {
    $opciones_medicos[$row['id_medico']] = $row['nombre'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/menulat.css" />
   
    <title>Reservar Cita</title>
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
<a href="../rolAdmin/areas.php" class="">Listado de Registros</a>
</li>
<li>
<a href="../rolAdmin/registroMascota.php" class="active">Registro de Clientes</a>

</li>
<li>
<a href="../rolAdmin/inventario.php" class="">Inventario</a>
</li>
<li>
<a href="login.html" class="">Salir</a>
</li>

</ul>
    </div>
    <button id="openSidenavButton">Abrir Menú</button>
    <div id="sidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul>
       
            <li><a href="../rolAdmin/registroMascota.php">Registro Mascotas y Propietarios</a></li>
            <li><a href="../rolAdmin/reservasCitas.php">Reservas Citas</a></li>
           
     
        </ul>
    </div>
    <script src="../js/scripts.js"></script>
</ul>
    <h1>Reservar Cita</h1>
    <form action="" method="post">
    <div class="container">
        <label for="fecha">Fecha de la cita:</label>
        <input type="datetime-local" name="fecha" id="fecha" required><br>
        
        <label for="propietario">Propietario:</label>
        <select name="id_propietario" id="propietario" required>
            <?php foreach ($opciones_propietarios as $id => $nombre): ?>
                <option value="<?= $id ?>"><?= $nombre ?></option>
            <?php endforeach; ?>
        </select><br>
        
        <label for="mascota">Mascota:</label>
        <select name="id_mascota" id="mascota" required>
            <?php foreach ($opciones_mascotas as $id => $nombre): ?>
                <option value="<?= $id ?>"><?= $nombre ?></option>
            <?php endforeach; ?>
        </select><br>
        
        <label for="medico">Médico:</label>
        <select name="id_medico" id="medico" required>
            <?php foreach ($opciones_medicos as $id => $nombre): ?>
                <option value="<?= $id ?>"><?= $nombre ?></option>
            <?php endforeach; ?>
        </select><br>

        <div class="clearfix">

        <button type="submit" class="signupbtn">Reservar</button>
        </div>
    </div>
    </form>
</body>
</html>
