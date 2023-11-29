<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad -> titulo; ?></h1>

        <section >
            <div class="anuncio-info">

                <img loading="lazy" srcset="imagenes/<?php echo $propiedad-> imagen; ?>" alt="anuncio3" class="arreglo-imagen">

                <div class="contenido-anuncio">
                    <p class="precio"> Precio: <?php echo number_format ($propiedad -> precio); ?></p>
                </div>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono-color" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad-> wc; ?></p>
                    </li>
                    <li>
                        <img class="icono-color" loading="lazy" src="build/img/icono_estacionamiento.svg" alt=" icono_estacionamiento">
                        <p><?php echo $propiedad -> estacionamiento; ?></p>
                    </li>
                    <li>
                        <img class="icono-color" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio">
                        <p><?php echo $propiedad -> habitaciones; ?></p>
                    </li>
                </ul>
                <p><?php echo $propiedad -> descripcion; ?></p>

                <div class="alinear-derecha">
                    <a href="anuncios.php" class="boton boton-verde">Volver</a>
                </div>
        </div>   
        </section>
    </main>