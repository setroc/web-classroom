<?php
include "header.php";
require '../src/php/conectarDB.php';
$db = conectarDb();
$query = "SELECT idTema, nombre FROM tema";
$resultado = mysqli_query($db, $query) or die(mysqli_error($db));
?>

    <main class="alumno gestionar">
        <div class="principal">
            <h2>Temario del Bloque Uno</h2>
            <div class="informacion">
                <table>
                    <tr>
                        <th>Número</th>
                        <th>Tema</th>
                    </tr>
                    <?php while( $tema = mysqli_fetch_assoc($resultado) ): ?>
                        <tr>
                            <?php echo "<td> ${tema['idTema']}</td>"; ?>
                            <?php echo "<td> ${tema['nombre']}</td>"; ?>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </main>

<?php
include "footer.php";
?>