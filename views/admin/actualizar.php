<main class="admin-main">

    <div class="admin-header-contain">

    <h2>Actualizar Propiedad</h2>

    <a href="/admin" class="boton-nv">Volver</a>

    </div>

    <section class="form-section">

    <div class="form-section-flex-container">

        <?php foreach($errores as $error): ?>

            <div class="alerta error">

                <?php echo $error; ?>

            </div>

        <?php endforeach; ?>

        <form  class="contact" method="POST" enctype="multipart/form-data">

            <label for="calle" class="field-label">Calle</label>

            <input type="text" class="field-text" maxlength="256" name="propiedad[calle]" placeholder="¿Cuál es el nombre de la calle?" value="<?php echo $propiedad->calle; ?>">

            <label for="precio" class="field-label">Precio</label>

            <input type="number" class="field-text" maxlength="8" name="propiedad[precio]" placeholder="Escribi el precio" value="<?php echo $propiedad->precio; ?>">
            
            <label for="imagen" class="field-label">Imagen</label>

            <input type="file" id="imagen" accept="image/jpeg, image/png"  name="propiedad[imagen]">

            <?php if($propiedad->imagen) { ?>

                <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">

            <?php } ?>

            <label for="descripcion" class="field-label">Descripción</label>

            <textarea placeholder="Escribi la descripción" name="propiedad[descripcion]" class="field-textarea"><?php echo $propiedad->descripcion; ?></textarea>

            <input type="submit" value="Actualizar Propiedad" data-wait="Espere..." class="form-button">


        </form>



    </div>


    </section>

</main>