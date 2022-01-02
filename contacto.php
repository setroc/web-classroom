<?php
include "header.php";
?>

    <main class="noLoggeado">
        <div class="principal contacto">
            <h2>Contacto</h2>
            
            <form method="POST" action="/index.php">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
                <label for="asunto">Asunto</label>
                <input type="text" name="asunto" id="asunto" required>
                <label for="descripcion">Descripcion</label>
                <textarea name="descipcion" id="descripcion" cols="30" rows="10" required></textarea>
                <div>
                    <button type="reset">Limpiar</button>
                    <button type="reset">Enviar</button>
                </div>
            </form>
        </div>
        </div>
        <?php
        include "login.php";
        ?>
    </main>

<?php
include "footer.php";
?>