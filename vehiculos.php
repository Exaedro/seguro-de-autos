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
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="vehiculos.php">Vehiculos</a></li>
                    <li><a href="index.html#precios">Precios</a></li>
                    <li><a href="index.html#contacto">Contacto</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <h1>Vehiculos de clientes</h1>
        <?php include 'php/obtener_vehiculos.php'; ?>
    </main>
</body>
</html>
