<main class="sign-in">

    <section class="wrapper">

        <div class="title"><span>Iniciar Sesión</span></div>

        <?php foreach($errores as $error): ?>

            <div class="alerta error">

                <?php echo $error; ?>

            </div>

        <?php endforeach; ?>

        <form method="POST" novalidate>

            <div class="row">

                <i class="fas fa-user"></i>

                <label for="email"></label>
                <input type="email" name="email" placeholder="email" id="email">

            </div>

            <div class="row">

                <i class="fas fa-lock"></i>

                <label for="password"></label>
                <input type="password" name="password" placeholder="password" id="password" >

            </div>

            <div class="row button">

                <input type="submit" value="Iniciar Sesión">

            </div>

        </form>

    </section>

</main>