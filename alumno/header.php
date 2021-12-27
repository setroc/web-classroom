<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/app.css">
    <link rel="stylesheet" href="../src/css/alumno.css">
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
    <nav class="alumno">
        <ul>
            <li>
                <p><a href="/maestro/index.html">Inicio</a></p>
            </li>
            <li class="gestionar">
                <p>Gestionar</p>
                <div class="submenu">
                    <ul>
                        <li><p><a href="/grupo.php">Grupo</a></p></li>
                    </ul>
                    <ul>
                        <li><p><a href="/alumno.php">Alumno</a></p></li>
                    </ul>
                </div>
            </li>
            <li class="gestionar">
                <p>Gestionar temas</p>
                <div class="submenu">
                    <ul>
                        <li class="bloque">
                            <p>Bloque 1</p>
                            <div class="submenudos">
                                <ul>
                                    <li>
                                        <p>Video</p>
                                    </li>
                                    <li>
                                        <p>Material para imprimir</p>
                                    </li>
                                    <li>
                                        <p>Actividad en línea</p>
                                    </li>
                                    <li>
                                        <p>Examen</p>
                                    </li>
                                    <li>
                                        <p>Libro</p>
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
                <p>Actualización de perfil</p>
            </li>
            <li>
                <p>Soporte</p>
            </li>
            <li>
                <p>Ayuda</p>
            </li>
            <li>
                <p><a href="/alumno/cerrarSesion.php">Salir</a></p>
            </li>
        </ul>
    </nav>