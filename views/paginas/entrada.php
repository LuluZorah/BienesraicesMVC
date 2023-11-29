<main class="contenedor seccion contenido-centrado">
        <h1><?php echo $blog -> titulo; ?></h1>

        <section >
            <div class="anuncio-casa">
                <img loading="lazy" srcset="imagenes/<?php echo $blog -> imagen; ?>" alt="anuncio3" >
                <p class="informacion-meta">Escrito el: <span><?php echo $blog -> fecha; ?></span> por: <span><?php echo $blog -> escritor; ?></span> </p>    
                <p><?php echo $blog -> descripcion; ?></p>
                
        </div>   
    </section>
    </main>