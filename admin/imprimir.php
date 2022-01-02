<?php
include "header.php";
require '../src/php/conectarDB.php';
$db = conectarDb();
$query = "SELECT a.idMaterial, a.nombre, a.archivo, b.nombre AS tema FROM material AS a JOIN tema AS b ON a.tema_idTema = b.idTema WHERE a.tipo=2; ";
$resultado = mysqli_query($db, $query) or die(mysqli_error($db));
$id = $_GET['id'] ?? null;
$mensaje = $_GET['mensaje'] ?? null;
$query = "SELECT * from tema;";
$resultado2 = mysqli_query($db, $query) or die(mysqli_error($db));



?>

    <main class="admin gestionar">
        <div class="principal">
            <h2>Material para imprimir</h2>
            <div class="informacion">
                <table>
                    <tr>
                        <th>Tema</th>
                        <th>Nombre del material</th>
                        <th>URL</th>
                    </tr>
                    <?php while( $material = mysqli_fetch_assoc($resultado) ): ?>
                        <tr>
                            <td><?php echo $material['tema']; ?></td>
                            <td><?php echo $material['nombre']; ?></td>
                            <td><a href="<?php echo $material['archivo']; ?>"><?php echo $material['archivo']; ?></a></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </main>
<?php
include "footer.php";
?>