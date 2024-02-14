<?php
include("config.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $fecha = $_POST['fecha'];
    $id_propietario = $_POST['id_propietario'];
    $id_mascota = $_POST['id_mascota'];
    $id_medico = $_POST['id_medico'];
    $id_cita = $_POST['id_cita'];

    // Actualizar la cita existente en la base de datos
    $sql = "UPDATE tb_reserva_cita SET fecha = '$fecha', id_propietario = '$id_propietario', id_mascota = '$id_mascota', id_medico = '$id_medico' WHERE id_cita = '$id_cita'";
    

    if (mysqli_query($mysqli, $sql)) {
        echo '<script languaje= "javascript">';
        echo 'window.location= "citasList.php";';
        echo '</script>';
    }
    
}


$id_cita = isset($_GET['id']) ? $_GET['id'] : '';


if (!empty($id_cita)) {
    $sql = "SELECT rc.*, p.nombre AS nombre_propietario, m.nombre AS nombre_mascota, md.nombre AS nombre_medico
            FROM tb_reserva_cita rc
            JOIN tb_propietario p ON rc.id_propietario = p.id_propietario
            JOIN tb_mascota m ON rc.id_mascota = m.id_mascota
            JOIN tb_medicos md ON rc.id_medico = md.id_medico
            WHERE rc.id_cita = '$id_cita'";
    $result = $mysqli->query($sql);
    $cita = $result->fetch_assoc();
}

// Consultas para obtener los nombres de las tablas
$query_propietario = "SELECT id_propietario, nombre FROM tb_propietario";
$result_propietario = $mysqli->query($query_propietario);

$query_mascota = "SELECT id_mascota, nombre FROM tb_mascota";
$result_mascota = $mysqli->query($query_mascota);

$query_medico = "SELECT id_medico, nombre FROM tb_medicos";
$result_medico = $mysqli->query($query_medico);


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
    <link rel="stylesheet" type="text/css" href="../css/mystyle2.css" /> 
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Actualizar Cita</title>
</head>
<body>
<header>
         <div class="logo"> Logo</div>
         <div class="hamburguer">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
</div>
<nav class="nav-bar">
<ul>
<li>
    <a href="../rolAdmin/home.php" class="active">Home</a>
</li>
<li>
    <a href="../rolAdmin/registro.php" class="">Registros Hospital</a>
</li>
<li>
    <a href="../rolAdmin/areas.php" class="">Listado de Registros</a>
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

</nav>
<br>
<br>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- menu general -->
   
    </div>
    <h1>Actualizar Cita</h1>
    <form action="" method="post">
        <!-- Campo oculto para el ID de la cita -->
        <input type="hidden" name="id_cita" value="<?= $cita['id_cita'] ?? '' ?>">
        
        <label for="fecha">Fecha de la cita:</label>
        <input type="datetime-local" name="fecha" id="fecha" value="<?= $cita['fecha'] ?? '' ?>" required><br>
        
        <label for="propietario">Propietario:</label>
        <select name="id_propietario" id="propietario" required>
            <?php foreach ($opciones_propietarios as $id => $nombre): ?>
                <option value="<?= $id ?>" <?= $id == $cita['id_propietario'] ? 'selected' : '' ?>><?= $nombre ?></option>
            <?php endforeach; ?>
        </select><br>
        
        <label for="mascota">Mascota:</label>
        <select name="id_mascota" id="mascota" required>
            <?php foreach ($opciones_mascotas as $id => $nombre): ?>
                <option value="<?= $id ?>" <?= $id == $cita['id_mascota'] ? 'selected' : '' ?>><?= $nombre ?></option>
            <?php endforeach;?>
        </select>
        <label for="medico">Medico:</label>
        <select name="id_medico" id="medico" required>
            <?php foreach ($opciones_medicos as $id => $nombre): ?>
                <option value="<?= $id ?>" <?= $id == $cita['id_medico'] ? 'selected' : '' ?>><?= $nombre ?></option>
            <?php endforeach;?>
        </select>
        <div class="clearfix">

        <button type="submit" class="signupbtn">Reservar</button>
        </div>
    </form>
</body>
</html>

