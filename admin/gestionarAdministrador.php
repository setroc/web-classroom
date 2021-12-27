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

// Validar la URL 
$mensaje = $_GET['mensaje'] ?? null;
?>

    <main class="admin gestionar">
        <div class="principal">
            <h2>Gestionar Administrador</h2>
            <?php
                if ($mensaje == 1) {
                    echo '<p class="alerta exito">Administrador Creado Correctamente</p>';
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
            <div class="add" id="add">
                +
            </div>

            <div class="modal none" id="modal">
                <div class="contenido">
                    <h2>Registrar Maestro</h2>
                    <form  method="POST" action="agregarAdministrador.php">
                        <label for="nombre">Nombre:</label>
                        <input value="" type="text" name="nombre" id="nombre">
                        <label for="apellidoPaterno">Apellido Paterno:</label>
                        <input value="" type="text" name="apellidoPaterno" id="apellidoPaterno">
                        <label for="apellidoMaterno">Apellido Materno:</label>
                        <input value="" type="text" name="apellidoMaterno" id="apellidoMaterno">
                        <label for="correo">Correo:</label>
                        <input value="" type="email" name="correo" id="correo">
                        <label for="password">Contraseña:</label>
                        <input value="" type="password" name="password" id="password">
                        <label for="empleado">Número de Empleado:</label>
                        <input value="" type="number" name="empleado" id="empleado">
    
                        <button style="margin: 15px 0;" type="submit">Agregar Maestro</button>
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