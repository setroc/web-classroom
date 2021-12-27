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

$mensaje = $_GET['mensaje'] ?? null;
?>

    <main class="admin gestionar">
        <div class="principal">
            <h2>Gestionar Alumno</h2>
            <?php
                if ($mensaje == 1) {
                    echo '<p class="alerta exito">Alumno Creado Correctamente</p>';
                }
            ?>
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
            <div class="add" id="add">
                +
            </div>

            <div class="modal none" id="modal">
                <div class="contenido">
                    <h2>Registrar Alumno</h2>
                    <form  method="POST" action="agregarAlumno.php">
                        <label for="nombre">Nombre:</label>
                        <input value="" type="text" name="nombre" id="nombre" required>
                        <label for="apellidoPaterno">Apellido Paterno:</label>
                        <input value="" type="text" name="apellidoPaterno" id="apellidoPaterno" required>
                        <label for="apellidoMaterno">Apellido Materno:</label>
                        <input value="" type="text" name="apellidoMaterno" id="apellidoMaterno" required>
                        <label for="correo">Correo:</label>
                        <input value="" type="email" name="correo" id="correo" required>
                        <label for="correoSecundario">Correo Secundario:</label>
                        <input value="" type="email" name="correoSecundario" id="correoSecundario" required>
                        <label for="password">Contraseña:</label>
                        <input value="" type="password" name="password" id="password" required>
                        <label for="boleta">Número de Boleta:</label>
                        <input value="" type="number" name="boleta" id="boleta" required>
                        <label for="nombreTutor">Nombre de Padre o Tutor:</label>
                        <input value="" type="text" name="nombreTutor" id="nombreTutor" required>
                        <label for="telefono">Número de telefono:</label>
                        <input value="" type="number" name="telefono" id="telefono" required>

                        <button style="margin: 15px 0;" type="submit">Agregar Alumno</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        const add = document.querySelector('#add');
        const modal = document.querySelector('#modal');
        add.addEventListener('click', ()=>{
            if ( modal.classList.contains('none') ) {
                modal.classList.remove('none');
                add.textContent = 'x';
            } else  {
                modal.classList.add('none');
                add.textContent = '+';
            }
        })
    </script>

<?php
include "footer.php";
?>