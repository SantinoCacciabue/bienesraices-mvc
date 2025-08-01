<main class="contenedor seccion">
        <h1>Crear</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
        <?php endforeach; ?>
        <form action="" class="form" method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . "/form.php"?>
            <input type="submit" value="Crear propiedad" class="boton-verde">
            <a href="../admin" class="boton-verde">Volver</a>
        </form>
        
</main>