<main class="contenedor seccion">
     <h1> Crear Usuario </h1>
     <a href="/admin" class="boton-verde">Volver</a>
     <?php foreach($errores as $error): ?> 
        <div class="alerta error">

        <?php echo $error; ?>
        </div>
        
     <?php endforeach; ?> 

     <form class="formulario" method="POST" action="" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Crear Usuario" class="boton boton-verde">
     </form>
</main>
 