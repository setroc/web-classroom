<?php
include "../../src/php/conectarDB.php";
$db = conectarDb();

echo "<pre>";
var_dump($_POST);
echo "</pre>";

//validar
$errores = [];

$pregunta='';
$a='';
$b='';
$c='';
$correcta='';
$tema='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pregunta=$_POST['pregunta'];
    $a=$_POST['a'];
    $b=$_POST['b'];
    $c=$_POST['c'];
    $correcta=$_POST['correcta'];
    $tema=$_POST['tema'];

    if (!$pregunta) {
        $errores[] = 'Debes agregar una pregunta';
    }
    if (!$a) {
        $errores[] = 'Debes agregar una respuesta a';
    }
    if (!$b) {
        $errores[] = 'Debes agregar una respuesta b';
    }
    if (!$c) {
        $errores[] = 'Debes agregar una respuesta c';
    }
    if (!$correcta) {
        $errores[] = 'Debes agregar una respuesta correcta';
    }
    if (!$tema) {
        $errores[] = 'Debes agregar un tema';
    }
    // El array de errores esta vacio
    if (empty($errores)) {
        $query = "insert into ejercicio (pregunta,a,b,c,correcta,tema_idTema) values ('$pregunta', '$a','$b','$c','$correcta','$tema');";
        echo $query;
        $resultado = mysqli_query($db, $query) or die(mysqli_error($db));
        if ($resultado) {
            header('location: /maestro/actividad.php?mensaje=1');
        }
    }
}
?>