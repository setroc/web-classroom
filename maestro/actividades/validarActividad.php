<?php 

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

$id = $_GET['id'] ?? null;
require '../../src/php/conectarDB.php';
$db = conectarDb();
$query = "SELECT correcta FROM ejercicio WHERE idEjercicio='${id}'";
$res = mysqli_query($db, $query) or die(mysqli_error($db));
if ($id) {
    // echo "<pre>";
    // var_dump(mysqli_fetch_assoc($res)['correcta']);
    // echo "</pre>";
    // echo "<pre>";
    // var_dump($_POST['uno']);
    // echo "</pre>";
    if (mysqli_fetch_assoc($res)['correcta'] === $_POST['uno']) { //correcto
        echo "<pre>";
        var_dump('correcto');
        echo "</pre>";
    }else { //incorrecto
        echo "<pre>";
        var_dump('incorrecto');
        echo "</pre>";
        
    }

}

?>