<fieldset>
    <legend>Información General de la propiedad</legend>

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" placeholder="Titulo de la Propiedad" name="propiedad[titulo]" value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" placeholder="Precio de la Propiedad" name="propiedad[precio]" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png, image/webp" name="propiedad[imagen]">

    <?php if ($propiedad->imagen) :?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="propiedad[descripcion]"> <?php echo s($propiedad->descripcion); ?></textarea>
</fieldset> <!--Cierre del primer Fieldset -->

<fieldset>
    <legend>Información de la Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" name="propiedad[habitaciones]" value="<?php echo s($propiedad->habitaciones); ?>">


    <label for="wc">WC:</label>
    <input type="number" id="wc" placeholder="Ej: 3" min="1" name="propiedad[wc]" value="<?php echo s($propiedad->wc); ?>">

    
    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" id="estacionamiento" placeholder="Ej: 3" min="0" name="propiedad[estacionamiento]" value="<?php echo s($propiedad->estacionamiento); ?>">
</fieldset>

<fieldset>
<legend>Vendedor</legend>
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedores_id]" id="vendedor">
    <option value="">-- Seleccione un vendedor --</option>
    <?php foreach($vendedores as $vendedor): ?>
        <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?> 
                value="<?php echo s($vendedor->id);?>"> <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido);?></option>
    <?php endforeach; ?>
    </select>
</fieldset>