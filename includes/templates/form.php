<fieldset>
    <legend>Información General</legend>

    <label for="title">Titulo:</label>
    <input type="text" name="propiedad[titulo]" id="title" placeholder="Titulo propiedad" value="<?php echo s($p->titulo) ?>">

    <label for="price">Precio:</label>
    <input type="number" name="propiedad[precio]" id="price" placeholder="Precio de la propiedad" min=1 max=999999999 value="<?php echo s($p->precio) ?>">

    <label for="img">Imagen:</label>
    <input type="file" name="propiedad[imagen]" id="img" placeholder="Imagen de la propiedad" accept="image/jpeg, image/png">
    <?php if ($p->imagen) { ?>
        <img src="/imagenes/<?php echo $p->imagen ?>" alt="imagen casa" class="imagen-chica">
    <?php } ?>
    <label for="desc">Descripción:</label>
    <textarea name="propiedad[descripcion]" id="desc" placeholder="Descripción de la propiedad"><?php echo s($p->descripcion) ?></textarea>
</fieldset>

<fieldset>
    <legend>Información de la propiedad</legend>

    <label for="rooms">Habitaciones:</label>
    <input type="number" name="propiedad[habitaciones]" id="rooms" placeholder="Cantidad de habitaciones" min=1 value="<?php echo s($p->habitaciones) ?>">

    <label for="bathrooms">Baños:</label>
    <input type="number" name="propiedad[wc]" id="bathrooms" placeholder="Cantidad de baños" min=1 value="<?php echo s($p->wc) ?>">

    <label for="garaje">Estacionamiento:</label>
    <input type="number" name="propiedad[garaje]" id="garaje" placeholder="Cantidad de estacionamientos" min=1 value="<?php echo s($p->garaje) ?>">

</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedores_id]" id="vendedor">
        <option selected disabled value="">Seleccione un vendedor</option>
        <?php foreach ($vendedores as $v): ?>
            <option
                <?php echo $p->vendedores_id === $v->id ? 'selected' : ''; ?> value="<?php echo s($v->id); ?>">
                <?php echo s($v->nombre) . " " . s($v->apellido); ?>
            </option>
        <?php endforeach; ?>

    </select>
</fieldset>