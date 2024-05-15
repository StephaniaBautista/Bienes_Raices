    <main class="contenedor seccion">
        <h1>Más sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono 1" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident maxime dolore autem accusantium, sit nihil veritatis 
                    exercitationem eaque pariatur quae rerum officiis corrupti odit tenetur eos libero illo asperiores odio!
                </p>
            </div> <!--Cierre de icono-->
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono 2" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident maxime dolore autem accusantium, sit nihil veritatis 
                    exercitationem eaque pariatur quae rerum officiis corrupti odit tenetur eos libero illo asperiores odio!
                </p>
            </div> <!--Cierre de icono-->
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono 3" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident maxime dolore autem accusantium, sit nihil veritatis 
                    exercitationem eaque pariatur quae rerum officiis corrupti odit tenetur eos libero illo asperiores odio!
                </p>
            </div> <!--Cierre de icono-->
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>
        <?php 
            include 'listado.php';
        ?>

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver todas</a>
        </div>

    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="/contacto" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="blog" loading="lazy">
                    </picture>
                </div> <!--Cierre imagen blog-->

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span> </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iste ipsum iure nihil. Neque numquam, qui velit, deleniti 
                            dicta consequuntur nesciunt accusantium similique facilis, inventore enim laborum ea. In, labore?
                        </p>
                    </a>
                </div> <!--Cierre texto blog-->

            </article> <!--Cierre Blog entrada-->

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="blog" loading="lazy">
                    </picture>
                </div> <!--Cierre imagen blog-->

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span> </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iste ipsum iure nihil. Neque numquam, qui velit, deleniti 
                            dicta consequuntur nesciunt accusantium similique facilis, inventore enim laborum ea. In, labore?
                        </p>
                    </a>
                </div> <!--Cierre texto blog-->

            </article> <!--Cierre Blog entrada-->
        </section> <!--Cierre Blog-->

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi tempora ut laudantium ea dignissimos? Amet voluptatem nostrum
                        impedit numquam? Quod eos odit perferendis porro qui blanditiis maxime recusandae ratione quibusdam.
                </blockquote>
                <p> -Elizabeth Riddle</p>
            </div>
        </section>
    </div>