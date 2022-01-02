<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Actividad</title>
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
            <h1>Tema: La Decena</h1>
        </div>
    </header>
    <?php 
    $id = $_GET['id'] ?? null;
    require '../../src/php/conectarDB.php';
    $db = conectarDb();
    $query = "SELECT * FROM ejercicio WHERE idEjercicio='${id}'";
    $res = mysqli_query($db, $query) or die(mysqli_error($db));
    ?>
    <form method="POST" action="validarActividad.php?id=<?php echo $id; ?>">
        <div class="pregunta">
        <?php while( $ejercicio = mysqli_fetch_assoc($res) ): ?>
            <h2><?php echo $ejercicio['pregunta']; ?>:</h2>
            <?php if($id<=4) echo "<img src='/src/assets/$id.png' alt='imagen'>"; ?>
            <select name="uno" id="uno">
                <option value="<?php echo $ejercicio['a']; ?>"><?php echo $ejercicio['a']; ?></option>
                <option value="<?php echo $ejercicio['b']; ?>"><?php echo $ejercicio['b']; ?></option>
                <option value="<?php echo $ejercicio['c']; ?>"><?php echo $ejercicio['c']; ?></option>
            </select>
        <?php endwhile; ?>
        </div>
        <button type="submit">Terminar Actividad</button>
    </form>
</body>
</html>