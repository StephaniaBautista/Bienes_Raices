<main class="contenedor seccion">
        <h1>Actualizar Vendedores</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <!--Si hay un error, lo muestra -->
        <?php foreach ($errores as $error): ?> 
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'?>
            <input type="submit" value="Actualizar Vendedor(a)" class="boton boton-verde">
        </form>
    </main>