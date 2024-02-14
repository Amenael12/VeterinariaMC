<?php 
include("config.php");
$descripcion = $_POST['descripcion'];
$sql = "INSERT INTO tb_area(descripcion) 
VALUES('$descripcion')";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'alert("Guardado");';
	echo 'window.location="areas.php";';
	echo '</script>';	
}
?>