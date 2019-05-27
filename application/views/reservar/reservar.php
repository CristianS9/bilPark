<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Reservar</title>

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
   
    <!-- TIME PICKER -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>    

    <link rel="stylesheet" href="<?php echo base_url();?>css/componentes/header.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/reservar.css">
    <script src="<?php echo base_url();?>js/componentes/header.js"></script>
    <script src="<?php echo base_url();?>js/reservar.js"></script>


</head>
<body>
    <div class="contenido-popup">
        <div class="info-aparcamiento">
            <h2 id="nombre-aparcamiento"></h2>
            <p>Precio: <span id="precio"></span> €/h</p>
            <div class="eleccion-tiempo">
                <label>
                    <p><i class="far fa-clock"></i>Hora Incio</p>
                    <input name="hora-inicio" id="hora-inicio" autocomplete="off"/>
                </label>
                <label>
                    <p><i class="far fa-clock"></i>Hora Fin</p>
                    <input name="hora-fin" id="hora-fin" autocomplete="off"/>
                </label>
            </div>
            <button class="reservar-aparcamiento">Reservar</button>
        </div>
    </div>
    <div class="container">
        <?php $this->load->view("componentes/header");?>
        <section>
            <div class="sel-zona">
                <button class="abrir-zonas"> Seleccionar Zona</button>
                <div class="zonas">
                    <?php
                
                        for ($i=0; $i <count($zonas) ; $i++) { 
                            $zona = $zonas[$i];
                    ?>
                            <div value="<?php echo $zona["id"] ?>"><?php echo $zona["zona"];?></div>
                    <?php
                        }
                    ?>
                </div>

            </div>
            <div class="mapa">
                <?php   
                  foreach ($aparcamientos as $aparcamiento) {
                ?>
                    <div idApa="<?php echo $aparcamiento->id;?>" class="simbolo-mapa zona_<?php echo $aparcamiento->zona;?>" style="top:<?php echo $aparcamiento->posY;?>%;left:<?php echo $aparcamiento->posX;?>%">
                        <i class="fas fa-parking"></i>
                    </div>
                <?php
                  }      
                ?>
            </div>    
        
        </section>
    </div>
    
  
   
</body>
</html>