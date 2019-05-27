<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir aparcamiento</title>

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
    <link rel="stylesheet" href="<?php echo base_url();?>css/aparcamientoNuevo.css">
    <script src="<?php echo base_url();?>js/componentes/header.js"></script>
    <script src="<?php echo base_url();?>js/aparcamientoNuevo.js"></script>



</head>
<body>
    <div class="container">
        <?php $this->load->view("componentes/header");?>
        <section>
            <form action="" method="post" id="nuevoAparcamiento">
                <lebel>
                    <p>Nombre aparcamiento</p>
                    <input type="text" name="nombre">
                </label>
                <lebel>
                    <p>Precio</p>
                    <input type="text" name="precio">
                </label>
                <lebel>
                    <p>Numero de Plazas</p>
                    <input type="number" name="numPlazas">
                </label>
                <lebel>
                    <p>Zona</p>
                    <select name="zona" id="zona">
                        <option value="NULL" selected>Seleccionar Zona</option>
                        <?php
                    
                            for ($i=0; $i <count($zonas) ; $i++) { 
                                $zona = $zonas[$i];
                        ?>
                                <option value="<?php echo $zona["id"] ?>"><?php echo $zona["zona"];?></option>
                        <?php
                            }
                            ?>
                    </select>
                </label>
                <lebel>
                    <p>Seleccionar posicion</p>
                    <input id="posX" type="hidden" name="posX">
                    <input id="posY" type="hidden" name="posY">
                    <div class="mapa">
                        <div id="punto-seleccionado"></div>
                    </div>
                </label>
                <input type="submit" value="Enviar">
            </form>
        </section>
    </div>
</body>
</html>