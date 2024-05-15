<fieldset>
    <legend>Información General del vendedor</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" placeholder="Nombre del vendedor" name="vendedor[nombre]" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" placeholder="Apellidos del vendedor" name="vendedor[apellido]" value="<?php echo s($vendedor->apellido); ?>">

    <label for="numero">Número:</label>
    <input type="number" id="numero" placeholder="Teléfono del vendedor" name="vendedor[telefono]" value="<?php echo s($vendedor->telefono); ?>">

    <label for="email">E-Mail:</label>
    <input type="email" id="email" placeholder=" E-mail del vendedor" name="vendedor[email]" value="<?php echo s($vendedor->email); ?>">

</fieldset> <!--Cierre del primer Fieldset -->


</fieldset>