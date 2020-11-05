
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
            <h4 class="mb-0 site-logo m-0 p-0"><a href="<?php echo VISTAS;?>/" style="text-decoration:none">Turismo Real</a></h4>                
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
            </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item "><a class="nav-link js-scroll-trigger" href="<?php echo DEPTOS;?>/">Departamentos</a></li>
                        <li class="nav-item "><a class="nav-link js-scroll-trigger" href="<?php echo VISTAS;?>/#portfolio">Centros Turisticos</a></li>
                        <li class="nav-item "><a class="nav-link js-scroll-trigger" href="<?php echo VISTAS;?>/#services">Nuestros Servicios</a></li>
                        <li class="nav-item "><a class="nav-link js-scroll-trigger" href="<?php echo VISTAS;?>/#ubicanos">Ubicación</a></li>
                        <li class="nav-item "><a class="nav-link js-scroll-trigger" href="<?php echo VISTAS;?>/#contact">Contacto</a></li>
                        <script>function aparecer(){document.getElementsByClassName("pestana")[0].style.display="inline-block";} function ocultar(){document.getElementsByClassName("pestana")[0].style.display="none";} </script>
                        <?php
                        if(!isset($_COOKIE['token']))
                        {
                            echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link js-scroll-trigger" href="'.VISTAS.'/iniciar-sesion.php">Acceso</a></li>';
                            
                        } else
                        {   
                            echo    '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link js-scroll-trigger" style="position: relative;" onmouseover="aparecer()" onmouseout="ocultar()" >Cuenta</a>
                                <ul class="nav-link pestana" onmouseover="aparecer()" onmouseout="ocultar()">
                                    <li class="nav-item "><h6 onclick="window.Location(\''.CUENTA.'/miperfil.php\')" class="nav-link js-scroll-trigger">Mi Perfil<h6/></li>
                                    <li class="nav-item "><h6 onclick="window.Location(\''.CUENTA.'/misreservas.php\')" class="nav-link js-scroll-trigger">Mis Reservas <h6/></li>
                                    <li class="nav-item "><h6 onclick="window.Location(\''.FUNCIONES.'/cerrarsesion.php\')" class="nav-link js-scroll-trigger" >Cerrar Sesion<h6/></li>
                                </ul>
                            </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>