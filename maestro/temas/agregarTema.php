<?php

    include "../../src/php/conectarDB.php";
    $db = conectarDb();

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    
    //validar
    $errores = [];

    $nombre='';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];

        if (!$nombre) {
            $errores[] = 'Debes agregar un nombre';
        }
        // El array de errores esta vacio
        if (empty($errores)) {
            $query = "INSERT INTO tema (nombre, curso_idCurso) VALUES ('$nombre', '1')";
            echo $query;
            $resultado = mysqli_query($db, $query) or die(mysqli_error($db));
            if ($resultado) {
                header('location: /maestro/bloqueUno.php?mensaje=1');
            }
        }
    }

?>