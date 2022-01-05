<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Actividad 1</title>
    <style>
        :root {
            --negro: black;
            --blanco: white;
            --azul: #1a76a4;
            --azul-transparente: #1a76a44a;
            --azul-darken: #0c3a52;
            --verde: #77dd77;
            --rojo: #ff6961;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html {
            font-family: sans-serif;
            font-size: 62.5%;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        h1 {
            font-size: 2.5rem;
        }
        h2 {
            font-size: 2rem;
        }
        input,
        select {
            margin-bottom: 10px;
            padding: 10px;
            font-size: 1.6rem;
        }
        button {
            width: 80%;
            padding: 10px;
            background-color: var(--azul);
            font-family: inherit;
            color: var(--blanco);
            font-size: 1.6rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin: 20px auto;
        }
        button:hover {
            background-color: var(--azul-darken);
        }
        button:disabled {
            background-color: gray;
            cursor: auto;
        }
        /* header */
        header {
            display: flex;
            padding: 20px;
            justify-content: space-between;
            align-items: center;
            background-color: var(--azul-transparente) ;
        }
        header .logo {
            width: 100px;
        }
        header .logo img {
            width: 100%;
            object-fit: cover;
        }
        .pregunta {
            margin: 0 auto;
            margin-top: 20px;
            border: 1px solid var(--azul);
            width: 80%;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .pregunta img {
            width: 50%;
            margin: 10px auto;
            object-fit: cover;
        }
        /* gestionar */
        .informacion table {
            margin: 0 auto;
        }
        .informacion table tr:nth-child(2n+1) {
            background-color: var(--azul-transparente);
        }
        .informacion table tr:first-child {
            background-color: var(--azul-darken);
            color: var(--blanco);
        }
        .informacion table th,
        .informacion table td {
            font-size: 1.6rem;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php 
    $idAlumno = $_GET['id'] ?? null;
    require '../../src/php/conectarDB.php';
    $db = conectarDb();
    $query = "SELECT t.nombre, e.pregunta, e.idEjercicio FROM ejercicio e INNER JOIN tema t ON e.tema_idTema = t.idTema ";
    $resultado = mysqli_query($db, $query) or die(mysqli_error($db));
    $query = "SELECT nombre, apellidoPaterno, apellidoMaterno FROM alumno WHERE idAlumno = '${idAlumno}'";
    $nombreAlumno = mysqli_query($db, $query) or die(mysqli_error($db));
    ?>
    <header>
        <div class="logo">
            <a href="./maestro/index.php">
                <img src="/src/assets/escudoESCOM.png" alt="Logo">
            </a>
        </div>
        <div class="titulo">
            <h1>Alumno: <?php $nom  = mysqli_fetch_assoc($nombreAlumno); echo $nom['nombre']." ".$nom['apellidoPaterno']." ".$nom['apellidoMaterno'];?></h1>
        </div>
    </header>
    <div class="pregunta">
        <div class="informacion">
            <table>
                <tr>
                    <!-- <th>Número</th> -->
                    <th>Tema</th>
                    <th>Actividad</th>
                    <th>Calificación</th>
                </tr>
                <?php while( $row = mysqli_fetch_assoc($resultado) ): ?>
                <?php 
                $query = "SELECT c.calificacion FROM calificacion c WHERE c.ejercicio_idEjercicio = '${row['idEjercicio']}' AND c.alumno_idAlumno = '${idAlumno}'";
                $resultado2 = mysqli_query($db, $query) or die(mysqli_error($db));    
                ?>
                    <tr>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['pregunta'] ?></td>
                        <!-- <td><?php echo $row['idEjercicio'] ?></td> -->
                        <td>
                            <?php
                                $cal = mysqli_fetch_assoc($resultado2);
                                if ($cal === NULL ) {
                                    echo "No ha realizado la actividad";
                                }else {
                                    echo $cal['calificacion'];
                                }
                            ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>