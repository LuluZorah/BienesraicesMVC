<?php 
    
    if (!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? null;

?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">

</head>
<body>
    <header class="header <?php echo ($inicio) ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header ">
            <div class="barra ">
                <a href="/bienesraices/index.php">
                    <img class="icono-principal" src="/bienesraices/build/img/logo.svg" alt="logotipo">
                </a>

                <div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg" alt="icon-barra">

                </div>
                <div class="derecha">
                    
                    <nav class="navegacion">
                        <a href="/bienesraices/nosotros.php">Nosotros</a>
                        <a href="/bienesraices/anuncios.php">Anuncios</a>
                        <a href="/bienesraices/blog.php">Blog</a>
                        <a href="/bienesraices/contacto.php">Contactanos</a>
                        <?php if ($auth) { ?>
                            <a href="/bienesraices/cerrar-sesion.php">Cerrar Sesion</a>
                        <?php } ?>
                        <?php if (!$auth) { ?>
                            <a href="login.php">Iniciar Sesion</a>
                        <?php } ?>
                    </nav>
                    <?php if ($auth) { ?>
                            <a class="administrador" href="/bienesraices/admin/index.php">Administrador</a>
                        <?php } ?>
                    <img class= "dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg" alt="boton-dark-mode">
                   
                </div>
               
            </div>
            <?php if ($inicio) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
           
        </div>
    </header>