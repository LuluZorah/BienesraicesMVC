<?php
     
    
     use App\Propiedad;

     if ($_SERVER['SCRIPT_NAME'] === '/anuncios.php') {
        $propiedades = Propiedad::all();
     }else {
        $propiedades = Propiedad::get(3);
     }
     

?>


<div class="contenedor-anuncios">
        <?php foreach($propiedades as $propiedad) { ?>
            <div class="anuncio">
               
                <img loading="lazy" srcset="imagenes/<?php echo $propiedad -> imagen; ?>" alt="anuncio3" class="arreglo-imagen">
             
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad -> titulo; ?></h3>
                    <p><?php echo $propiedad  -> descripcion; ?></p>
                    <p class="precio">$<?php echo number_format ($propiedad -> precio ); ?></p>
                </div>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono-color" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad -> wc; ?></p>
                    </li>
                    <li>
                        <img class="icono-color" loading="lazy" src="build/img/icono_estacionamiento.svg" alt=" icono_estacionamiento">
                        <p><?php echo $propiedad -> estacionamiento; ?></p>
                    </li>
                    <li>
                        <img class="icono-color" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio">
                        <p><?php echo $propiedad  -> habitaciones; ?></p>
                    </li>
                </ul>

                <a href="/bienesraices/anuncios-casas.php?id=<?php echo $propiedad -> id; ?>" class=" botonar boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div>
        <?php } ?>
</div>

 
<?php
     //cerrar conexion
       mysqli_close($db);

 ?>