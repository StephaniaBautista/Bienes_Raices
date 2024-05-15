<div class=" contenedor contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) {?>
        <div class="anuncio">
               <picture>
                <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio 1" loading="lazy">
               </picture>
                <div class="contenido-anuncio">
                    <h3> <?php echo $propiedad->titulo; ?></h3>
                    <div class="contenedor-descripcion">
                        <p> <?php echo $propiedad->descripcion; ?></p>
                    </div>
                    <p class="precio">$<?php echo number_format($propiedad->precio); ?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="build/img/icono_wc.svg" alt="wc" loading="lazy">
                            <p><?php echo $propiedad->wc; ?></p>
                        </li> <!--Cierre Icono-->
                        <li>
                            <img src="build/img/icono_estacionamiento.svg" alt="carro" loading="lazy">
                            <p><?php echo$propiedad->estacionamiento; ?></p>
                        </li> <!--Cierre Icono-->
                        <li>
                            <img src="build/img/icono_dormitorio.svg" alt="ca" loading="lazy">
                            <p><?php echo $propiedad->habitaciones; ?></p>
                        </li> <!--Cierre Icono-->
                    </ul>
                    <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver Propiedad</a>
                </div> <!--Cierre contenido anuncio-->
            </div> <!--Cierre Anuncio-->
    <?php } ?>
        </div>