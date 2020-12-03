<nav disabled class="navbar navbar-dark bg-primary navbar-expand-lg fixed-top">
            <a disabled class="navbar-brand"><span class="h3">Turismo Real</span> </a>
            <button disabled type="button" class="navbar-toggler btn btn-primary" data-toggle="collapse" data-target="#menu-principal"
            aria-expanded="false" aria-label="Desplegar menú de navegacion"><span class="navbar-toggler-icon"></span>
            </button>
            <div disabled class="collapse navbar navbar-collapse" id="menu-principal">
                <ul disabled class="navbar-nav ml-lg-auto">
                <?php
                if(!isset($rol)){
                    $roll=5;
                }else{
                    $roll=$rol;
                }
                    echo '<li disabled>
                        <a disabled class="nav-link" id="NAV-LINK-INICIO">Inicio</a>
                    </li>';
                    if($roll==5){
                        echo '<li disabled class="nav-item">
                        <a disabled class="nav-link" id="NAV-LINK-DEPTOS">Departamentos</a>
                    </li>
                    <li disabled class="nav-item">
                        <a disabled class="nav-link" id="NAV-LINK-CENTROS">Centros Turisticos</a>
                    </li>
                    <li disabled class="nav-item">
                        <a disabled class="nav-link" id="NAV-LINK-SERVICIOS">Nuestros Servicios</a>
                    </li>
                    <li disabled class="nav-item">
                        <a disabled class="nav-link" id="NAV-LINK-UBICACION">Ubicacion</a>
                    </li>
                    <li disabled class="nav-item">
                        <a disabled class="nav-link" id="NAV-LINK-CONTACTO">Contacto</a>
                    </li>';
                    }else{
                        echo '<li disabled class="nav-item">
                        <a class="nav-link" id="NAV-LINK-GESTION">Gestion</a>
                    </li>';
                    }
                    echo    '<li disabled class="nav-item mx-0 mx-lg-1"><a disabled class="nav-link js-scroll-trigger" id="NAV-LINK-CUENTA">Cuenta </a>
                            </li>';
                ?>
                </ul>
            </div>
    </nav>