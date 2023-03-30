<main>

    <section class="image-container first-section-container">

        <h1>El mejor lugar para comprar tu nuevo hogar</h1>

        <div class="search">

            <form action="/propiedades" method="POST">

                <button>

                    <i class="fa-solid fa-search"></i>

                </button>

                <input type="search" name="search" id="search" maxlength="30" placeholder="Buscá la propiedad..." autocomplete="off">

            </form>

        </div>

    </section>

    <section class="second-section-container">

        <h2>Propiedades Destacadas</h2>

        <div class="cards-container">

            <?php foreach($propiedades as $propiedad): ?>

            <div class="card-container">

                <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="Anuncio">

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