<fieldset>
    <legend>Información General</legend>

    <label for="name">Nombre:</label>
    <input type="text" name="vendedor[nombre]" id="name" placeholder="Nombre vendedor" value="<?php echo s($v->nombre) ?>">

    <label for="last_name">Apellido:</label>
    <input type="text" name="vendedor[apellido]" id="last_name" placeholder="Apellido vendedor" value="<?php echo s($v->apellido) ?>">

</fieldset>
<fieldset>
    <legend>Información De Contacto</legend>

    <label for="tel">Telefono:</label>
    <input type="text" name="vendedor[telefono]" id="tel" placeholder="Telefono vendedor" value="<?php echo s($v->telefono) ?>">
</fieldset>