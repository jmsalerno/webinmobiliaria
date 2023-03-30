<main class="admin-main">

    <div class="admin-header-contain">

        <h2>Propiedades</h2>

        <?php 

        $mensaje = mostrarNotificacion( intval( $resultado) );

        if($mensaje) { 
            
        ?>

        <p class="alerta exito"><?php echo $mensaje; ?></p>

        <?php } ?>



        <a href="/admin/crear" class="boton-nv">Nueva Propiedad</a>

    </div>





    <table class="admin-table">
        <thead>
            <tr>
                <th>Calle</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach($propiedades as $propiedad): ?>

            <tr>
                <td><?php echo $propiedad->calle; ?></td>
                <td> <img class="props-admin-img" src="/imagenes/<?php echo $propiedad->imagen; ?>"> </td>
                <td>$ <?php echo $propiedad->precio; ?> </td>
                <td>
                    <form method="POST" action="admin/eliminar">

                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="eliminar" value="Eliminar">

                    </form>
                    
                    <a href="/admin/actualizar?id=<?php echo $propiedad->id; ?>">Actualizar</a>
                </td>
            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</main>