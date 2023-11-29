<main class="contenedor seccion">
        <h1>Iniciar Sesión</h1>
      
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;  ?>

            </div>
        <?php endforeach; ?>
        <form class="formulario" method="POST" action="/login">
            <fieldset>
                <legend>Información Personal</legend>
               

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" id="email" name="email" >

                <label for="password">Contraseña</label>
                <input type="password" placeholder="Tu password" id="password" name="password">

              

        
            <input type="submit" value="Iniciar Sesión" class="boton-verde">
        </form>
    </main>