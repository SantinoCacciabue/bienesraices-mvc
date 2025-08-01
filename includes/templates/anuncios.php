 <?php

    use App\Propiedad;
    $propiedades = Propiedad::all();
    if($_SERVER["SCRIPT_NAME"] == "/anuncios.php"){
        $propiedades = Propiedad::all();
    }
    else{
        $propiedades = Propiedad::get(3);
    }
 ?>
 <div class="contenedor-anuncios">
     <?php foreach($propiedades as $p): ?>
         <div class="card">
             <picture>
                 <img src="imagenes/<?php echo $p->imagen ?>" alt="anuncio1" loading="lazy" class="imagen-propiedad">
             </picture>
             <div class="contenido-anuncio">
                 <h3><?php echo $p->titulo ?></h3>
                 <p><?php echo $p->descripcion ?></p>
                 <p class="precio"><?php echo $p->precio ?></p>
                 <ul class="iconos-caracteristicas">
                     <li>
                         <img src="build/img/icono_wc.svg" alt="Icono WC" loading="lazy">
                         <p><?php echo $p->wc ?></p>
                     </li>
                     <li>
                         <img src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" loading="lazy">
                         <p><?php echo $p->garaje ?></p>
                     </li>
                     <li>
                         <img src="build/img/icono_dormitorio.svg" alt="Icono dormitorio" loading="lazy">
                         <p><?php echo $p->habitaciones ?></p>
                     </li>
                 </ul>
                 <a href="anuncio.php?id=<?php echo $p->id ?>" class="boton-amarillo">Ver Propiedad</a>
             </div><!--contenido-anuncio-->
         </div><!--anuncio-->
     <?php endforeach; ?>

 </div><!--contenedor de anuncios-->