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
    <link rel="stylesheet" href="<?php echo base_url();?>css/perfil.css">
    <script src="<?php echo base_url();?>js/componentes/header.js"></script>
    <script src="<?php echo base_url();?>js/perfil.js"></script>


</head>
<body>
    <div class="container">
        <?php $this->load->view("componentes/header");?>
        <section>
            <div class="info-perfil"></div>
                <h3>Datos Personales</h3>
                <div>
                    <p>Usuario</p>
                    <p><?php echo $perfil->usuario;?></p>
                </div>
                <div>
                    <p>Contraseña</p>
                    <p>**********</p>
                </div>
                <div>
                    <p>Nombre</p>
                    <p><?php echo $perfil->nombre;?></p>
                </div>
                <div>
                    <p>Apellidos</p>
                    <p><?php echo $perfil->apellidos;?></p>
                </div>
                <div>
                    <p>Email</p>
                    <p><?php echo $perfil->email;?></p>
                </div>
                <div>
                    <p>Telefono</p>
                    <p><?php echo $perfil->telefono;?></p>
                </div>
                
                


                
            <div class="info-reservas"></div>
        </section>
    </div>
    
  
   
</body>
</html>