<?php

    include "../../src/php/conectarDB.php";
    $db = conectarDb();

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    
    //validar
    $errores = [];

    $id = $_GET['id'] ?? null;

    if (empty($errores)) {
        $query = "DELETE FROM material WHERE idMaterial = '${id}' ";
        echo $query;
        $resultado = mysqli_query($db, $query) or die(mysqli_error($db));
        if ($resultado) {
            header('location: /maestro/imprimir.php?mensaje=3');
        }
    }

?>