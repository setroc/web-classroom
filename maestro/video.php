<?php
include "header.php";

require '../src/php/conectarDB.php';
$db = conectarDb();
$query = "SELECT a.idMaterial, a.nombre, a.archivo, b.nombre AS tema FROM material AS a JOIN tema AS b ON a.tema_idTema = b.idTema WHERE a.tipo=1; ";
$resultado = mysqli_query($db, $query) or die(mysqli_error($db));

$query = "SELECT * from tema;";
$resultado2 = mysqli_query($db, $query) or die(mysqli_error($db));
$mensaje = $_GET['mensaje'] ?? null;
$id = $_GET['id'] ?? null;
?>

    <main class="maestro gestionar">
        <div class="principal">
            <h2>Videos</h2>
            <?php
                if ($mensaje == 1) {
                    echo '<p class="alerta exito">Video Creado Correctamente</p>';
                }
                if ($mensaje == 2) {
                    echo '<p class="alerta exito">Video Actualizado Correctamente</p>';
                }
                if ($mensaje == 3) {
                    echo '<p class="alerta exito">Video Eliminado Correctamente</p>';
                }
            ?>
            <div class="informacion">
                <table>
                    <tr>
                        <th>Nombre del video</th>
                        <th>URL</th>
                        <th>Tema</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php while( $material = mysqli_fetch_assoc($resultado) ): ?>
                        <tr>
                            <?php echo "<td> ${material['nombre']}</td>"; ?>
                            <?php echo "<td><a href=".$material['archivo']."> ${material['archivo']} </a></td>"; ?>
                            <?php echo "<td> ${material['tema']}</td>"; ?>
                            <td style="text-align: center; cursor: pointer;"><a href="/maestro/video.php?id=<?php echo $material['idMaterial'];?>">✏️</a></td>
                            <td style="text-align: center; cursor: pointer;"><a href="/maestro/videos/eliminarVideo.php?id=<?php echo $material['idMaterial'];?>">❌</a></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <div class="add <?php if($id) echo 'none'; ?>" id="add">
                +
            </div>

            <div class="modal none" id="modal">
                <div class="contenido">
                    <h2>Registrar Video</h2>
                    <form  method="POST" action="/maestro/videos/agregarVideo.php">
                        <label for="nombre">Nombre del video:</label>
                        <input value="" type="text" name="nombre" id="nombre" required>
                        <label for="archivo">URL del video:</label>
                        <input value="" type="text" name="archivo" id="archivo" required>
                        <label for="tema">Tema:</label>
                        <select name="tema" id="tema">
                            <option value="0">Seleccione:</option>
                            <?php while( $tema = mysqli_fetch_assoc($resultado2) ): ?>
                                <?php echo '<option value="'.$tema['idTema'].'">'.$tema['nombre'].'</option>'; ?>
                            <?php endwhile; ?>
                        </select>

                        <button style="margin: 15px 0;" type="submit">Agregar Video</button>
                    </form>
                </div>
            </div>

            <div class="modal <?php if(!$id) echo 'none'; ?>" id="modal">
                <div class="contenido">
                    <h2>Editar Video</h2>
                    <form  method="POST" action="/maestro/videos/editarVideo.php?id=<?php echo $id; ?>">
                        <?php 
                        $query = "SELECT nombre, archivo from material WHERE idMaterial = '$id'";
                        $resultado = mysqli_query($db, $query) or die(mysqli_error($db));
                        $query = "SELECT * from tema;";
                        $resultado2 = mysqli_query($db, $query) or die(mysqli_error($db));
                        while($val =  mysqli_fetch_assoc($resultado) ) : ?>
                            <label for="nombre">Nombre del video:</label>
                            <input value="<?php echo $val['nombre']; ?>" type="text" name="nombre" id="nombre" required>
                            <label for="archivo">URL del video:</label>
                            <input value="<?php echo $val['archivo']; ?>" type="text" name="archivo" id="archivo" required>
                            <label for="tema">Tema:</label>
                            <select name="tema" id="tema">
                                <option value="0">Seleccione:</option>
                                <?php while( $tema = mysqli_fetch_assoc($resultado2) ):?>
                                    <option value="<?php echo $tema['idTema'] ?>"><?php echo $tema['nombre'] ?></option>
                                <?php endwhile; ?>
                            </select>

                            <button style="margin: 15px 0;" type="submit">Editar Video</button>
                        <?php endwhile; ?>
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
        })
    </script>

<?php
include "footer.php";
?>