<?php 
include("config.php");
$id = $_GET['id'];
$sql ="UPDATE tb_facturas SET estado = 0
WHERE id_factura = $id";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'window.location="ver_facturas.php";';
	echo '</script>';
	
}
?>