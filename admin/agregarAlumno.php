<?php

    include "../src/php/conectarDB.php";
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
                header('location: ./admin/gestionarAlumno.php?mensaje=1');
            }
        }
    }

?>