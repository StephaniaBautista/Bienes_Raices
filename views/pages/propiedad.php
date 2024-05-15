<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad->titulo; ?></h1>
    <picture>
        <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen" loading="lazy">
    </picture>

    <div class="resumen-propiedad">
        <p class="precio">$ <?php echo number_format($propiedad->precio); ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img src="build/img/icono_wc.svg" alt="wc" loading="lazy">
                <p><?php echo$propiedad->wc; ?></p>
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
        <p>
            <?php echo $propiedad->descripcion ?>
        </p>
    </div>
</main>