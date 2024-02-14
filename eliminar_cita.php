<?php
include("config.php");

if(isset($_GET['id'])) {
    $id_cita = $_GET['id'];

    // Cambia el estado de la cita a 0
    $query = "UPDATE tb_citas SET estado=0 WHERE id_cita=$id_cita";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        header("Location: ver_citas.php"); // Redirige a la página de "Ver citas" si el cambio de estado fue exitoso
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}
?>
