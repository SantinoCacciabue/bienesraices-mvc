    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION["login"] ?? false;
    if(!isset($inicio)){
        $inicio = false;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienes Raices</title>
        <link rel="stylesheet" href="../build/css/app.css">
    </head>

    <body>
        <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
            <div class="contenedor contenido-header">
                <div class="barra">
                    <a href="/">
                        <img src="/build/img/logo.svg" alt="Logo de Bienes Raices">
                    </a>
                    <div class="mobile-menu">
                        <img src="/build/img/barras.svg" alt="Icono menú">
                    </div>
                    <div class="derecha">
                        <img src="/build/img/dark-mode.svg" alt="Logo dark mode" class="dark-mode-btn">
                        <nav class="nav">
                            <a href="/nosotros">Nosotros</a>
                            <a href="/anuncios">Anuncios</a>
                            <a href="/blog">Blog</a>
                            <a href="/contacto">Contacto</a>
                            <?php if ($auth): ?>
                                <a href="/logout">Cerrar Sesión</a>

                            <?php endif; ?>
                        </nav>
                    </div>
                </div>
                <?php echo $inicio ? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>' : ''; ?>
            </div>
        </header>

        <?php echo $contenido; ?>

        <footer class="footer seccion">
            <div class="contenedor contenido-footer">
                <nav class="nav">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/anuncios">Anuncios</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                </nav>
            </div>
            <p class="copyright">Todos los derechos reservados <?php echo date("Y"); ?> &copy;</p>
            <script src="../build/js/bundle.min.js"></script>
        </footer>