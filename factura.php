<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
    <title>Crear Factura</title>
</head>
<body>
    <div class="icon-bar">
        <a href="registro.php"><i class="fa fa-registered"></i></a>
        <a href="home_use.html"><i class="fa fa-home"></i></a>
    </div>
    <h2>Crear Factura</h2>
    <hr>
    <div class="container">
        <form action="crear_factura.php" method="post">
            <label for="id_cita">Cita:</label><br>
            <select id="id_cita" name="id_cita">
            <?php
            $query = "SELECT id_cita, fecha FROM tb_citas WHERE estado = 1";
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['id_cita'] . "'>" . $row['fecha'] . "</option>";
            }
            ?>
            </select><br>
            <label for="id_urgencia">Urgencia:</label><br>
            <select id="id_urgencia" name="id_urgencia">
            <?php
            $query = "SELECT id_urgencia, descripcion FROM tb_urgencias WHERE estado = 1";
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['id_urgencia'] . "'>" . $row['descripcion'] . "</option>";
            }
            ?>
            </select><br>
            <label for="id_tratamiento">Tratamiento:</label><br>
            <select id="id_tratamiento" name="id_tratamiento">
            <?php
            $query = "SELECT id_tratamiento, nombre FROM tb_tratamientos WHERE estado = 1";
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['id_tratamiento'] . "'>" . $row['nombre'] . "</option>";
            }
            ?>
            </select><br>
            <label for="cantidad">Cantidad:</label><br>
            <input type="text" id="cantidad" name="cantidad"><br>
            <label for="total">Total:</label><br>
            <input type="text" id="total" name="total"><br>
            <input type="submit" value="Crear Factura">
        </form>
    </div>
</body>
</html>
