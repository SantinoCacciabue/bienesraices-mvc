<main class="contenedor seccion">
        <h1><?php echo $p->titulo ?></h1>
        <picture>
            <img src="imagenes/<?php echo $p->imagen ?>" alt="anuncio1" loading="lazy" class="imagen-anuncio">
        </picture>
        <div class="resumen-propiedad">
            <div class="caracteristicas">
                <p class="precio"><?php echo $p->precio ?></p>
                <ul class="iconos-caracteristicas destacada">
                    <li class="dest">
                        <img src="build/img/icono_wc.svg" alt="Icono WC" loading="lazy">
                        <p><?php echo $p->wc ?></p>
                    </li>
                    <li class="dest">
                        <img src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" loading="lazy">
                        <p><?php echo $p->garaje ?></p>
                    </li>
                    <li class="dest">
                        <img src="build/img/icono_dormitorio.svg" alt="Icono dormitorio" loading="lazy">
                        <p><?php echo $p->habitaciones ?></p>
                    </li>
                </ul>
            </div>
            <p>
            <?php echo $p->descripcion ?>
            </p>
        </div>
    </main>