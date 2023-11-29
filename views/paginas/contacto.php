<main class="contenedor seccion">
        <h1>Contacto</h1>

        <?php
        
            if($mensaje){?>

                <p class = "alerta exito"> <?php echo $mensaje; ?></p>
            
        <?php } ?>


        <picture>
            <source srcset="build/img/destacada3.webp" type = "image/webp">
            <source srcset="build/img/destacada3.jpg" type = "image/jpeg">
            <img loading="lazy" scrset="build/img/destacada3.jpg" alt="texto-entrada">
        </picture>
        <h2>Llena el formulario de contacto</h2>
        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" require>

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="contacto[mensaje]" require></textarea>

            </fieldset>

            <fieldset>
                <legend>Información Sobre la Propiedad</legend>
                <label for="opciones">Vende o Compra:</label>
                <select id="opciones" name="contacto[tipo]" require>
                    <option value="" disabled selected>--Seleciona--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="tu precio o presupuesto" id="presupuesto" name="contacto[presupuesto]" require>

            </fieldset>
            <fieldset>
                <legend>Contacto</legend>
                <a>Como desea ser contactado</a>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" value="telefono" id="contactar-telefono"  name="contacto[contacto]" require>

                    <label for="contactar-email">E-mail</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" require>
                </div>

                <div id="contacto">


                </div>


            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>