<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <?php
    if ($resultado) {
        $mensaje = mostrarNoti(intval($resultado));
        if ($mensaje): ?>
            <p class="alerta correcto"><?php echo s($mensaje) ?></p>
    <?php endif;
    }
    ?>
    <div class="botones">
        <a href="/propiedades/create" class="boton-verde">Nueva propiedad</a>
        <a href="/vendedores/create" class="boton-amarillo">Nuevo vendedor</a>
    </div>


    <h2>Propiedades</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- Mostrar resultados -->
            <?php foreach ($propiedades as $p): ?>
                <tr>
                    <td> <?php echo $p->id ?></td>
                    <td><?php echo $p->titulo ?></td>
                    <td><?php echo $p->precio ?></td>
                    <td> <img src="/imagenes/<?php echo $p->imagen ?>" alt="imagen" class="imagen-tabla"></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/delete">
                            <input type="hidden" name="id" value=" <?php echo $p->id ?>">
                            <input type="hidden" name="type" value="propiedad">
                            <input type="submit" class="boton-rojo-block" href="" value="Eliminar">
                        </form>
                        <a class="boton-amarillo" href="/propiedades/update?id=<?php echo $p->id ?>">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- Mostrar resultados -->
            <?php foreach ($vendedores as $v): ?>
                <tr>
                    <td> <?php echo $v->id ?></td>
                    <td><?php echo $v->nombre . " " . $v->apellido ?></td>
                    <td><?php echo $v->telefono ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/delete">
                            <input type="hidden" name="id" value=" <?php echo $v->id ?>">
                            <input type="hidden" name="type" value="vendedor">
                            <input type="submit" class="boton-rojo-block" href="" value="Eliminar">
                        </form>
                        <a class="boton-amarillo" href="vendedores/update?id=<?php echo $v->id ?>">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>