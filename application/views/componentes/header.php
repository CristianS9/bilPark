<header>
    <img src="<?php echo base_url(); ?>images/logo.png" alt="">
    <div class="menu">
        <div>Elemento 1</div>
        <div>Elemento 2</div>
        <div>Elemento 3</div>
        <div>Elemento 4</div>
        <div>Elemento 5</div>
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
            <p id="usuario"><?php echo $usuario; ?></p> 
            <img class="log-out" src="<?php echo base_url(); ?>images/logout.png" alt=""> 
        </div>
        <div class="desconocido" style="display:<?php echo $desconocido;?>">
            <button class="abrir-login">Login</button>
            <button class="abrir-registro">Registro</button>
        </div>
    </div>
</header>