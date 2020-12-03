<?php
echo '<nav class="navbar navbar-dark bg-primary navbar-expand-lg fixed-top">
            <a href="'.VISTAS.'/" class="navbar-brand"><span class="h3">Turismo Real</span> </a>
            <button type="button" class="navbar-toggler btn btn-primary" data-toggle="collapse" data-target="#menu-principal"
            aria-expanded="false" aria-label="Desplegar menú de navegacion"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar navbar-collapse" id="menu-principal">
                <ul class="navbar-nav ml-lg-auto">';
                
                if(!isset($rol)){
                    $roll=5;
                }else{
                    $roll=$rol;
                }
                    echo '<li>
                        <a href="'.VISTAS.'/" class="nav-link" onclick="setTimeout(resaltarNavLink,200)" id="NAV-LINK-INICIO">Inicio</a>
                    </li>';
                    if($roll==5){
                        echo '<li class="nav-item">
                        <a href="'.DEPTOS.'/index.php" onclick="setTimeout(resaltarNavLink,200)" class="nav-link" id="NAV-LINK-DEPTOS">Departamentos</a>
                    </li>
                    <li class="nav-item">
                        <a href="'.VISTAS.'/index.php#centros" onclick="setTimeout(resaltarNavLink,200)" class="nav-link" id="NAV-LINK-CENTROS">Centros Turisticos</a>
                    </li>
                    <li class="nav-item">
                        <a href="'.VISTAS.'/index.php#servicios" onclick="setTimeout(resaltarNavLink,200)" class="nav-link" id="NAV-LINK-SERVICIOS">Nuestros Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a href="'.VISTAS.'/index.php#ubicacion" onclick="setTimeout(resaltarNavLink,200)" class="nav-link" id="NAV-LINK-UBICACION">Ubicacion</a>
                    </li>
                    <li class="nav-item">
                        <a href="'.VISTAS.'/index.php#contacto" onclick="setTimeout(resaltarNavLink,200)" class="nav-link" id="NAV-LINK-CONTACTO">Contacto</a>
                    </li>';
                    }else{
                        echo '<li class="nav-item">
                        <a href="'.GESTION.'/" onclick="setTimeout(resaltarNavLink,200)" class="nav-link" id="NAV-LINK-GESTION">Gestion</a>
                    </li>';
                    }
                    echo '<script>function aparecer(){document.getElementsByClassName("pestana")[0].style.display="inline-block";} function ocultar(){document.getElementsByClassName("pestana")[0].style.display="none";} </script>';
                    if(!isset($_COOKIE['token']))
                    {
                        echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link js-scroll-trigger" href="'.CUENTA.'/iniciar-sesion.php" onclick="setTimeout(resaltarNavLink,200)" id="NAV-LINK-ACCESO">Acceso</a></li>';
                        
                    } else
                    {   
                        echo    '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link js-scroll-trigger"  onmouseover="aparecer()" onmouseout="ocultar()" id="NAV-LINK-CUENTA">Cuenta </a>
                                    <ul class="nav-link pestana pt-md-4" style="right:0px;" onmouseover="aparecer()" onmouseout="ocultar()">
                                    <li class="nav-item "><a class="nav-link " href="'.CUENTA.'/miperfil.php">Mi Perfil';
                        if(false){
                            //si tiene notificaciones
                            echo ' <span class="badge badge-light">50</span>';
                        }
                        echo        '</a></li>';
                        echo            '<li class="nav-item "><a class="nav-link " href="'.NOTIFICACIONES.'/index.php">Notificaciones'; 
                        if(false){
                            //si tiene notificaciones
                            echo ' <span class="badge badge-light">50</span>';
                        }
                        echo            '</a></li>';
                                    if($roll==5){
                        echo       '<li class="nav-item"><a class="nav-link" href="'.RESERVAS.'/index.php">Mis Reservas</a></li>';
                                    }
                        echo       '<li class="nav-item"><a class="nav-link" href="'.FUNCIONES.'/cerrarsesion.php">Cerrar Sesion</a></li>
                                    </ul>
                                </li>';
                    }
                    echo '</ul>
                    </div>
                <script>
                function resaltarNavLink(){
                    var spl = window.location.href.split("/");
                    if(spl[spl.length-1].split("?")[0]=="error.php"){
                        var links = document.getElementsByClassName("nav-link");
                        for(var i=0; i<links.length;i++){
                            links[i].classList.remove("active");
                        }
                        return;
                    }
                    var spl2 = spl[spl.length-1].split("#");
                    var PAGINA_ACTUAL = spl[spl.length-2];
                    var POSICION_ACTUAL = "";
                    var links = document.getElementsByClassName("nav-link");
                    for(var i=0; i<links.length;i++){
                        links[i].classList.remove("active");
                    }
                    if(spl2.length==2){
                        POSICION_ACTUAL = spl2[1]; 
                    }
                    if(PAGINA_ACTUAL=="deptos"){
                        document.getElementById("NAV-LINK-DEPTOS").classList.add("active");
                    }else if(PAGINA_ACTUAL=="cuenta"){
                        document.getElementById("NAV-LINK-CUENTA").classList.add("active");
                    }else if(PAGINA_ACTUAL=="gestion"){
                        document.getElementById("NAV-LINK-GESTION").classList.add("active");
                    }else if(PAGINA_ACTUAL=="vistas" && spl[spl.length-1]=="iniciar-sesion.php"){
                        document.getElementById("NAV-LINK-ACCESO").classList.add("active");
                    }else if(PAGINA_ACTUAL=="vistas" && spl[spl.length-1]!="iniciar-sesion.php"){
                        switch(POSICION_ACTUAL){
                            case "":
                                document.getElementById("NAV-LINK-INICIO").classList.add("active");
                                break;
                            case "centros":
                                document.getElementById("NAV-LINK-CENTROS").classList.add("active");
                                break;
                            case "servicios":
                                document.getElementById("NAV-LINK-SERVICIOS").classList.add("active");
                                break;
                            case "ubicacion":
                                document.getElementById("NAV-LINK-UBICACION").classList.add("active");
                                break;
                            case "contacto":
                                document.getElementById("NAV-LINK-CONTACTO").classList.add("active");
                                break;
                        }
                    }
                }
                resaltarNavLink();
                </script>
            </nav>';
                ?>