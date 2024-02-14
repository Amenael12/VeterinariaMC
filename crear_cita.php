<?php
include("config.php");

if(isset($_POST['submit'])) {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $nombre_mascota = $_POST['nombre_mascota'];
    $especie_mascota = $_POST['especie_mascota'];
    $sexo_mascota = $_POST['sexo_mascota'];
    $nombre_medico = $_POST['nombre_medico'];
    $nombre_propietario = $_POST['nombre_propietario'];
    $cedula_propietario = $_POST['cedula_propietario'];
    $apellido_propietario = $_POST['apellido_propietario'];
    $telefono_propietario = $_POST['telefono_propietario'];
    $direccion_propietario = $_POST['direccion_propietario'];
    $correo_propietario = $_POST['correo_propietario'];
    $observaciones = $_POST['observaciones'];
    // Recoge los datos de nacimiento y edad de la mascota del formulario
    $nacimiento_mascota = $_POST['nacimiento_mascota'];
    $edad_mascota = $_POST['edad_mascota'];

   // Primero, agrega el nuevo propietario a la base de datos
$query = "INSERT INTO tb_propietario (nombre, cedula, apellido, telefono, direccion, correo) VALUES ('$nombre_propietario', '$cedula_propietario', '$apellido_propietario', '$telefono_propietario', '$direccion_propietario', '$correo_propietario')";
mysqli_query($mysqli, $query);
$id_propietario = mysqli_insert_id($mysqli);

$query = "INSERT INTO tb_mascota (nombre, especie, sexo, nacimiento, edad, id_propietario) VALUES ('$nombre_mascota', '$especie_mascota', '$sexo_mascota', '$nacimiento_mascota', '$edad_mascota', '$id_propietario')";
mysqli_query($mysqli, $query);
$id_mascota = mysqli_insert_id($mysqli);


    $query = "INSERT INTO tb_medico (nombre) VALUES ('$nombre_medico')";
    mysqli_query($mysqli, $query);
    $id_medico = mysqli_insert_id($mysqli);

   
    // Inserta la nueva cita en la base de datos
    $query = "INSERT INTO tb_citas (fecha, hora, id_mascota, id_medico, id_propietario, observaciones) VALUES ('$fecha', '$hora', '$id_mascota', '$id_medico', '$id_propietario', '$observaciones')";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        header("Location: ver_citas.php"); // Redirige a la página de "Ver citas" si la creación fue exitosa
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}
?>
