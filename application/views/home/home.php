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
    <div class="contenidos-popup">
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
        <button class="boton abrir-registro">Registro</button>
    </div>
    <div class="contenido-registro">
        <h3>Hello</h3>
        <label class="label-reg-usuario">
            <input id="reg-usuario" name="reg-usuario" type="text" placeholder="Nombre de Usuario">
             <div class="respuesta">
                 <p class="nombre-usuario-corto">El nombre de usuario es demasiado corto<p>
                 <p class="nombre-usuario-ocupado">El nombre de usuario ya esta en uso<p>
                 <p class="nombre-usuario-largo">El nombre de usuario es demasiado largo<p>
            </div>
        </label>
        <label class="label-reg-contrasena">
            <input id="reg-contrasena" name="reg-contrasena" type="password" placeholder="Contraseña">
             <div class="respuesta">
                <p class="contrasena-corta">La contraseña es demsiado corta</p>
                <p class="contrasena-larga">La contraseña es demaisado larga</p>
                <p class="contrasena-minimos">La contraseña debe contener minusculas,mayusculas,un numero y un caracter especial</p>
            </div>
        </label>
        <label class="label-reg-rcontrasena">
            <input id="reg-rcontrasena" name="reg-rcontrasena" type="password" placeholder="Repite Contraseña">
             <div class="respuesta">
                <p class="rcontrasena-coincide">Las contraseñas no coinciden</p>
            </div>
        </label>
        <label class="label-reg-email">
            <input id="reg-email" name="reg-email" type="text" placeholder="Correo Electronico">
             <div class="respuesta">
                <p class="email-valido">No es un email valido</p>
            </div>
        </label>
        <label class="label-reg-remail">
            <input id="reg-remail" name="reg-remail" type="text" placeholder="Repita Correo">
             <div class="respuesta">
                <p class="remail-coincide">Las correos no coinciden</p>
            </div>
        </label>
        <label class="label-reg-nombre">
            <input id="reg-nombre" name="reg-nombre" type="text" placeholder="Nombre">
             <div class="respuesta">
                <p class="nombre-corto">El nombre es demasiado corto</p>
                <p class="nombre-largo">El nombre es demasiado largo</p>
            </div>
        </label>
        <label class="label-reg-apellidos">
            <input id="reg-apellidos" name="reg-apellidos" type="text" placeholder="Apellidos">
             <div class="respuesta">
                <p class="apellidos-corto">El nombre es demasiado corto</p>
                <p class="apellidos-largo">El nombre es demasiado largo</p>
            </div>
        </label>
        <label class="label-reg-telefono">
            <input id="reg-telefono" name="reg-telefono" type="text" placeholder="Telefono">
             <div class="respuesta">
                <p class="telefono-corto">El telefono es demasiado corto</p>
                <p class="telefono-largo">El telefono es demasiado largo</p>
                <p class="telefono-formato">El telefono solo puede contener numeros</p>
            </div>
        </label>
         <div class="interacion">
            <button botton="boton registrar">Registrar</button>
            <button botton="boton cancelar">Cancelar</button>
        </div>
        <button class="boton abrir-login">Login</button>
    </div>
    </div>
   
</body>
</html>