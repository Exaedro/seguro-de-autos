<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="iniciar_sesion.css">
    <title>Registro</title>
</head>
<body>
    <main>
        <div class="formulario">
            <h2>Registro</h2>
            <form method="post">
                <label for="usuario">Nombre</label>
                <input type="text" name="nombre">
                <label for="usuario">Apellido</label>
                <input type="text" name="apellido">
                <label for="contra">Correo Electronico</label>
                <input type="text" name="correo">
                <label for="usuario">Telefono</label>
                <input type="text" name="telefono">
                <label for="contra">Contraseña</label>
                <input type="text" name="contra">
                <button type="submit">Enviar</button>
            </form>
            <div class="botones">
                <a href="index.php">Cerrar</a>
                <a href="iniciar_sesion.php">¿Ya tenes una cuenta?</a>
            </div>
        </div>
    </main>

    <?php
    $conexion = mysqli_connect("localhost", "root", "", "auto");
    if(!(isset($_POST['nombre']) or isset($_POST['apellido']) or isset($_POST['contra']) or isset($_POST['correo']) or isset($_POST['telefono']))) return;

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contra = $_POST['contra'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
        
    $query = "SELECT * FROM clientes WHERE correo_electronico = '$correo'";
    $resultado = mysqli_query($conexion, $query);
    
    if(mysqli_num_rows($resultado) >= 1) {
        echo '<script type="text/javascript">alert("Ya existe una cuenta con este nombre de usuario.")</script>';
    } else {
        $query = "INSERT INTO clientes (nombre, apellido, telefono, correo_electronico, contraseña) VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$contra')";
        mysqli_query($conexion, $query);
        
        echo '<script type="text/javascript">alert("Registrado correctamente, inicia sesion.")</script>';
        header("Location: iniciar_sesion.php");
    }

    ?>
</body>
</html>