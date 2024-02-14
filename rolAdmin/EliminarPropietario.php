<?php 
include("config.php");
$id = $_GET['id'];
$sql ="UPDATE tb_propietario SET estado = 0
WHERE id_propietario = $id";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'window.location="propietarios.php";';
	echo '</script>';
	
}
?>