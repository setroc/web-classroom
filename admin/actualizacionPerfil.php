<?php
include "header.php";
?>
<?php
require '../src/php/conectarDB.php';
$db = conectarDb();

$correo = $_SESSION['correo'];
$query = "SELECT * FROM administrador WHERE correo = '${correo}'";
$resultado = mysqli_query($db, $query) or die(mysqli_error($db));

// Validar la URL 
$mensaje = $_GET['mensaje'] ?? null;

//validación
$errores = [];

$nombre='';
$apellidoPaterno = '';
$apellidoMaterno = '';
$correo = '';
$password = '';
$numEmpleado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $numEmpleado = $_POST['numEmpleado'];

    if (!$nombre) {
        $errores[] = 'Debes agregar un nombre';
    }
    if (!$apellidoPaterno) {
        $errores[] = 'Debes agregar un Apellido Paterno';
    }
    if (!$apellidoMaterno) {
        $errores[] = 'Debes agregar un Apellido Materno';
    }
    if (!$correo) {
        $errores[] = 'Debes agregar un Correo';
    }
    if (!$password) {
        $errores[] = 'Debes agregar una Contraseña';
    }
    if (!$numEmpleado) {
        $errores[] = 'Debes agregar un Númmero de Empleado';
    }
    // El array de errores esta vacio
    if (empty($errores)) {
        $query = "UPDATE administrador SET nombre='${nombre}', apellidoPaterno='${apellidoPaterno}', apellidoMaterno='${apellidoMaterno}', correo='${correo}', clave='${password}', numEmpleado='${numEmpleado}' WHERE correo='${correo}'";
        echo $query;
        $resultado2 = mysqli_query($db, $query) or die(mysqli_error($db));
        if ($resultado) {
            header('location: /admin/actualizacionPerfil.php?mensaje=1');
        }
    }
}

?>
    <main class="admin actualizacion">
        <div class="principal">
            <h2>Actualización perfil</h2>
            <?php foreach ($errores as $error) : ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>
            <?php
                if ($mensaje == 1) {
                    echo '<p class="alerta exito">Datos Modificados Correctamente</p>';
                }
            ?>
            <form  method="POST" id="modificarPerfilAdmin" disable>
                <?php while( $administrador = mysqli_fetch_assoc($resultado) ): ?>
                    <label for="nombre">Nombre:</label>
                    <input disabled="true" value="<?php echo $administrador['nombre']; ?>" type="text" name="nombre" id="nombre">
                    <label for="apellidoPaterno">Apellido Paterno:</label>
                    <input disabled="true" value="<?php echo $administrador['apellidoPaterno']; ?>" type="text" name="apellidoPaterno" id="apellidoPaterno">
                    <label for="apellidoMaterno">Apellido Materno:</label>
                    <input disabled="true" value="<?php echo $administrador['apellidoMaterno']; ?>" type="text" name="apellidoMaterno" id="apellidoMaterno">
                    <label for="correo">Correo:</label>
                    <input disabled="true" value="<?php echo $administrador['correo']; ?>" type="email" name="correo" id="correo">
                    <label for="password">Contraseña:</label>
                    <input disabled="true" value="<?php echo $administrador['clave']; ?>" type="text" name="password" id="password">
                    <label for="numEmpleado">Número de empleado:</label>
                    <input disabled="true" value="<?php echo $administrador['numEmpleado']; ?>" type="number" name="numEmpleado" id="numEmpleado">
                <?php endwhile; ?>

                <button id="modificar" type="button" onclick="habilitarInputs()">Modificar datos</button>
                <button id="submit" type="submit" disabled>Guardar Datos</button>

            </form>
        </div>
    </main>

    <script>
        function habilitarInputs() {
            document.querySelector('#modificar').disabled = true;
            document.querySelector('#submit').disabled = false;
            const inputs = document.querySelectorAll('input');
            Array.from(inputs).forEach(input=>{
                input.disabled = false;
            })
        }
    </script>
<?php
include "footer.php";
?>