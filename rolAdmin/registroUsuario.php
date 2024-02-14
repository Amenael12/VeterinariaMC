<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/menulat.css" />
    
    <title>Registro de Usuario</title>
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
    
    

    <h2>Registro de Usuarios</h2>
    <hr>
    <form action="guardarUsuarios.php" method="POST">
        <div class="container">
            <input type="text" name="nombre" required>

            <input type="text" name="clave" required>
             <br>
            <select id="rol" name="rol" required>
              <option value="Administrador">Administrador</option>
              <option value="Usuario">Usuario</option>
              </select>
              <br>

            <div class="clearfix">
                <button type="submit" class="signupbtn">Guardar</button>
            </div>
        </div>
    </form>
    
</body>
</html>