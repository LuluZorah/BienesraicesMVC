<main class="contenedor seccion">
     <h1> Registrar Vendedores </h1>
     <a href="/admin" class="boton-verde">Volver</a>
     <?php foreach($errores as $error): ?> 
        <div class="alerta error">

        <?php echo $error; ?>
        </div>
        
     <?php endforeach; ?> 

     <form class="formulario" method="POST" action="/vendedores/crear" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Resgistrar Vendedor" class="boton boton-verde">
     </form>
</main>
 