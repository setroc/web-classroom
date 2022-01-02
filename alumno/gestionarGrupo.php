<?php
include "header.php";
require '../src/php/conectarDB.php';
$db = conectarDb();
$idAlumno = $_SESSION['id'];
$query = "SELECT idAlumno, nombre, apellidoPaterno, apellidoMaterno FROM alumno";
$resultado = mysqli_query($db, $query) or die(mysqli_error($db));
?>

    <main class="alumno gestionar">
        <div class="principal">
            <h2>Mi Grupo</h2>
            <div class="informacion">
                <table>
                    <tr>
                        <!-- <th>Número</th> -->
                        <th>Número</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                    </tr>
                    <?php while( $row = mysqli_fetch_assoc($resultado) ): ?>
                        <tr>
                            <td><?php echo $row['idAlumno'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['apellidoPaterno'] ?></td>
                            <td><?php echo $row['apellidoMaterno'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </main>

<?php
include "footer.php";
?>