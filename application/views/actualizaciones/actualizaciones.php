<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Perfil</title>

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
    <link rel="stylesheet" href="<?php echo base_url();?>css/actualizaciones.css">
    <script src="<?php echo base_url();?>js/componentes/header.js"></script>
    <script src="<?php echo base_url();?>js/actualizaciones.js"></script>


</head>
<body>
    <div class="container">
        <?php $this->load->view("componentes/header");?>
        <section>
            <h2>Proximas implementaciones</h2>
            <div class="padre">
                <div class="punto">
                    <div class="circulito"></div>
                    <p><strong>Personalizacion de Perfil:</strong>Modificaion,edicion y eliminacion de datos de pefil. La opcion de añadir imagenes</p>
                </div>
                <div class="punto">
                    <div class="circulito"></div>
                    <p><strong>Opcion Seleccion de fecha:</strong> Se podra elegir para reservar para varios dias, como tambien poder reservar con varios dias por adelantado</p>
                </div>
                <div class="punto">
                    <div class="circulito"></div>
                    <p><strong>Implementacion Reonocimiento de Matricula y Sistema de Pago:</strong> Se podra pagar directamente por lapagina web e introducir la matricula, no hara falta el uso de tickets en los aparcamientos</p>
                </div>
                <div class="punto">
                    <div class="circulito"></div>
                    <p><strong>Opcion de guardado en perfil:</strong> Se podra guardar en la cuenta del usuario varias cartillas del banco, como tambien varios vehiculos para unas transacciones mas agiles</p>
                </div>
                <div class="punto">
                    <div class="circulito"></div>
                    <p><strong>Implementacion datos sobre equipaciones en los aparcamientos:</strong> Punto de Carga, Limpieza de Cohce, Seguridad Privada, Altura maxima,etc</p>
                </div>
                <div class="punto">
                    <div class="circulito"></div>
                    <p><strong>Integracion con Google Maps:</strong> El mapa pasar de una fotos a el mapa oficial de Google</p>
                </div>
                <div class="punto">
                    <div class="circulito"></div>
                    <p><strong>Intraccion todas las opciones de goolge maps:</strong> Como llegar,mandar ubicacion, inicar viaje,etc</p>
                </div>
                <div class="punto">
                    <div class="circulito"></div>
                    <p><strong>Comantarios:</strong> Los usuarios podran comentar en cada uno de los aparcamientos para contar sus experiencias</p>
                </div>
                <div class="punto">
                    <div class="circulito"></div>
                    <p><strong>Servicio Extra:</strong> Se implementara un servicio extra de Recogida y Entrea de Vechiculos</p>
                </div>
                <div class="punto">
                    <div class="circulito"></div>
               
                </div>
                <div class="punto">
                    <div class="circulito"></div>
               
                </div>
                    
            </div>
        </section>
    </div>
    
  
   
</body>
</html>