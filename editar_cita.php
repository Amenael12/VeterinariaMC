<?php
include("config.php");

if(isset($_POST['update'])) {
    $id_cita = $_POST['id_cita'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $id_mascota = $_POST['id_mascota'];
    $id_medico = $_POST['id_medico'];
    $id_propietario = $_POST['id_propietario'];
    $observaciones = $_POST['observaciones'];

    $query = "UPDATE tb_citas SET fecha='$fecha', hora='$hora', id_mascota='$id_mascota', id_medico='$id_medico', id_propietario='$id_propietario', observaciones='$observaciones' WHERE id_cita=$id_cita";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        header("Location: ver_citas.php"); // Redirige a la página de "Ver citas" si la actualización fue exitosa
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}
?>
