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
    $password = '';
    $empleado = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $empleado = $_POST['empleado'];

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
        if (!$empleado) {
            $errores[] = 'Debes agregar un Númmero de Empleado';
        }
        // El array de errores esta vacio
        if (empty($errores)) {
            $query = "INSERT INTO administrador (nombre, apellidoPaterno, apellidoMaterno, correo, clave, numEmpleado) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$correo', '$password', '$empleado')";
            echo $query;
            $resultado = mysqli_query($db, $query) or die(mysqli_error($db));
            if ($resultado) {
                header('location: ./admin/gestionarAdministrador.php?mensaje=1');
            }
        }
    }

?>