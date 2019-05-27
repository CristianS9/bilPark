<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrar Aparcamientos</title>

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
    <link rel="stylesheet" href="<?php echo base_url();?>css/administrar.css">
    <script src="<?php echo base_url();?>js/componentes/header.js"></script>
    <script src="<?php echo base_url();?>js/administrar.js"></script>


</head>
<body>
    <div class="contenido-popup">
        <div class="confirmacion-eliminar">
            <h3> Eliminar aparcamiento</h3>
            <p> Estas seguro de querer eliminar el siguiente aparcamiento??<P>
            <p id="nombre-aparcamiento"></p>
            <button id="confirmar-eliminacion">Eliminar</button>
            <button id="cancelar-eliminacion">Cancelar</button>
        </div>
    </div>
    <div class="container">
        <?php $this->load->view("componentes/header");?>
        <section>
            <a class="add-aparcamiento" href="add/aparcamiento">Añadir Aparcamiento</a>
            <div class="aparcamientos">
                        <div class="titulos">
                            <h4>Nombre</h4>
                            <h4>Precio</h4>
                            <h4>Numero Plazas</h4>
                            <h4>zona</h4>
                            <h4>posX</h4>
                            <h4>posY</h4>
                        </div>
                <?php   
                
                  foreach ($aparcamientos as $aparcamiento) {
                    
                ?>
                    <div class="aparcamiento id-<?php echo $aparcamiento->id;?>" aparcamiento_id="<?php echo $aparcamiento->id;?>">
                        <div class="datos">
                            <p class="nombre"><?php echo $aparcamiento->nombre;?></p>
                            <p><?php echo $aparcamiento->precio;?></p>
                            <p><?php echo $aparcamiento->plazasTotales;?></p>
                            <p><?php echo $aparcamiento->zona;?></p>
                            <p><?php echo $aparcamiento->posX;?></p>
                            <p><?php echo $aparcamiento->posY;?></p>
                        </div>
                        <div class="editar">
                            <i class="fas fa-trash-alt eliminar-aparcamiento" aparcamiento_id="<?php echo $aparcamiento->id;?>"></i>
                        </div>
                    </div>        
                <?php
                  }      
                ?>
            </div>
        </section>
    </div>
</body>
</html>