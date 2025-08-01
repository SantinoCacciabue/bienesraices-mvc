<main class="contenedor seccion">
        <h1>Actualizar vendedor</h1>
        
        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
        <?php endforeach; ?>


        <form class="form" method="POST" enctype="multipart/form-data">
            <?php include "form.php"?>
            <div class="botones">
            <input type="submit" value="Actualizar Vendedor" class="boton-verde">
            <a href="../admin" class="boton-verde">Volver</a>
            </div>
            
        </form>
        
    </main>