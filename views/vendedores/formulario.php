<fieldset>
            <legend>Información General</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" placeholder="Nombre del vendedor" name="vendedor[nombre]" value="<?php echo sanizitar ($vendedor->nombre); ?>">
            
            <label for="Apellido">Apellido:</label>
            <input type="text" id="apellido" placeholder="Apellido del vendedor" name="vendedor[apellido]" value="<?php echo sanizitar ($vendedor->apellido); ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg , image/png" name="vendedor[imagen]">

            <?php  if ($vendedor-> imagen):  ?>
                <img src="/imagenes/<?php echo $vendedor -> imagen ?>" alt="" class="imagen-tabla">

            <?php endif;  ?>
            
            <label for="celular">Celular:</label>
            <input type="text" id="celular" placeholder="Celular del vendedor" name="vendedor[celulares]" value="<?php echo sanizitar($vendedor->celulares); ?>">
</fieldset>