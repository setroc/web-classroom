<?php
include "header.php";

require '../src/php/conectarDB.php';
$db = conectarDb();

// $query = "SELECT * FROM administrador;";
// $resultado1 = mysqli_query($db, $query) or die(mysqli_error($db));
// $query = "SELECT * FROM profesor;";
// $resultado2 = mysqli_query($db, $query) or die(mysqli_error($db));
$query = "SELECT * FROM alumno;";
$resultado3 = mysqli_query($db, $query) or die(mysqli_error($db));

?>

    <main class="admin gestionar">
        <div class="principal">
            <h2>Gestionar Alumno</h2>
            <div class="informacion">
                <table>
                    <tr>
                        <th>Nombre completo</th>
                        <th>Correo principal</th>
                        <th>Correo alterno</th>
                        <th>Tipo de usuario</th>
                        <th>Teléfono</th>
                        <th>Boleta / Empleado</th>
                        <th>Contraseña</th>
                    </tr>
                    <?php while( $alumno = mysqli_fetch_assoc($resultado3) ): ?>
                        <tr>
                            <?php echo "<td> ${alumno['nombre']} ${alumno['apellidoPaterno']} ${alumno['apellidoMaterno']}</td>"; ?>
                            <?php echo "<td> ${alumno['correo']}</td>"; ?>
                            <?php echo "<td> ${alumno['correoSecundario']}</td>"; ?>
                            <?php echo "<td> Alumno </td>"; ?>
                            <?php echo "<td> ${alumno['telefono']} </td>"; ?>
                            <?php echo "<td> ${alumno['boleta']}</td>"; ?>
                            <?php echo "<td> ${alumno['clave']}</td>"; ?>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </main>

<?php
include "footer.php";
?>