<header>

    <div class="header-container">

        <a class="logo" href="/">

            <img src="../build/img/logo.jpg" alt="Logotipo de Inmobiliaria">
    
        </a>

        <div class="burger-m-container">

            <div class="burger-m">

                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="32" height="32" viewBox="0 0 24 24" stroke-width="1" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="4" y1="6" x2="20" y2="6" />
                    <line x1="4" y1="12" x2="20" y2="12" />
                    <line x1="4" y1="18" x2="20" y2="18" />
                </svg>

            </div>

        </div>

        
        <nav class="nav-list-container">


            <ul class="nav-list">

                <li>
                    <a href="/propiedades">Propiedades</a>
                </li>

                <li>
                    <a href="/nosotros">Nosotros</a>
                </li>

                <li>
                    <a href="/contacto">Contacto</a>
                </li>

                <?php if($auth): ?>
                    
                    <li>

                        <a href="/admin">Admin</a>

                    </li>
                    
                    <li>

                        <a href="/logout">Cerrar Sesión</a>

                    </li>   

                <?php endif; ?>

            </ul>

        </nav>      

    </div>

</header>