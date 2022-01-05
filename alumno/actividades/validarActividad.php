<?php 

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
session_start();
$id = $_GET['id'] ?? null;
require '../../src/php/conectarDB.php';
$db = conectarDb();
$query = "SELECT correcta FROM ejercicio WHERE idEjercicio='${id}'";
$res = mysqli_query($db, $query) or die(mysqli_error($db));
$idAlumno = $_SESSION['id'];
if ($id) {
    // echo "<pre>";
    // var_dump(mysqli_fetch_assoc($res)['correcta']);
    // echo "</pre>";
    // echo "<pre>";
    // var_dump($_POST['uno']);
    // echo "</pre>";
    $calificacion;
    if (mysqli_fetch_assoc($res)['correcta'] === $_POST['uno']) { //correcto
        // echo "<pre>";
        // var_dump('correcto');
        // echo "</pre>";
        $calificacion = 10;
    }else { //incorrecto
        // echo "<pre>";
        // var_dump('incorrecto');
        // echo "</pre>";
        $calificacion = 0;
        
    }
    $query = "INSERT INTO calificacion (calificacion, ejercicio_idEjercicio, alumno_idAlumno) VALUES ('$calificacion','$id','$idAlumno')";

    $res = mysqli_query($db, $query) or die(mysqli_error($db));
    if ($res) {
        header('location: ./alumno/actividad.php?mensaje=1');
    }
}

?>