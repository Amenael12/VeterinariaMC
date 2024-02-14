<?php 
include("config.php");
$id = $_GET['id'];
$sql ="UPDATE tb_area SET estado = 0
WHERE id_area = $id";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'window.location="areas.php";';
	echo '</script>';
	
}
?>