<?php
include "header.php";
?>
<?php
require '../src/php/conectarDB.php';
$db = conectarDb();

$correo = $_SESSION['correo'];
$query = "SELECT correoSecundario,nombreTutor, telefono FROM alumno WHERE correo = '${correo}'";
$resultado = mysqli_query($db, $query) or die(mysqli_error($db));

// Validar la URL 
$mensaje = $_GET['mensaje'] ?? null;

//validación
$errores = [];

$correoSecundario = '';
$nombreTutor = '';
$telefono = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correoSecundario = $_POST['correoSecundario'];
    $nombreTutor = $_POST['nombreTutor'];
    $telefono = $_POST['telefono'];

    if (!$correoSecundario) {
        $errores[] = 'Debes agregar un Correo Secundario';
    }
    if (!$nombreTutor) {
        $errores[] = 'Debes agregar un Nombre de Tutor';
    }
    if (!$telefono) {
        $errores[] = 'Debes agregar un Teléfono';
    }
    // El array de errores esta vacio
    if (empty($errores)) {
        $query = "UPDATE alumno SET correoSecundario='${correoSecundario}', nombreTutor='${nombreTutor}', telefono='${telefono}' WHERE correo='${correo}'";
        echo $query;
        $resultado2 = mysqli_query($db, $query) or die(mysqli_error($db));
        if ($resultado) {
            header('location: ./alumno/actualizacionPerfil.php?mensaje=1');
        }
    }
}

?>
    <main class="alumno actualizacion">
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
                <?php while( $alumno = mysqli_fetch_assoc($resultado) ): ?>
                    <label for="correoSecundario">Correo Secundario:</label>
                    <input disabled="true" value="<?php echo $alumno['correoSecundario']; ?>" type="text" name="correoSecundario" id="correoSecundario">
                    <label for="nombreTutor">Nombre de Padre o Tutor:</label>
                    <input disabled="true" value="<?php echo $alumno['nombreTutor']; ?>" type="text" name="nombreTutor" id="nombreTutor">
                    <label for="telefono">Teléfono:</label>
                    <input disabled="true" value="<?php echo $alumno['telefono']; ?>" type="text" name="telefono" id="telefono">
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