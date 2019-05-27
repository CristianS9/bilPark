<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>bilPark</title>

    <!--JQuery -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

    
    <!-- Menus VEX / popups-->
    <script src="<?php echo base_url();?>lib/vex/js/vex.combined.min.js"></script>
    <script>vex.defaultOptions.className = 'vex-theme-os'</script>
    <link rel="stylesheet" href="<?php echo base_url();?>lib/vex/css/vex.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>lib/vex/css/vex-theme-flat-attack.css" />
    
    <!-- Notificaciones -->
    <link rel="stylesheet" href="<?php echo base_url();?>lib/izitoast/css/iziToast.min.css">
    <script src="<?php echo base_url();?>lib/izitoast/js/iziToast.min.js" type="text/javascript"></script> 
    
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    

    <link rel="stylesheet" href="<?php echo base_url();?>css/componentes/header.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/empresas.css">
    <script src="<?php echo base_url();?>js/componentes/header.js"></script>


</head>
<body>
   
    <div class="container">
        <?php $this->load->view("componentes/header");?>
        <section>
            <div class="contenido">
 
                <div class="beneficios">
                    <div>
                        <h3><i class="fas fa-car"></i><p><strong>Aumento</strong> de Trafico y Clientes</p></h3>
                        <p>Gracias a nuestro complejo algoritmo de reservas conseguira aumentar su cupo de clientes de manera exponencias,cuanto mas crece la comunidad,mas crecen los clientes</p>
                    </div>
                    <div>
                        <h3><i class="fas fa-euro-sign"></i><p>Aumente sus <strong>Beneficios</strong></p></h3>
                        <p>Gracias a esta comunidad sus clientes aumentaran, a esto lo seguiran los ingresos. Y no solo eso, si ya tienes a full tu parking, seguiras facturando gracias a nuestro algoritmo!! Te interesa saber como?? </p>
                    </div>
                    <div>
                        <h3><i class="fas fa-stamp"></i><p><strong>Calidad</strong> y Buena Imagen</p></h3>
                        <p>Para poder unirse hay que cumplir unas normas, solo por entrar a esta comundidad ya mejorar la reputacion de su parking y con ello la publicidad</p>
                    </div>
                    <div>
                        <h3><i class="fas fa-mask"></i><p><strong>Proteccion</strong> y Seguridad</p></h3>
                        <p>Proteja sus aparcamientos gracias a nuestras extensas listas de datos, informacion y ayudas para evitar fraudes!</p>
                    </div>
                </div>
                <div class="contacto">
                    <h2>Pongase en contacto con nosotros para mas informacion</h2>
                    <div>
                        <i class="far fa-envelope"></i><p>bilPark@contacto.com<p>
                    </div>
                    <div>
                        <i class="fas fa-phone"></i><p>965228365<p>
                    </div>
                </div>

            </div>
        </section>
    </div>
    
  
   
</body>
</html>