<?php
include "header.php";
require '../src/php/conectarDB.php';
$db = conectarDb();
$query = "SELECT a.idEjercicio, a.pregunta, b.nombre AS tema FROM ejercicio AS a JOIN tema AS b ON a.tema_idTema = b.idTema";
$resultado = mysqli_query($db, $query) or die(mysqli_error($db));

?>

    <main class="alumno gestionar">
        <div class="principal">
            <h2>Actividad en Línea</h2>
            <div class="informacion">
                <table>
                    <tr>
                        <th>Número</th>
                        <th>Tema</th>
                        <th>Nombre</th>
                    </tr>
                    <?php while( $ejercicio = mysqli_fetch_assoc($resultado) ): ?>
                        <tr>
                            <td><?php echo $ejercicio['idEjercicio']; ?></td>
                            <td><?php echo $ejercicio['tema']; ?></td>
                            <td><a href="./alumno/actividades/actividad.php?id=<?php echo $ejercicio['idEjercicio']; ?>"><?php echo $ejercicio['pregunta']; ?></a></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>

        </div>
    </main>

<?php
include "footer.php";
?>