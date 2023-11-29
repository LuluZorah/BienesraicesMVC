<fieldset>
            <legend>Información General</legend>
            <label for="titulo">titulo:</label>
            <input type="text" id="titulo" placeholder="Titulo" name="blog[titulo]" value="<?php echo sanizitar ($blog->titulo); ?>">
            
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg , image/png" name="blog[imagen]">

            <?php  if ($blog-> imagen):  ?>
                <img src="/imagenes/<?php echo $blog -> imagen ?>" alt="" class="imagen-tabla">

            <?php endif;  ?>

            <label for="escritor">Escritor:</label>
            <input type="text" id="escritor" placeholder="Escritor del blog" name="blog[escritor]" value="<?php echo sanizitar(trim($blog->escritor)); ?>">

            <label for="descripcion">Texto del blog</label>
            <textarea id="descripcion"  placeholder="Texto del blog" name="blog[descripcion]"><?php echo htmlspecialchars(trim($blog->descripcion)); ?></textarea>

            <label for="resumen">Resumen del blog</label>
            <textarea id="resumen"  placeholder="Resumen del blog" name="blog[resumen]"><?php echo htmlspecialchars(trim($blog->resumen)); ?></textarea>

</fieldset>