<header>
    <img src="<?php echo base_url(); ?>images/logo.png" alt="">
    <div class="menu">
        <a href="<?php echo base_url() ?>index.php/home">Turismo</a>
        <a href="<?php echo base_url() ?>index.php/reservar">Reservar Parking</a>
        <a href="<?php echo base_url() ?>index.php/empresas">Para Empresas</a>
        <a href="<?php echo base_url() ?>index.php/actualizaciones">Actualizaciones</a>
  
        <?php 
            $admin = "none";
            if(isset($this->session->rango)){
                if($this->session->rango=="2" || $this->session->rango=="3" ){
                    $admin = "grid";
                    
                }
            }
        ?>
        <div class="administrador" style="display:<?php echo $admin; ?>">
            <a href="<?php echo base_url() ?>index.php/administrar">Administrar</a>
        </div>
    </div>
    <div class="usuario">
        <?php 
            $usuario = "";
            $logeado = "none";
            $desconocido = "grid";
            if(isset($this->session->usuario)){
            
                $usuario = $this->session->usuario;
                $logeado = "grid";
                $desconocido = "none";
            }   
        ?>
        <div class="logeado" style="display:<?php echo $logeado;?>">
            <a href="<?php echo base_url() ?>index.php/perfil" id="usuario">    <?php echo $usuario; ?></a> 
            <img class="log-out" src="<?php echo base_url(); ?>images/logout.png" alt=""> 
        </div>
        <div class="desconocido" style="display:<?php echo $desconocido;?>">
            <button class="abrir-login">Login</button>
            <button class="abrir-registro">Registro</button>
        </div>
    </div>
</header>
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
            <input id="log-contrasena" name="log-contrasena" type="password" placeholder="Contraseña">
            <div class="respuesta">
                <i class="fas fa-check"></i>
                <i class="fas fa-times"></i>
            </div>
        </label>
        <div class="interacion">
            <button class="boton login">LogIn</button>
            <button class="boton cancelar-login">Cancelar</button>
        </div>
        <button class="boton abrir-registro">Registro</button>
        </div>
        <div class="contenido-registro">
            <h3>Registro</h3>
            <label class="label-reg-usuario">
                <div class="input-base">
                    <input id="reg-usuario" name="reg-usuario" type="text" placeholder="Nombre de Usuario">
                    <i class="fas fa-check"></i>
                </div>
                <div class="respuesta">
                    <p class="nombre-usuario-corto">El nombre de usuario es demasiado corto<p>
                    <p class="nombre-usuario-ocupado">El nombre de usuario ya esta en uso<p>
                    <p class="nombre-usuario-largo">El nombre de usuario es demasiado largo<p>
                </div>
            </label>
            <label class="label-reg-contrasena">
                <div class="input-base">
                    <input id="reg-contrasena" name="reg-contrasena" type="password" placeholder="Contraseña">
                    <i class="fas fa-check"></i>
                </div>
                <div class="respuesta">
                    <p class="contrasena-corta">La contraseña es demsiado corta</p>
                    <p class="contrasena-larga">La contraseña es demaisado larga</p>
                    <p class="contrasena-minimos">La contraseña debe contener minusculas,mayusculas,un numero y un caracter especial</p>
                </div>
            </label>
            <label class="label-reg-rcontrasena">
                <div class="input-base">
                    <input id="reg-rcontrasena" name="reg-rcontrasena" type="password" placeholder="Repite Contraseña">
                    <i class="fas fa-check"></i>
                </div>
                <div class="respuesta">
                    <p class="rcontrasena-coincide">Las contraseñas no coinciden</p>
                </div>
            </label>
            <label class="label-reg-email">
                <div class="input-base">
                    <input id="reg-email" name="reg-email" type="text" placeholder="Correo Electronico">
                    <i class="fas fa-check"></i>
                </div>

                <div class="respuesta">
                    <p class="email-valido">No es un correo valido</p>
                    <p class="email-largo">Esta correo ya esta en uso,por favor elija otro</p>
                    <p class="email-ocupado">Esta correo ya esta en uso,por favor elija otro</p>
                </div>
            </label>
            <label class="label-reg-remail">
                <div class="input-base">
                    <input id="reg-remail" name="reg-remail" type="text" placeholder="Repita Correo">
                    <i class="fas fa-check"></i>
                </div>
                <div class="respuesta">
                    <p class="remail-coincide">Las correos no coinciden</p>
                </div>
            </label>
            <label class="label-reg-nombre">
                <div class="input-base">
                    <input id="reg-nombre" name="reg-nombre" type="text" placeholder="Nombre">
                    <i class="fas fa-check"></i>
                </div>
                <div class="respuesta">
                    <p class="nombre-corto">El nombre es demasiado corto</p>
                    <p class="nombre-largo">El nombre es demasiado largo</p>
                </div>
            </label>
            <label class="label-reg-apellidos">
                <div class="input-base">
                    <input id="reg-apellidos" name="reg-apellidos" type="text" placeholder="Apellidos">
                    <i class="fas fa-check"></i>
                </div>
                <div class="respuesta">
                    <p class="apellidos-corto">Los apellidos son demasiado cortos</p>
                    <p class="apellidos-largo">Los apellidos son demasiado largos</p>
                </div>
            </label>
            <label class="label-reg-telefono">
                <div class="input-base">
                    <input id="reg-telefono" name="reg-telefono" type="text" placeholder="Telefono">
                    <i class="fas fa-check"></i>
                </div>
                <div class="respuesta">
                    <p class="telefono-corto">El telefono es demasiado corto</p>
                    <p class="telefono-largo">El telefono es demasiado largo</p>
                    <p class="telefono-formato">El telefono solo puede contener numeros</p>
                </div>
            </label>
            <div class="interacion">
                <button class="boton registrar">Registrar</button>
                <button class="boton cancelar-registrar">Cancelar</button>
            </div>
            <button class="boton abrir-login">Login</button>
        </div>
    </div>