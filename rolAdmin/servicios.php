<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/menulat.css" />
    <title>Servicios</title>
</head>
<body>
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

          <h2>Servicios</h2>
          <hr>
          <form action="guardarServicio.php" method="POST">
                <div class="container">
                <label >Nombre</label>
                <br>
                <input type="text" name="nombre"required>
                <br>
                <label> Descripcion </label>
                <br>
                <textarea name="descripcion" maxlength="500" cols="30" rows="10" placeholder="Descripcion..." required></textarea>
                <br>
                <label > Costo</label>
                <br>
               
                <input type="number" placeholder="1.0" step="0.01" min="0"  name="costo" required>
                <br>

                <div class="clearfix">
                <button type="submit" class="signupbtn">Guardar</button>
               </div>
                </div>

          </form>

</body>
</html>