<?php
include "header.php";

require '../src/php/conectarDB.php';
$db = conectarDb();

// $query = "SELECT * FROM administrador;";
// $resultado1 = mysqli_query($db, $query) or die(mysqli_error($db));
// $query = "SELECT * FROM profesor;";
// $resultado2 = mysqli_query($db, $query) or die(mysqli_error($db));
$query = "SELECT a.idAlumno,a.nombre,a.apellidoPaterno,a.apellidoMaterno,a.correo,a.correoSecundario, a.telefono, a.boleta, c.nombre AS curso  FROM alumno AS a JOIN curso AS c ON a.curso_idCurso = c.idCurso WHERE idCurso = 1;";
$resultado3 = mysqli_query($db, $query) or die(mysqli_error($db));
    
?>

    <main class="maestro gestionar">
        <div class="principal">
            <h2>Gestionar Alumnos</h2>
            <div class="informacion">
                <table>
                    <tr>
                        <th>id</th>
                        <th>Nombre completo</th>
                        <th>Correo principal</th>
                        <th>Correo alterno</th>
                        <th>Teléfono</th>
                        <th>Boleta</th>
                        <th>Curso</th>
                    </tr>
                    <?php while( $alumno = mysqli_fetch_assoc($resultado3) ): ?>
                        <tr>
                            <?php echo "<td> ${alumno['idAlumno']} </td>"; ?>
                            <td><a href="../maestro/gestionar./alumno.php?id=<?php echo $alumno['idAlumno']; ?>"><?php echo $alumno['nombre']." ".$alumno['apellidoPaterno']." ".$alumno['apellidoMaterno'];?></a></td>
                            <!-- <?php echo "<td> ${alumno['nombre']} ${alumno['apellidoPaterno']} ${alumno['apellidoMaterno']}</td>"; ?> -->
                            <?php echo "<td> ${alumno['correo']}</td>"; ?>
                            <?php echo "<td> ${alumno['correoSecundario']}</td>"; ?>
                            <?php echo "<td> ${alumno['telefono']} </td>"; ?>
                            <?php echo "<td> ${alumno['boleta']}</td>"; ?>
                            <?php echo "<td> ${alumno['curso']}</td>"; ?>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </main>

<?php
include "footer.php";
?>