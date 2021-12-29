<?php
require './src/php/conectarDB.php';
$db = conectarDb();

$errores = [];
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clave = $_POST['password'];
    $correo = $_POST['correo'];
    $tipo = $_POST['tipo'];

    if ($tipo == "administrador") {
        $query = "SELECT * FROM administrador WHERE correo = '${correo}'";
        $resultado = mysqli_query($db,$query) or die(mysqli_error($db));
        $row = mysqli_fetch_array($resultado);

        if ( $row != NULL ) {
            if ($row['clave'] == $clave) { //comprobar contraseña
                session_start();
                $_SESSION['nombre']  = $row['nombre'];
                $_SESSION['correo']  = $correo;
                header("Location: /admin/index.php");
                die();
            } else {
                $errores[] = 'Contraseña o correo incorrecto';
            }
        }else {
            $errores[] = 'Correo o contraseña incorrecto';
        }
    } 
    else if ( $tipo == "profesor") {
        $query = "SELECT * FROM profesor WHERE correo = '${correo}'";
        $resultado = mysqli_query($db,$query) or die(mysqli_error($db));
        $row = mysqli_fetch_array($resultado);

        if ( $row != NULL ) {
            if ($row['clave'] == $clave) { //comprobar contraseña
                session_start();
                $_SESSION['nombre']  = $row['nombre'];
                $_SESSION['correo']  = $correo;
                header("Location: /maestro/index.php");
                die();
            } else {
                $errores[] = 'Contraseña o correo incorrecto';
            }
        }else {
            $errores[] = 'Correo o contraseña incorrecto';
        }
    } else if ($tipo == "alumno") {
        $query = "SELECT * FROM alumno WHERE correo = '${correo}'";
        $resultado = mysqli_query($db,$query) or die(mysqli_error($db));
        $row = mysqli_fetch_array($resultado);

        if ( $row != NULL ) {
            if ($row['clave'] == $clave) { //comprobar contraseña
                session_start();
                $_SESSION['nombre']  = $row['nombre'];
                $_SESSION['correo']  = $correo;
                header("Location: /alumno/index.php");
                die();
            } else {
                $errores[] = 'Contraseña o correo incorrecto';
            }
        }else {
            $errores[] = 'Correo o contraseña incorrecto';
        }
    }
}
?>
<aside class="loggin">
            <div class="titulo">
                <h2>Inicio de sesión</h2>
            </div>
            <form method="POST">
                <?php foreach ($errores as $error) : ?>
                    <div class="alerta error" style="margin-bottom: 10px;">
                        <?php echo $error; ?>
                    </div>
                <?php endforeach; ?>
                <label for="correo">Correo</label>
                <input type="email" name="correo" id="correo" placeholder="correo@correo.com" required>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="******" required>
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo">
                    <option value="alumno">Alumno</option>
                    <option value="profesor">Profesor</option>
                    <option value="administrador">Administrador</option>
                </select>
                <button type="submit">Iniciar sesión</button>
            </form>
            <div class="informacion">
                <p><a href="/registro.php">Registrarse</a></p>
                <p><a href="#">¿Se te olvido la contraseña?</a></p>
                <p id="fecha">06/12/2021 19:35</p>
            </div>
        </aside>