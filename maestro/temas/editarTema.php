<?php

    include "../../src/php/conectarDB.php";
    $db = conectarDb();

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    
    //validar
    $errores = [];

    $id = $_GET['id'] ?? null;
    $nombre='';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];

        if (!$nombre) {
            $errores[] = 'Debes agregar un nombre';
        }
        if (!$id) {
            $errores[] = 'Debes agregar un id';
        }
        // El array de errores esta vacio
        if (empty($errores)) {
            $query = "UPDATE tema SET nombre='${nombre}' WHERE idTema = '${id}'";
            echo $query;
            $resultado = mysqli_query($db, $query) or die(mysqli_error($db));
            if ($resultado) {
                header('location: ./maestro/bloqueUno.php?mensaje=2');
            }
        }
    }

?>