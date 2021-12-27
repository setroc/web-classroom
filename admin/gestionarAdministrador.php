<?php
include "header.php";

require '../src/php/conectarDB.php';
$db = conectarDb();

$query = "SELECT * FROM administrador;";
$resultado1 = mysqli_query($db, $query) or die(mysqli_error($db));
// $query = "SELECT * FROM profesor;";
// $resultado2 = mysqli_query($db, $query) or die(mysqli_error($db));
// $query = "SELECT * FROM alumno;";
// $resultado3 = mysqli_query($db, $query) or die(mysqli_error($db));

?>

    <main class="admin gestionar">
        <div class="principal">
            <h2>Gestionar Administrador</h2>
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
                    <?php while( $administrador = mysqli_fetch_assoc($resultado1) ): ?>
                        <tr>
                            <?php echo "<td> ${administrador['nombre']} ${administrador['apellidoPaterno']} ${administrador['apellidoMaterno']}</td>"; ?>
                            <?php echo "<td> ${administrador['correo']}</td>"; ?>
                            <?php echo "<td> N/A </td>"; ?>
                            <?php echo "<td> Administrador </td>"; ?>
                            <?php echo "<td> N/A </td>"; ?>
                            <?php echo "<td> ${administrador['numEmpleado']}</td>"; ?>
                            <?php echo "<td> ${administrador['clave']}</td>"; ?>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </main>

<?php
include "footer.php";
?>