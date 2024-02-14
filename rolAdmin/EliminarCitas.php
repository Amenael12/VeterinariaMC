<?php 
include("config.php");
$id = $_GET['id'];
$sql ="UPDATE  tb_reserva_cita SET estado = 0
WHERE id_cita = $id";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'window.location="citasList.php";';
	echo '</script>';
	
}
?>