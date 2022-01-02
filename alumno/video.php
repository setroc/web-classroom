<?php
include "header.php";

require '../src/php/conectarDB.php';
$db = conectarDb();
$query = "SELECT a.idMaterial, a.nombre, a.archivo, b.nombre AS tema FROM material AS a JOIN tema AS b ON a.tema_idTema = b.idTema WHERE a.tipo=1; ";
$resultado = mysqli_query($db, $query) or die(mysqli_error($db));

?>

    <main class="alumno gestionar">
        <div class="principal">
            <h2>Videos</h2>
            <div class="informacion">
                <table>
                    <tr>
                        <th>Nombre del video</th>
                        <th>URL</th>
                        <th>Tema</th>
                    </tr>
                    <?php while( $material = mysqli_fetch_assoc($resultado) ): ?>
                        <tr>
                            <?php echo "<td> ${material['nombre']}</td>"; ?>
                            <?php echo "<td><a href=".$material['archivo']."> ${material['archivo']} </a></td>"; ?>
                            <?php echo "<td> ${material['tema']}</td>"; ?>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div> 
        </div>
    </main>
<?php
include "footer.php";
?>