<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Seguro de Autos</title>
    <style>
        form {
            width: 600px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        input, select {
            height: 20px;
            margin-bottom: 15px;
        }

        .btn2 {
            display: block;
            width: 600px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <?php 
                    session_start();
                    if(isset($_SESSION['rol'])) {
                        if($_SESSION['rol'] == 'admin') {
                            echo '<li><a href="vehiculos.php">Vehiculos</a></li>';
                        }
                    }
                    ?>
                    <li><a href="index.php#precios">Precios</a></li>
                    <li><a href="index.php#contacto">Contacto</a></li>
                </ul>
                <?php
                    if(isset($_SESSION['usuario'])) {
                        echo '<a href="perfil.php" style="margin-left: 20px">Perfil</a>';
                        echo '<a href="php/cerrar_sesion.php" style="position:absolute;display:inline-block;right:230px;">Cerrar Sesion</a>';
                    } else {
                        echo '<a href="iniciar_sesion.php" style="display:inline-block;">Iniciar Sesion</a>';
                    }
                ?>
            </div>
        </nav>
    </header>
    <main>
        <section id="inicio" class="hero">
            <h1>Protege tu auto con nosotros</h1>
            <p>Ofrecemos las mejores opciones de seguro para tu vehículo.</p>
            <a href="#vehiculo" class="btn">Ingresar Vehiculo</a>
        </section>
    </main>
    <section class="pricing">
        <h2>Precios de planes</h2>
        <section id="precios">
            <div class="plan">
                <h3>Plan Básico</h3>
                <p>Cobertura básica para conductores responsables.</p>
                <p class="price">$50/mes</p>
            </div>
            <div class="plan">
                <h3>Plan Premium</h3>
                <p>Cobertura completa con beneficios adicionales.</p>
                <p class="price">$80/mes</p>
            </div>
        </section>
    </section>
    <section class="benefits">
        <h2>Beneficios del Seguro</h2>
        <section id="cobertura" class="benefits">
            <div class="texto">
                <ul>
                    <li>Cobertura completa contra accidentes</li>
                    <li>Asistencia en carretera las 24 horas</li>
                    <li>Pagos flexibles</li>
                    <li>Seguro de auto de reemplazo</li>
                </ul>
            </div>
        </section>
    </section>
    <main>
        <section id="vehiculo" class="quote">
            <h2>Ingresa tu vehiculo</h2>
            <?php 
            if(!isset($_SESSION['usuario'])) {
                echo '<h2>Inicia sesion para añadir tu vehiculo.</h2>';
                echo '<a href="iniciar_sesion.php" class="btn2" style="position: relative;left: 389px;width: 380px;">Iniciar Sesion</a>';
                return;
            };
            include 'formulario.php';
            ?>
        </section>
    </main>
    <footer id="contacto">
        <div class="container">
            <h2>Contacto</h2>
            <p>¡Contáctanos para obtener más información!</p>
            <p>Teléfono: 123-456-7890</p>
            <p>Correo Electrónico: info@segurodeautos.com</p>
        </div>
    </footer>
</body>
</html>