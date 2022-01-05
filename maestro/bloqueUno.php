<?php
include "header.php";
require '../src/php/conectarDB.php';
$db = conectarDb();
$query = "SELECT idTema, nombre FROM tema";
$resultado = mysqli_query($db, $query) or die(mysqli_error($db));
$mensaje = $_GET['mensaje'] ?? null;
$id = $_GET['id'] ?? null;
// echo "<pre>";
// var_dump($id);
// echo "</pre>";
?>

    <main class="maestro gestionar">
        <div class="principal">
            <h2>Temario del Bloque Uno</h2>
            <?php
                if ($mensaje == 1) {
                    echo '<p class="alerta exito">Tema Creado Correctamente</p>';
                }
                if ($mensaje == 2) {
                    echo '<p class="alerta exito">Tema Actualizado Correctamente</p>';
                }
                if ($mensaje == 3) {
                    echo '<p class="alerta exito">Tema Eliminado Correctamente</p>';
                }
            ?>
            <div class="informacion">
                <table>
                    <tr>
                        <th>id</th>
                        <th>Tema</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php while( $tema = mysqli_fetch_assoc($resultado) ): ?>
                        <tr>
                            <?php echo "<td> ${tema['idTema']}</td>"; ?>
                            <?php echo "<td> ${tema['nombre']}</td>"; ?>
                            <td style="text-align: center; cursor: pointer;"><a href="../maestro/bloqueUno.php?id=<?php echo $tema['idTema'];?>">✏️</a></td>
                            <td style="text-align: center; cursor: pointer;"><a href="../maestro/temas/eliminarTema.php?id=<?php echo $tema['idTema'];?>">❌</a></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <div class="add <?php if($id) echo 'none'; ?>" id="add">
                +
            </div>

            <div class="modal none" id="modal">
                <div class="contenido">
                    <h2>Registrar Tema</h2>
                    <form  method="POST" action="../maestro/temas/agregarTema.php">
                        <label for="nombre">Nombre del tema:</label>
                        <input value="" type="text" name="nombre" id="nombre" required>

                        <button style="margin: 15px 0;" type="submit">Agregar Tema</button>
                    </form>
                </div>
            </div>
            <div class="modal <?php if(!$id) echo 'none'; ?>" id="modal">
                <div class="contenido">
                    <h2>Editar Tema</h2>
                    <form  method="POST" action="../maestro/temas/editarTema.php?id=<?php echo $id; ?>">
                        <?php 
                        $query = "SELECT nombre from tema WHERE idTema = '$id'";
                        $resultado2 = mysqli_query($db, $query) or die(mysqli_error($db));
                        echo '<label for="nombre">Nombre del tema:</label>';
                        while($val =  mysqli_fetch_assoc($resultado2) ) : 
                        echo '<input value="'.$val['nombre'].'" type="text" name="nombre" id="nombre" required>';
                        endwhile;
                        echo '<button style="margin: 15px 0;" type="submit">Editar Tema</button>';
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        const add = document.querySelector('#add');
        const modal = document.querySelector('#modal');
        add.addEventListener('click', ()=>{
            if ( modal.classList.contains('none') ) {
                modal.classList.remove('none');
                add.textContent = 'x';
            } else  {
                modal.classList.add('none');
                add.textContent = '+';
            }
        });
    </script>

<?php
include "footer.php";
?>