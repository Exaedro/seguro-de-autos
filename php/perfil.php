<?php
    if(!isset($_SESSION['usuario'])) return header('Location: ../iniciar_sesion.php');
    
    $db = mysqli_connect('localhost', 'root', '', 'auto');
    
    $query = "SELECT * FROM clientes c WHERE c.DNI_cliente = ". $_SESSION['usuario'] .";";
    $result = mysqli_query($db, $query);

    while($fila = mysqli_fetch_assoc($result)) {
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
        $correo = $fila['correo_electronico'];
        $telefono = $fila['telefono'];

        echo "<h2 style='font-size: 32px;'>$nombre $apellido</h2>";
        echo "<p>Correo: $correo</p>";
        echo "<p>Telefono: $telefono</p>";
    }
?>