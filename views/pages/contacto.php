<main>

<section class="form-section">

    <h2>Contáctanos!</h2>


    <?php if($mensaje) { ?>

        <p class="alerta exito"><?php echo $mensaje; ?></p>

    <?php } ?>

    <div class="form-section-flex-container">

        <form action="/contacto" method="POST" class="contact">

            <label for="name" class="field-label">Nombre</label>

            <input type="text" class="field-text" maxlength="256" id="nombre" name="contacto[nombre]" data-name= "Nombre" placeholder="¿Cuál es tu Nombre?" required>

            <label for="email" class="field-label">Email</label>

            <input type="email" class="field-text" maxlength="256" id="email" name="contacto[email]" data-name="Email" placeholder="nombre@ejemplo.com" required>

            <label for="mensaje" class="field-label">Mensaje</label>

            <textarea placeholder="¿Cómo te puedo ayudar?" maxlength="5000" id="mensaje" name="contacto[mensaje]" data-name="mensaje" required="" class="field-textarea"></textarea>

            <input type="submit" value="Enviar" data-wait="Espere..." class="form-button">


        </form>



    </div>


</section>


</main>