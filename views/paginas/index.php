<main class="contenedor seccion">
    <h1>Más sobre nosotros</h1>
    <?php include "iconos.php" ?>
</main>
<section class="section contenedor">
    <h2>Casas y Deptos en Venta</h2>
    <?php
    $limite = 3;
    include "listado.php";
    ?>
    <div class="alinear-derecha">
        <a href="propiedades" class="boton-verde">Ver Todas</a>
    </div>
</section>
<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a href="contacto.php" class="boton-amarillo-inline">Contactanos</a>
</section>
<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture srcset="build/img/blog1.webp" type="image/webp"></picture>
                <picture srcset="build/img/blog1.jpg" type="image/jpeg"></picture>
                <img src="build/img/blog1.jpg" alt="Imagen Blog" loading="lazy">
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="info-meta">Escrito el: <span>20/10/2024 </span>por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture srcset="build/img/blog2.webp" type="image/webp"></picture>
                <picture srcset="build/img/blog2.jpg" type="image/jpeg"></picture>
                <img src="build/img/blog2.jpg" alt="Imagen Blog" loading="lazy">
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="info-meta">Escrito el: <span>13/02/2025 </span>por: <span>Admin</span></p>
                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </a>
            </div>
        </article>
    </section>
    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <img src="../../public/build/img/comilla.svg" alt="Comillas" class="comillas">
            <blockquote>El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.</blockquote>
            <p>- Santino Cacciabue</p>
        </div>
    </section>
</div>