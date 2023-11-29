<main class="contenedor seccion">
     <h1> Administrador Bienes Raices</h1>
     <?php 
        if ($registrado) {
            $mensaje = mostrarNotificacion(intval($registrado));
          if ($mensaje) {  ?>
               <p class="alerta exitosa"><?php echo sanizitar($mensaje); ?></p>
     
            <?php } ?>
     <?php } ?>
          

     <h3>Para crear un nuevo anuncio da clic en el Boton:</h3>
     <a href="/propiedades/crear" class="boton-verde">Nueva Propiedad</a>
     <a href="/vendedores/crear" class="boton-verde">Nuevo Vendedor</a>
     <a href="/blog/crear" class="boton-verde">Nueva entrada de blog</a>
     <a href="/users/crear" class="boton-verde">Nuevo usuario</a>
     <h2>Propiedades</h2>       
     <table class="propiedades">
          <thead>
               <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
               </tr>
          </thead>
          <tbody>
          <?php foreach($propiedades as $propiedad):?>
               <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad-> imagen; ?>" class="imagen-tabla"></td>
                    <td>$<?php echo number_format ($propiedad-> precio); ?></td>
                    <td>
                         <div class="botones">
                              <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-verde-block cuadrar">Actualizar</a>
                              <form method="POST" action="/propiedades/eliminar" >
                                   <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                   <input type="hidden" name="tipo" value="propiedad">
                                   <input type="submit" class="boton-rojo-block cuadrar" value="Eliminar">
                              </form>
                         </div>
                    </td>
               </tr>
          <?php endforeach;?>
          </tbody>
     </table>
     <h2>Vendedores</h2>

     <table class="propiedades">
          <thead>
               <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Celular</th>
                    <th>Acciones</th>
               </tr>
          </thead>
          <tbody>
          <?php foreach($vendedores as $vendedor):?>
               <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre. " ".$vendedor->apellido; ?></td>
                    <td><img src="/imagenes/<?php echo $vendedor-> imagen; ?>" class="imagen-tabla"></td>
                    <td><?php echo $vendedor-> celulares; ?></td>
                 
                    <td>
                         <div class="botones">
                              <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-verde-block cuadrar">Actualizar</a>
                              <form method="POST" action="/vendedores/eliminar">
                                   <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                   <input type="hidden" name="tipo" value="vendedor">
                                   <input type="submit" class="boton-rojo-block cuadrar" value="Eliminar">
                              </form>
                         </div>
                    </td>
               </tr>
          <?php endforeach;?>
          </tbody>
     </table>

     <h2>Entradas Blog</h2>

     <table class="propiedades">
          <thead>
               <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Escritor</th>
                    <th>Acciones</th>
               </tr>
          </thead>
          <tbody>
          <?php foreach($blogs as $blog):?>
               <tr>
                    <td><?php echo $blog->id; ?></td>
                    <td><?php echo $blog->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $blog-> imagen; ?>" class="imagen-tabla"></td>
                    <td><?php echo $blog-> escritor; ?></td>
                 
                    <td>
                         <div class="botones">
                              <a href="/blog/actualizar?id=<?php echo $blog->id; ?>" class="boton-verde-block cuadrar">Actualizar</a>
                              <form method="POST" action="/blog/eliminar">
                                   <input type="hidden" name="id" value="<?php echo $blog->id; ?>">
                                   <input type="hidden" name="tipo" value="blog">
                                   <input type="submit" class="boton-rojo-block cuadrar" value="Eliminar">
                              </form>
                         </div>
                    </td>
               </tr>
          <?php endforeach;?>
          </tbody>
     </table>


</main>