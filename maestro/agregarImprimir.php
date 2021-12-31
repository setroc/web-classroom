<?php

    include "../src/php/conectarDB.php";
    $db = conectarDb();

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    
    //validar
    $errores = [];

    $nombre='';
    $archivo='';
    $tema='';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $archivo = $_POST['archivo'];
        $tema = $_POST['tema'];

        if (!$nombre) {
            $errores[] = 'Debes agregar un nombre';
        }
        if (!$archivo) {
            $errores[] = 'Debes agregar un URL';
        }
        if (!$tema) {
            $errores[] = 'Debes agregar un tema';
        }
        // El array de errores esta vacio
        if (empty($errores)) {
            $query = "INSERT INTO material (nombre, archivo, tipo, tema_idTema) VALUES ('$nombre', '$archivo', '2', '$tema')";
            echo $query;
            $resultado = mysqli_query($db, $query) or die(mysqli_error($db));
            if ($resultado) {
                header('location: /maestro/imprimir.php?mensaje=1');
            }
        }
    }

?>