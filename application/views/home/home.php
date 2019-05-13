<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Menus VEX -->
    <script src="<?php echo base_url();?>lib/vex/js/vex.combined.min.js"></script>
    <script>vex.defaultOptions.className = 'vex-theme-os'</script>
    <link rel="stylesheet" href="<?php echo base_url();?>lib/vex/css/vex.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>lib/vex/css/vex-theme-flat-attack.css" />

    <!-- Estilos -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>css/home.css">

    <!--Scripts -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>js/home.js"></script>


    <title>bilPark</title>
</head>
<body>
    <button class="abrir-login">Login</button>
    <div class="contenido-login">
        <h3>Login</h3>
        <label class="label-log-usuario">
            <input id="log-usuario" name="log-usuario" type="text" placeholder="Usuario">
            <div class="respuesta">
                <i class="fas fa-check"></i>
                <i class="fas fa-times"></i>
            </div>
        </label>
        <label class="label-log-contrasena">
            <input id="log-contrasena" name="log-contrasena" type="contrasena" placeholder="Contraseña">
            <div class="respuesta">
                <i class="fas fa-check"></i>
                <i class="fas fa-times"></i>
            </div>
        </label>
        <div class="interacion">
            <button botton="boton login">LogIn</button>
            <button botton="boton cancelar">Cancelar</button>
        </div>
        <button class="boton popup-registro">Registro</button>
    </div>
</body>
</html>