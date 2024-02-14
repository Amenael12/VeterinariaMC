<?php 
include("config.php");
$id = $_GET['id'];
$sql ="UPDATE tb_servicios SET estado = 0 WHERE id_servicio = $id";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'window.location="serviciosList.php";';
	echo '</script>';
	
}
?>