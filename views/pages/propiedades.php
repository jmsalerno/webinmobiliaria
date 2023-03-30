<main>

    <section class="second-section-container">

        <h2>Listado de Propiedades</h2>

        <?php if($mensaje): ?>

            <p><?php echo $mensaje; ?></p>

        <?php endif; ?>

        <div class="cards-container grid-ajuste">

            <?php foreach($propiedades as $propiedad): ?>

            <div class="card-container">

                <img src="/imagenes/<?php echo $propiedad->imagen;?>" alt="Anuncio">

                <p class="title"><?php echo $propiedad->calle ?></p>

                <p class="price">$ <?php echo $propiedad->precio ?></p>

                <button>
                    <a href="/propiedades/propiedad?id=<?php echo $propiedad->id ?>">Ver más</a>
                </button>

            </div>

            <?php endforeach; ?>

        </div>

    </section>


</main>