<main class="contenedor seccion">
    <h1>Contacto</h1>
    <?php
        if($mensaje){ ?>
            <p class='alerta correcto'> <?php echo $mensaje ?> </p>?>
        <?php } ?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpeg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="imagen contacto" loading="lazy">
    </picture>
    <h2>Llene el formulario de contacto</h2>
    <form action="/contacto" method="POST" class="form">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="name">Nombre</label>
            <input type="text" name="contacto[name]" id="name" placeholder="Tu nombre" required>

            

            

            <label for="msg">Mensaje:</label>
            <textarea name="contacto[msg]" id="msg"></textarea>

        </fieldset>
        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="op">Venta o Compra</label>
            <select name="contacto[option]" id="op">
                <option value="" disabled selected >--Selecione--</option>
                <option value="Venta">Venta</option>
                <option value="Compra">Compra</option>
            </select>

            <label for="precio">Precio o presupuesto:</label>
            <input type="number" name="contacto[price]" id="precio" placeholder="Tu precio o presupuesto" required> 

        </fieldset>

        <fieldset>
            <legend>Información sobre contacto</legend>
            <div class="forma-contacto">
                <label for="contacto-telefono">Teléfono</label>
                <input type="radio" name="contacto[contacto]" id="contacto-telefono" value="Telefono">

                <label for="contacto-email">E-Mail</label>
                <input type="radio" name="contacto[contacto]" id="contacto-email" value="Email">
            </div>

            <div id="contacto"></div>
            
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>