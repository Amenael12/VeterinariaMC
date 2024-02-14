<?php
include("config.php");

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos enviados desde el formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $costo = $_POST['costo'];

    // Insertar el nuevo producto en la base de datos
    $sql = "INSERT INTO tb_inventario (nombre, descripcion, cantidad, costo, estado) VALUES ('$nombre', '$descripcion', $cantidad, $costo,   1)";

    if (mysqli_query($mysqli, $sql)) {
        echo '<script languaje= "javascript">';
        echo 'window.location= "inventario.php";';
        echo '</script>';
    }
}

// Consulta para obtener todos los productos del inventario
$sql = "SELECT * FROM tb_inventario WHERE estado =   1";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Inventario</title>
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
<a href="../rolAdmin/registroMascota.php" class="">Registro de Clientes</a>

</li>
<li>
<a href="../rolAdmin/inventario.php" class="active">Inventario</a>
</li>
<li>
<a href="" class="">Salir</a>
</li>

</ul>


    </div>
    <h1>Inventario</h1>
    <form action="" method="post">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" name="nombre" id="nombre" required><br>
        
        <label for="descripcion">Descripción:</label>
        <br>
        <textarea name="descripcion" id="descripcion"></textarea><br>
        <br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" required><br>
        
        <label for="costo">Costo:</label>
        <input type="number" name="costo" id="costo" step="0.01" min="0" required><br>
        <br>
        <div class="clearfix">
                <button type="submit" class="signupbtn">Guardar</button>
            </div>
        <br>

        <button onclick="window.location.href='../backend/generar_pdf_inv.php'" class="signupbtn">Generar PDF</button>
    </form>

    <h2>Lista de Productos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID Producto</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Costo</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_producto'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['descripcion'] ?></td>
                    <td><?= $row['cantidad'] ?></td>
                    <td><?= number_format($row['costo'],  2) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
