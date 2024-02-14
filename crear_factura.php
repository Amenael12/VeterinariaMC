<?php
include("config.php");

$id_cita = $_POST['id_cita'];
$id_urgencia = $_POST['id_urgencia'];
$id_tratamiento = $_POST['id_tratamiento'];
$cantidad = $_POST['cantidad'];
$total = $_POST['total'];

$query = "INSERT INTO tb_facturas (id_cita, id_urgencia, id_tratamiento, cantidad, total) VALUES ('$id_cita', '$id_urgencia', '$id_tratamiento', '$cantidad', '$total')";
$result = mysqli_query($mysqli, $query);

if($result){
    echo "Factura creada exitosamente.";
} else {
    echo "Hubo un error al crear la factura.";
}
?>
