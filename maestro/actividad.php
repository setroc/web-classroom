<?php
include "header.php";
require '../src/php/conectarDB.php';
$db = conectarDb();
$query = "SELECT a.idEjercicio, a.pregunta, b.nombre AS tema FROM ejercicio AS a JOIN tema AS b ON a.tema_idTema = b.idTema";
$resultado = mysqli_query($db, $query) or die(mysqli_error($db));
$id = $_GET['id'] ?? null;
$mensaje = $_GET['mensaje'] ?? null;
// $query = "SELECT * from tema;";
// $resultado2 = mysqli_query($db, $query) or die(mysqli_error($db));

?>

    <main class="maestro gestionar">
        <div class="principal">
            <h2>Actividad en Línea</h2>
            <?php
                if ($mensaje == 1) {
                    echo '<p class="alerta exito">Actividad Creada Correctamente</p>';
                }
                if ($mensaje == 2) {
                    echo '<p class="alerta exito">Actividad Actualizada Correctamente</p>';
                }
                if ($mensaje == 3) {
                    echo '<p class="alerta exito">Actividad Eliminada Correctamente</p>';
                }
            ?>
            <div class="informacion">
                <table>
                    <tr>
                        <th>Número</th>
                        <th>Nombre</th>
                        <th>Tema</th>
                        <!-- <th>Editar</th> -->
                        <th>Eliminar</th>
                    </tr>
                    <?php while( $ejercicio = mysqli_fetch_assoc($resultado) ): ?>
                        <tr>
                            <td><?php echo $ejercicio['idEjercicio']; ?></td>
                            <td><?php echo $ejercicio['pregunta']; ?></td>
                            <td><?php echo $ejercicio['tema']; ?></td>
                            <!-- <td style="text-align: center; cursor: pointer;"><a href="./maestro/actividad.php?id=<?php echo $ejercicio['idEjercicio'];?>">✏️</a></td> -->
                            <td style="text-align: center; cursor: pointer;"><a href="../maestro/actividades/eliminarActividad.php?id=<?php echo $ejercicio['idEjercicio'];?>">❌</a></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            
            <div class="add <?php if($id) echo 'none'; ?>" id="add">
                <a href="../maestro/actividades/nuevaActividad.php">+</a>
            </div>

        </div>
    </main>

<?php
include "footer.php";
?>