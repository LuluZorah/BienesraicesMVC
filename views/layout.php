<?php 
    
    if (!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? null;

    if (!isset($inicio)) {
        $inicio = false;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="../build/css/app.css">

</head>
<body>
    <header class="header <?php echo ($inicio) ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header ">
            <div class="barra ">
                <a href="/">
                    <img class="icono-principal" src="../build/img/logo.svg" alt="logotipo">
                </a>

                <div class="mobile-menu">
                    <img src="../build/img/barras.svg" alt="icon-barra">

                </div>
                <div class="derecha">
                    
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contactanos</a>
                        <?php if ($auth) { ?>
                            <a href="/logout">Cerrar Sesion</a>
                        <?php } ?>
                        <?php if (!$auth) { ?>
                            <a href="/login">Iniciar Sesion</a>
                        <?php } ?>
                    </nav>
                    <?php if ($auth) { ?>
                            <a class="administrador" href="/admin">Administrador</a>
                        <?php } ?>
                    <img class= "dark-mode-boton" src="../build/img/dark-mode.svg" alt="boton-dark-mode">
                   
                </div>
               
            </div>
            <?php if ($inicio) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
           
        </div>
    </header>

    <?php echo $contenido; ?>
    <footer class="footer seccion">
        <div class="contenedor contendor-footer">
            <nav class="navegacion">
                <a href="nosotros.html">Nosotros</a>
                <a href="anuncios.html">Anuncios</a>
                <a href="blog.html">Blog</a>
                <a href="contacto.html">Contactanos</a>
            </nav>
            <a class="copyright">Todos los derechos Reservados <?php echo date ('Y');?> &copy;</a>
        </div>
        
    </footer>
    <script src="../build/js/bundle.js"></script>

   

</body>
</html>