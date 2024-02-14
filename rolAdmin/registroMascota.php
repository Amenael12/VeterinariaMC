<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/menulat.css" />
    <title>Registro Clientes</title>
</head>
<body>

    <!-- menu general -->
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
<a href="../rolAdmin/registro.php" class="">Registros Hospital</a>
</li>
<li>
<a href="../rolAdmin/areas.php" class="">Listado de Registros</a>
</li>
<li>
<a href="../rolAdmin/registroMascota.php" class="active">Registro de Clientes</a>

</li>
<li>
<a href="../rolAdmin/inventario.php" class="">Inventario</a>
</li>
<li>
<a href="login.html" class="">Salir</a>
</li>

</ul>
    </div>
    <button id="openSidenavButton">Abrir Menú</button>
    <div id="sidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul>
       
            <li><a href="../rolAdmin/registroMascota.php">Registro Mascotas y Propietarios</a></li>
            <li><a href="../rolAdmin/reservasCitas.php">Reservas Citas</a></li>
           
     
        </ul>
    </div>
    <script src="../js/scripts.js"></script>
</ul>

    </div>
    <form action="guardarMascotas.php" method="POST">
        <div class="container">
            
        <h2>Registro Propietario </h2>
        <hr>
        <label > Cedula</label>
            <br>
            <input type="text" name="cedula" placeholder="Cedula o pasaporte" required>
            <br>
            <label>Nombres</label>
            <br>
            <input type="text" name="nombre" placeholder="Marcos, Sergio, Carlos...." required>
            <br>
             <label> Apellidos </label>
             <br>
            <input type="text" name="apellido" placeholder="Herrera, Hernandez..">
            <br>
             <label >Telefono </label>
             <br>
            <input type="tel" name="telefono" placeholder="09..............." required>
            <br>
            <label>Direccion</label>
            <br>
            <input type="text" name="direccion" placeholder="Sur de la ciudad Zona x Solar x" required>
            <br>
            <label>Correo Electronico</label>
            <br>
            <input type="email" name="email" placeholder="calor@correo.com" required>
            <br>
    <hr>
    <h2>Registro de Mascotas</h2>
    <hr>
            <label>Nombres</label>
            <br>
            <input type="text" name="nombre_mascota" placeholder="Rufi, Yuly...." required>
            <br>
             <label> Especie </label>
             <br>
            <input type="text" name="especie" placeholder="Perro, Gato, Loro...">
            <br>
             <label >Sexo </label>

             <br>
             <input type="radio" name="sexo" value="1" checked> Macho <br> <input type="radio" name="sexo" value="2"> Hembra 

            <br>
            <br>
            <label>Fecha de Nacimiento</label>
            <br>
            <input type="date" name="fecha" required>
            <br>
            <label>Edad</label>
            <br>
           <input type="number" name="edad" required>
            <br>

            <div class="clearfix">
                <button type="submit" class="signupbtn">Guardar</button>
            </div>
        </div>
    </form>
</body>
</html>