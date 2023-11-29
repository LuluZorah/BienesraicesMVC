<?php foreach($blogs as $blog) { ?>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                <img loading="lazy" srcset="imagenes/<?php echo $blog -> imagen; ?>" alt="anuncio3" class="arreglo-imagen">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/entrada?id=<?php echo $blog -> id; ?>"> <h4><?php echo $blog -> titulo; ?></h4></a>
                <p>Escrito el: <span><?php echo $blog -> fecha; ?></span> por: <span><?php echo $blog -> escritor; ?></span> </p>
                <p><?php echo $blog -> resumen; ?></p>
            </div>

        </article>
        <?php } ?>