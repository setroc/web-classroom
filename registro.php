<?php

    include "./src/php/conectarDB.php";
    $db = conectarDb();

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    
    //validar
    $errores = [];

    $nombre='';
    $apellidoPaterno = '';
    $apellidoMaterno = '';
    $correo = '';
    $correoSecundario = '';
    $password = '';
    $boleta = '';
    $nombreTutor = '';
    $telefono = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $correo = $_POST['correo'];
        $correoSecundario = $_POST['correoSecundario'];
        $password = $_POST['password'];
        $boleta = $_POST['boleta'];
        $nombreTutor = $_POST['nombreTutor'];
        $telefono = $_POST['telefono'];

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
        if (!$correoSecundario) {
            $errores[] = 'Debes agregar un Correo Secundario';
        }
        if (!$password) {
            $errores[] = 'Debes agregar una Contraseña';
        }
        if (!$boleta) {
            $errores[] = 'Debes agregar un Númmero de Boleta';
        }
        if (!$nombreTutor) {
            $errores[] = 'Debes agregar un Padre o Tutor';
        }
        if (!$telefono) {
            $errores[] = 'Debes agregar un Número Telefónico';
        }
        // El array de errores esta vacio
        if (empty($errores)) {
            $query = "INSERT INTO alumno (nombre, apellidoPaterno, apellidoMaterno, correo, correoSecundario, clave, boleta, nombreTutor, telefono, curso_idCurso) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$correo', '$correoSecundario', '$password', '$boleta', '$nombreTutor', '$telefono', '1')";
            echo $query;
            $resultado = mysqli_query($db, $query) or die(mysqli_error($db));
            if ($resultado) {
                header('location: /index.php');
            }
        }
    }

?>
<?php
include "header.php";
?>

    <main class="noLoggeado registro">
        <div class="principal">
            <h2>Registrarse</h2>

            <form  method="POST">
                <label for="nombre">Nombre:</label>
                <input value="<?php echo $nombre; ?>" type="text" name="nombre" id="nombre">
                <label for="apellidoPaterno">Apellido Paterno:</label>
                <input value="<?php echo $apellidoPaterno; ?>" type="text" name="apellidoPaterno" id="apellidoPaterno">
                <label for="apellidoMaterno">Apellido Materno:</label>
                <input value="<?php echo $apellidoMaterno; ?>" type="text" name="apellidoMaterno" id="apellidoMaterno">
                <label for="correo">Correo:</label>
                <input value="<?php echo $correo; ?>" type="email" name="correo" id="correo">
                <label for="correoSecundario">Correo Secundario:</label>
                <input value="<?php echo $correoSecundario; ?>" type="email" name="correoSecundario" id="correoSecundario">
                <label for="password">Contraseña:</label>
                <input value="" type="password" name="password" id="password">
                <label for="boleta">Número de Boleta:</label>
                <input value="<?php echo $boleta; ?>" type="number" name="boleta" id="boleta">
                <label for="nombreTutor">Nombre de Padre o Tutor:</label>
                <input value="<?php echo $nombreTutor; ?>" type="text" name="nombreTutor" id="nombreTutor">
                <label for="telefono">Número de telefono:</label>
                <input value="<?php echo $telefono; ?>" type="number" name="telefono" id="telefono">

                <button style="margin: 15px 0;" type="submit">Registrarse</button>
            </form>
        </div>
    </main>

<?php
include "footer.php";
?>