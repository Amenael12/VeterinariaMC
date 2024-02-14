<?php 
include("config.php");
$id = $_GET['id'];
$sql ="UPDATE tb_medicos SET estado = 0
WHERE id_medico = $id";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'window.location="medicosList.php";';
	echo '</script>';
	
}
?>