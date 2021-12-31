<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Actividad 1</title>
    <style>
        :root {
            --negro: black;
            --blanco: white;
            --azul: #1a76a4;
            --azul-transparente: #1a76a44a;
            --azul-darken: #0c3a52;
            --verde: #77dd77;
            --rojo: #ff6961;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html {
            font-family: sans-serif;
            font-size: 62.5%;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        h1 {
            font-size: 2.5rem;
        }
        h2 {
            font-size: 2rem;
        }
        input,
        select {
            margin-bottom: 10px;
            padding: 10px;
            font-size: 1.6rem;
        }
        label {
            font-size: 1.6rem;
            text-align: start;
            margin-bottom: 10px;
        }
        button {
            width: 80%;
            padding: 10px;
            background-color: var(--azul);
            font-family: inherit;
            color: var(--blanco);
            font-size: 1.6rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin: 20px auto;
        }
        button:hover {
            background-color: var(--azul-darken);
        }
        button:disabled {
            background-color: gray;
            cursor: auto;
        }
        /* header */
        header {
            display: flex;
            padding: 20px;
            justify-content: space-between;
            align-items: center;
            background-color: var(--azul-transparente) ;
        }
        header .logo {
            width: 100px;
        }
        header .logo img {
            width: 100%;
            object-fit: cover;
        }
        .pregunta {
            margin: 0 auto;
            margin-top: 20px;
            border: 1px solid var(--azul);
            width: 80%;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .pregunta img {
            width: 50%;
            margin: 10px auto;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="/src/assets/escudoESCOM.png" alt="Logo">
        </div>
        <div class="titulo">
            <h1>Registrar nueva actividad</h1>
        </div>
    </header>
    <?php 
    require '../../src/php/conectarDB.php';
    $db = conectarDb();
    $query = "SELECT * FROM tema";
    $res = mysqli_query($db, $query) or die(mysqli_error($db));
    ?>
    <form method="POST" action="agregarActividad.php" > 
        <div class="pregunta">
            <label for="pregunta">Pregunta:</label>
            <input type="text" name="pregunta" id="pregunta" required>
            <label for="a">Opción a:</label>
            <input type="text" name="a" id="a" required>
            <label for="b">Opción b:</label>
            <input type="text" name="b" id="b" required>
            <label for="c">Opción c:</label>
            <input type="text" name="c" id="c" required>
            <label for="correcta">Opción correcta:</label>
            <input type="text" name="correcta" id="correcta" required>
            <label for="tema">Tema:</label>
            <select name="tema" id="tema">
            <?php while( $tema = mysqli_fetch_assoc($res) ): ?>
                <option value="<?php echo $tema['idTema']; ?>"><?php echo $tema['nombre']; ?></option>
            <?php endwhile; ?>
            </select>
        </div>
        <button type="submit">Agregar Actividad</button>
    </form>
</body>
</html>