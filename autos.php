<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="vehiculos.php">Vehiculos</a></li>
                    <li><a href="index.html#precios">Precios</a></li>
                    <li><a href="index.html#contacto">Contacto</a></li>
                </ul>
                <?php
                session_start();
                    if(isset($_SESSION['usuario'])) {
                        echo '<a href="perfil.php" style="margin-left: 20px">Perfil</a></div>';
                    } else {
                        echo '<a href="iniciar_sesion.php">Iniciar Sesion</a>';
                    }
                ?>
            </div>
        </nav>
    </header>
    <main>
        <h1>Tus Vehiculos</h1>
        <?php include 'php/obtener_vehiculos.php'; ?>
    </main>
</body>
</html>
