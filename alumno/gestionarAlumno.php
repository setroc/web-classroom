<?php
include "header.php";
require '../src/php/conectarDB.php';
$db = conectarDb();
$idAlumno = $_SESSION['id'];
$query = "SELECT t.nombre, e.pregunta, e.idEjercicio FROM ejercicio e INNER JOIN tema t ON e.tema_idTema = t.idTema ";
$resultado = mysqli_query($db, $query) or die(mysqli_error($db));
?>

    <main class="alumno gestionar">
        <div class="principal">
            <h2>Mis calificaciones</h2>
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
    </main>

<?php
include "footer.php";
?>