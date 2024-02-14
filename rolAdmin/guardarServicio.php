<?php 
include("config.php");
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];

$sql = "INSERT INTO tb_servicios ( nombre, descripcion, costo) 
VALUES('$nombre' , '$descripcion' , '$costo')";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'alert("Guardado");';
	echo 'window.location="servicios.php";';
	echo '</script>';	
}
?>