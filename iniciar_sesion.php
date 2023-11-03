<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="iniciar_sesion.css">
    <title>Iniciar sesion</title>
</head>
<body>
    <main>
        <div class="formulario">
            <h2>Iniciar Sesion</h2>
            <form method="post">
                <label for="usuario">Correo Electronico</label>
                <input type="text" name="correo" required maxlength="40">
                <label for="contra">Contraseña</label>
                <input type="text" name="contra" required maxlength="32">
                <button type="submit">Enviar</button>
            </form>
            <div class="botones">
                <a href="index.php">Cerrar</a>
                <a href="registrarse.php">¿No tenes una cuenta?</a>
            </div>
        </div>
    </main>

    <?php
    session_start();
    $conexion = mysqli_connect("localhost", "root", "", "auto");
    if(!(isset($_POST['correo']) or isset($_POST['contra']))) return;

    $correo = $_POST['correo'];
    $contra = $_POST['contra'];
        
    $query = "SELECT * FROM clientes WHERE correo_electronico = '$correo' AND contraseña = '$contra'";
    $resultado = mysqli_query($conexion, $query);
    
    if(mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_row($resultado);

        if(isset($_SESSION['usuario'])) {
            unset($_SESSION['usuario']);
        }
        
        $_SESSION['usuario'] = $fila[0];
        $_SESSION['rol'] = $fila[6];

        header("Location: index.php");
    } else {
        echo '<script type="text/javascript">alert("No se encontro tu cuenta.")</script>';
    }
    
    
    ?>
</body>
</html>