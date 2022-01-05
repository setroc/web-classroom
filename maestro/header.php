<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/app.css">
    <link rel="stylesheet" href="../src/css./maestro.css">
    <title>Classroom</title>
</head>
<body>
    <header class="noLoggeado">
        <div class="logo">
            <img src="../src/assets/escudoESCOM.png" alt="Logo">
        </div>
        <div class="titulo">
            <h1>Proyecto WEB</h1>
            <?php session_start(); ?>
            <p>Bienvenido, <?php echo $_SESSION['nombre']; ?></p>
        </div>
    </header>
    <nav class="maestro">
        <ul>
            <li>
                <p><a href="./maestro/index.php">Inicio</a></p>
            </li>
            <li>
                <p><a href="./maestro/gestionarAlumnos.php">Gestionar Alumnos</a></p>
            </li>
            <li class="gestionar">
                <p>Gestionar Temas</p>
                <div class="submenu">
                    <ul>
                        <li class="bloque">
                            <p><a href="./maestro/bloqueUno.php">Bloque 1</a></p>
                            <div class="submenudos">
                                <ul>
                                    <li>
                                        <p><a href="./maestro/video.php">Video</a></p>
                                    </li>
                                    <li>
                                        <p><a href="./maestro/imprimir.php">Material para imprimir</a></p>
                                    </li>
                                    <li>
                                        <p><a href="./maestro/actividad.php">Actividad en Línea</a></p>
                                    </li>
                                    <!-- <li>
                                        <p>Examen</p>
                                    </li> -->
                                    <li>
                                        <p><a href="./maestro/gestionarLibro.php">Libro</a></p>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <p>Bloque 2</p>
                        </li>
                        <li>
                            <p>Bloque 3</p>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <p><a href="./maestro/actualizacionPerfil.php">Actualización de perfil</a></p>
            </li>
            <li>
                <p><a href="./maestro/soporte.php">Soporte</a></p>
            </li>
            <li>
                <p><a href="./maestro/ayuda.php">Ayuda</a></p>
            </li>
            <li>
                <p><a href="./maestro/cerrarSesion.php">Salida</a></p>
            </li>
        </ul>
    </nav>