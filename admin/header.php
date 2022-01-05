<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/app.css">
    <link rel="stylesheet" href="../src/css/admin.css">
    <title>Classroom - ADMIN</title>
</head>
<body>
    <header class="admin">
        <div class="logo">
            <img src="../src/assets/escudoESCOM.png" alt="Logo">
        </div>
        <div class="titulo">
            <h1>Proyecto WEB</h1>
            <?php session_start(); ?>
            <p>Bienvenido, <?php echo $_SESSION['nombre']; ?></p>
        </div>
    </header>
    <nav class="admin">
        <ul>
            <li>
                <p><a href="../admin/index.php">Inicio</a></p>
            </li>
            <li class="usuario">
                <p>Gestionar usuario</p>
                <div class="submenu">
                    <ul>
                        <li>
                            <p><a href="../admin/gestionarMaestro.php">Maestro</a></p>
                        </li>
                        <li>
                            <p><a href="../admin/gestionarAlumno.php">Alumno</a></p>
                        </li>
                        <li>
                            <p><a href="../admin/gestionarAdministrador.php">Administrador</a></p>
                        </li>
                        <li>
                            <p><a href="../admin/gestionarUsuarios.php">Todos</a></p>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="usuario">
                <p>Gestionar temas</p>
                <div class="submenu">
                    <ul>
                        <li class="bloque">
                            <p><a href="../admin/bloqueUno.php">Bloque 1</a></p>
                            <div class="submenudos">
                                <ul>
                                    <li>
                                        <p><a href="../admin/video.php">Video</a></p>
                                    </li>
                                    <li>
                                        <p><a href="../admin/imprimir.php">Material para imprimir</a></p>
                                    </li>
                                    <li>
                                        <p><a href="../admin/actividad.php">Actividad en línea</a></p>
                                    </li>
                                    <!-- <li>
                                        <p>Examen</p>
                                    </li> -->
                                    <li>
                                        <p><a href="../admin/gestionarLibro.php">Libro</a></p>
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
                <p><a href="../admin/actualizacionPerfil.php">Actualización de perfil</a></p>
            </li>
            <li>
                <p><a href="../admin/soporte.php">Soporte</a></p>
            </li>
            <li>
                <p><a href="../admin/ayuda.php">Ayuda</a></p>
            </li>
            <li>
                <p><a href="../admin/cerrarSesion.php">Salir</a></p>
            </li>
        </ul>
    </nav>