<main class="contenedor seccion login">
        <h1>Iniciar Sesión</h1>
        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
        <?php endforeach; ?>
        <form action="/login" class="form centrar-texto" method="POST">
            <fieldset class=>
                <legend>Email y Contraseña</legend>

                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" placeholder="Tu correo electrónico">

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Tu contraseña">

            </fieldset>
            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>