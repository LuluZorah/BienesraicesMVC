<fieldset>
            <legend>Crear nuevo Usuario</legend>
            <label for="Correo electronico">Correo electronico: </label>
            <input type="email" id="Correo electronico" placeholder="Correo electronico" name="user[email]" value="<?php echo sanizitar ($user->email); ?>">
            
            <label for="password">Contraseña: </label>
            <input type="password" id="password" placeholder="Contraseña" name="user[password]" value="<?php echo sanizitar(trim($user->password)); ?>">

</fieldset>

