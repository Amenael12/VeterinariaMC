<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/menulat.css" />
    <title>Document</title>
</head>
<body>
    <!-- Creamos un menu     -->
    <div class="icon-bar">
    <div class="logo"> Logo</div>
    <div class="hamburguer">
<div class="line"></div>
<div class="line"></div>
<div class="line"></div>
</div>
<nav class="nav-bar">
<ul>
<li>
<a href="../rolAdmin/home.php" class="">Home</a>
</li>
<li>
<a href="../rolAdmin/registro.php" class="active">Registros Hospital</a>
</li>
<li>
<a href="../rolAdmin/areas.php" class="">Listado de Registros</a>
</li>
<li>
<a href="../rolAdmin/registroMascota.php" class="">Registro de Clientes</a>

</li>
<li>
<a href="../rolAdmin/inventario.php" class="">Inventario</a>
</li>
<li>
<a href="" class="">Salir</a>
</li>

</ul>
    </div>
    <button id="openSidenavButton">Abrir Menú</button>
    <div id="sidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul>
        <li><a href="registro.php">Areas</a></li>
            <li><a href="medicos.php">Medicos</a></li>
            <li><a href="registroUsuario.php">Usuarios</a></li>
            <li><a href="servicios.php">Servicios</a></li>
            <!-- Más ítems -->
        </ul>
    </div>
    <script src="../js/scripts.js"></script>
  
    <h2>Médico</h2>
    <fieldset>
  <!-- formulario de medicos -->
    <form action="../rolAdmin/guardarMedicos.php" method="POST">
        <div class="container" >
            <input type="text" name="cedula" placeholder="Cedula de identidad" required>
            <input type="text" name="nombre" placeholder="Nombres" required>
            <input type="text" name="apellido" placeholder="Apellidos" required>
            <input type="text" name="especialidad" placeholder="Especialidad" required>
             <input type="text" name= "numero" placeholder="Telf." required>
            <input type="email" name= "correo" placeholder="Correo"  required>
            <input type="text" name="direccion" placeholder="Direccion" required>

            <div class="clearfix">
            <button type="submit" class="regismed">Guardar</button>
             </div>
    </div>

    </form>
</body>
</html>