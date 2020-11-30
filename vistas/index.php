<?php
    include_once 'global.php';
    include F_PETICION;
    $rol=5;
    if(isset($_COOKIE['rol'])){
        $rol=$_COOKIE['rol'];
    }
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
     <!-- Archivos CSS BOOTSTRAP 4 -->
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo CSS;?>/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS;?>/estilos.css" type="text/css">
</head>
<body>
    <!--BARRA DE NAVEGACION-->
<?php

include F_NAVBAR;

?>
    <section class="header p-xs-0">
        <div class="container mt-5 pt-5">
            <div class="row text-center">
                <div class="col-12">
                    <h3 class=" font-italic text-primary">Bienvenido a Turismo Real</h3>
                    <h1 class="display-4 font-weight-bold text-primary">¡PREPARATE PARA LA MEJOR ESTADIA!</h1>
                    <p class="text-primary"><span class="h4">Empresa dedicada al rubro del servicio de paquetes turisticos y alojamiento. 
                        Entregamos un servicio de cálidad para hacer de nuestro servicio uno inolvidable para cada cliente</span> </p>
                        <a class="btn btn-primary btn-lg text-uppercase js-scroll-trigger" href="<?php echo DEPTOS;?>">Reservar un Departamento</a>
                </div>
            </div>
        </div>
    </section>


    <!--CENTROS TURISTICOS-->
    <section class="centros-turisticos" id="centros">
        <div class="container my-5">
            <h1 class="text-center py-4 display-4">CENTROS TURISTICOS</h1>
            <div class="row text-center font-weight-bold">
            <?php
            $c = peticion_http('http://turismoreal.xyz/api/centro','GET','','',LISTA_CENTROTURISTICO);
            if($c['statusCode']==200){
                foreach($c['contenido'] as $centro){
                    echo '
                <div class="col-xs-12 col-md-6 col-lg-4 mb-4  ">
                    <div class="card">
                        <img class="card-img-top" src="'.IMG.'/portfolio/temuco.jpg" alt="">
                        <div class="card-body"> <h4 class="">'.$centro->Nombre.'</h4>  </div>
                    </div>   
                </div>';
                }
            }else{
                echo '
                <div class="col-xs-12 col-md-6 col-lg-4 mb-4  ">
                    <div class="card">
                        <img class="card-img-top" src="'.IMG.'/portfolio/temuco.jpg" alt="">
                        <div class="card-body"> <h4 class="">Temuco</h4>  </div>
                    </div>   
                </div>
                
                <div class="col-xs-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="'.IMG.'/portfolio/pucon.png" alt="Card image cap">
                        <div class="card-body"> <h4>Pucon</h4>  </div>
                    </div>   
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="'.IMG.'/portfolio/valdivia.png" alt="Card image cap">
                        <div class="card-body"> <h4>Viña del Mar</h4>  </div>
                    </div>   
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="card">
                        <img class="card-img-top" src="'.IMG.'/portfolio/montt.png" alt="Card image cap">
                        <div class="card-body"> <h4>Puerto Montt</h4>  </div>
                    </div>    
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="card">
                        <img class="card-img-top" src="'.IMG.'/portfolio/conce.jpg" alt="Card image cap">
                        <div class="card-body"> <h4>Concepcion</h4>  </div>
                    </div>
                    
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="card">
                        <img class="card-img-top" src="'.IMG.'/portfolio/aaa.jpg" alt="Card image cap">
                        <div class="card-body"> <h4>Valdivia</h4>  </div>
                    </div>
                    
                </div>';
            }
            ?>
                
            </div>
        </div>
    </section>

    <!--NUESTROS SERVICIOS-->
    <div class="nuestros-servicios" id="servicios">
        <div class="container my-5">
            <h1 class="display-4 my-5 text-center">NUESTROS SERVICIOS</h1>
            <div class="row text-center">
                <div class="col-xs-12 col-md-4 my-5 my-lg-0">
                    <img src="<?php echo IMG; ?>/logos/servicio1.png"width="30%" class="img-fluid" alt="">
                    <h4 class="my-3">Facilidad de pago y reserva</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et vel magni suscipit quo, quaerat ex in quas soluta minus labore veritatis reiciendis odit provident unde nam repellat facilis quam qui!</p>
                   
                </div>
                <div class="col-xs-12 col-md-4">
                    <img src="<?php echo IMG; ?>/logos/servicio2.png" width="30%" class="img-fluid" alt="">
                    <h4 class="my-3">Reserva Inmediata</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et vel magni suscipit quo, quaerat ex in quas soluta minus labore veritatis reiciendis odit provident unde nam repellat facilis quam qui!</p>
                </div>
                <div class="col-xs-12 col-md-4">
                    <img src="<?php echo IMG; ?>/logos/servicio3.png"width="30%" class="img-fluid" alt="">
                    <h4 class="my-3">Servicio de Turismo</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et vel magni suscipit quo, quaerat ex in quas soluta minus labore veritatis reiciendis odit provident unde nam repellat facilis quam qui!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ENCUENTRANOS-->
    <section class="encuentranos" id="ubicacion">
        <h1 class="display-4 text-center mb-3">ENCUENTRANOS</h1>
        <div class="container-fluid">
            <div class="row">
                <div class=" embed-responsive embed-responsive-21by9">
                    <iframe class="embed-responsive-item h-75" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.2013907752766!2d-70.6063901!3d-33.4179935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cf69d4854951%3A0x9a87ef2fefaad0df!2sCostanera%20Center!5e0!3m2!1ses-419!2scl!4v1604885579766!5m2!1ses-419!2scl"
                     width="600" height="20rem" frameborder="0" style="border:0;"  aria-hidden="false" tabindex="0"></iframe>
            
                </div>
            </div>
        </div>

    </section>
    <section class="contactanos bg-primary" id="contacto">
        <div class="container pb-5 mt-1 ">
            <div class="text-center">
                <h3 class="section-heading text-uppercase display-4 text-white  ">Contactanos</h3>
                
            </div>
            <form class="mt-5" id="contactForm" name="sentMessage" novalidate="novalidate">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="name" type="text" placeholder="Nombre *" required="required" data-validation-required-message="Please enter your name." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="email" type="email" placeholder="Correo *" required="required" data-validation-required-message="Please enter your email address." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group mb-md-0">
                            <input class="form-control" id="phone" type="tel" placeholder="Telefono *" required="required" data-validation-required-message="Please enter your phone number." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0 h-100">
                            <textarea class="form-control" id="message" placeholder="Mensaje*" required="required" data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div id="success"></div>
                    <button class="btn btn-primary btn-lg text-uppercase" id="sendMessageButton" type="submit">Enviar Mensaje</button>
                </div>
            </form>
        </div>
    </section>
    <?php include F_FOOTER;?>
    <script src="<?php echo JS;?>/jquery-3.5.1.min.js"></script>
    <script src=".<?php echo JS;?>/popper.min.js" ></script>
    <script src="<?php echo JS;?>/bootstrap.min.js" ></script>
</body>
</html>