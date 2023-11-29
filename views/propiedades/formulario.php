<fieldset>
            <legend>Información General</legend>
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" placeholder="Titulo Propiedad" name="propiedad[Titulo]" value="<?php echo sanizitar ($propiedad->titulo); ?>">
            
            <label for="precio">Precio</label>
            <input type="number" id="precio" placeholder="Precio propiedad" name="propiedad[precio]" value="<?php echo sanizitar ($propiedad->precio); ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg , image/png" name="propiedad[imagen]">

            <?php  if ($propiedad->imagen):  ?>
                <img src="/imagenes/<?php echo $propiedad -> imagen ?>" alt="" class="imagen-tabla">

            <?php endif;  ?>

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="propiedad[descripcion]"><?php echo htmlspecialchars($propiedad->descripcion); ?></textarea>
            
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones: </label>
            <input type="number" id="habitaciones" placeholder="Ej:3" min="1" max="10" name="propiedad[habitaciones]" value="<?php echo sanizitar ($propiedad->habitaciones); ?>">

            <label for="wc">Baños: </label>
            <input type="number" id="wc" placeholder="Ej:2" min="1" max="10" name="propiedad[wc]" value="<?php echo sanizitar ($propiedad->wc); ?>">

            <label for="estacionamiento">Estacionamientos: </label>
            <input type="number" id="estacionamiento" placeholder="Ej:3" min="1" max="10" name="propiedad[estacionamiento]" value="<?php echo sanizitar ($propiedad->estacionamiento); ?>">

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <label for="vendedor">Vendedor</label>
            <select name="propiedad[vendedores]" id = "vendedor">
            <option select value="">--Selecciona--</option>
                <?php foreach ($vendedores as $vendedor) { ?>
                
                    <option 
                    <?php echo $propiedad->vendedores_id == $vendedor->id ? 'selected ': ''; ?>
                    value=" <?php echo sanizitar($vendedor->id); ?>">  <?php echo sanizitar($vendedor->nombre). " ". sanizitar($vendedor->apellido); ?></option>
                    
                <?php } ?>

            </select>
        </fieldset>