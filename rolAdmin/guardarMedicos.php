<?php 
include("config.php");
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$especialidad = $_POST['especialidad'];
$numero = $_POST['numero'];
$correo = $_POST['correo'];
$direccion =$_POST['direccion'];
$sql = "INSERT INTO tb_medicos (cedula, nombre, apellido, especialidad, telefono, correo, direccion) 
VALUES('$cedula' , '$nombre' , '$apellido' , '$especialidad' , '$numero' , '$correo' , '$direccion')";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'alert("Guardado");';
	echo 'window.location="medicos.php";';
	echo '</script>';	
}
?>