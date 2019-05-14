var g ={};
g.popupLogin = false;
g.popupRegistro = false;
g.usuarioDisponibleLogin = false;
g.loginUsuarioExiste = false;

g.registroUsuario = false;
g.registroContrasena = false;
g.registroRContrasena = false;
g.registroEmail = false;
g.registroREmail = false;
g.registroNombre = false;
g.registroApellidos = false;
g.registrarTelefono = false;

$(document).ready(function(){
    const contenido_login = $(".contenido-login").html();
    $(".contenido-login").html("");
    const contenigo_registro = $(".contenido-registro").html();
    $(".contenido-registro").html("");
    
    abrirPopupLoginEvento(contenido_login);
    abrirPopupRegistroEvento(contenigo_registro)

    comprobacionTiempoReal();
   
    
});
function comprobacionTiempoReal(){
    //    LOGIN
    comprobacionUsuarioExisteEvento();

    // REGISTRO
    comprobacionUsuarioDisponilbeEvento();
    comprobacionContrasenaEvento();
    comprobacionRContrasenaEvento();
    comprobacionEmailEvento();
    comprobacionREmailEvento();
    comprobacionNombreEvento();
    comprobacionApellidosEvento();
    comprobacionTelefonoEvento();
}
function comprobacionUsuarioExisteEvento(){
    let usuario = "";
    $("body").on("keyup","#log-usuario",function(){
        usuario = $(this).val();
        nombreUsuarioExiste(usuario,function(res){
            if(res=="1"){
                g.loginUsuarioExiste= true;
                $(".label-log-usuario>.respuesta>.fa-times").css("display","none");
                $(".label-log-usuario>.respuesta>.fa-check").css("display","grid");
            } else{
                g.loginUsuarioExiste = false;
                $(".label-log-usuario>.respuesta>.fa-check").css("display", "none");
                $(".label-log-usuario>.respuesta>.fa-times").css("display", "grid");

            }
        });
    });
}
function comprobacionUsuarioDisponilbeEvento() {
    let usuario = "";
    $("body").on("keyup", "#reg-usuario", function () {
        usuario = $(this).val().trim();
        if(usuario.length<=0){
            $(".label-reg-usuario>.respuesta>p").css("display", "none");
        }
        else if(usuario.length<4){
            $(".label-reg-usuario>.respuesta>p").css("display", "none");
            $(".label-reg-usuario>.respuesta>.nombre-usuario-corto").css("display", "grid");
        } else {
            nombreUsuarioExiste(usuario, function (res) {
                if (res == "1") {
                    g.registroUsuario = true;
                    $(".label-reg-usuario>.respuesta>p").css("display", "none");
                    $(".label-reg-usuario>.respuesta>.nombre-usuario-ocupado").css("display", "grid");
                } else {
                    g.registroUsuario = false;
                    $(".label-reg-usuario>.respuesta>p").css("display", "none");

                }
            });
        }
        
    });
}
function abrirPopupLoginEvento(contenido_login){
    $("body").on("click", ".abrir-login", function () {
        if(g.popupRegistro){
            vex.close(g.popupRegistro);
        }
        g.popupLogin = vex.open({
            contentClassName: 'popup-login',
            unsafeContent: contenido_login,
            className: "vex-theme-flat-attack",
            overlayClosesOnClick: false
        });
    });
}
function abrirPopupRegistroEvento(contenido_registro){
    $("body").on("click",".abrir-registro",function(){
        if(g.popupLogin){
          
            vex.close(g.popupLogin);
        }
        g.popupRegistro = vex.open({
            contentClassName: 'popup-registro',
            unsafeContent: contenido_registro,
            className: "vex-theme-flat-attack",
            overlayClosesOnClick: false
        });
    });
}

function nombreUsuarioExiste(nombre,callback){
    $.ajax({
        url: "ajax/login/nombreUsuarioExiste",
        data: {"nombre":nombre},
        type:"POST",
        success:function(res){
            callback(res);
        },error:function(res){
            console.log(res)
        }
    });
}
function comprobacionContrasenaEvento(){
    const minimos = /^\S*(?=\S{4,})(?=\S*[a-z])(?=\S*[\W])(?=\S*[A-Z])(?=\S*[\d])\S*$/;
    $("body").on("keyup", "#reg-contrasena", function () {
        contrasena = $(this).val().trim();
        if (contrasena.length <= 0) {
            $(".label-reg-contrasena>.respuesta>p").css("display", "none");
            g.registroContrasena = false;
        }else if (contrasena.length < 4) {
            $(".label-reg-contrasena>.respuesta>p").css("display", "none");
            $(".label-reg-contrasena>.respuesta>.contrasena-corta").css("display", "grid");
            g.registroContrasena = false;
        }else if(contrasena.length>50){
            $(".label-reg-contrasena>.respuesta>p").css("display", "none");
            $(".label-reg-contrasena>.respuesta>.contrasena-larga").css("display", "grid");
            g.registroContrasena = false;
        } else if (!minimos.test(contrasena)){
            $(".label-reg-contrasena>.respuesta>p").css("display", "none");
            $(".label-reg-contrasena>.respuesta>.contrasena-minimos").css("display", "grid");
            g.registroContrasena = false;
        } else {
            $(".label-reg-contrasena>.respuesta>p").css("display", "none");
            g.registroContrasena = true;
        }

    });
}
function comprobacionRContrasenaEvento(){
    $("body").on("keyup", "#reg-rcontrasena", function () {
        rcontrasena = $(this).val().trim();
        contrasena = $("#reg-contrasena").val().trim();
        if (rcontrasena.length <= 0) {
            $(".label-reg-rcontrasena>.respuesta>p").css("display", "none");
            g.registroRContrasena = false;
             
        } else if(rcontrasena==contrasena){
            $(".label-reg-rcontrasena>.respuesta>p").css("display", "none");
            g.registroRContrasena = true;
        } else {
            $(".label-reg-rcontrasena>.respuesta>p").css("display", "none");
            $(".label-reg-rcontrasena>.respuesta>.rcontrasena-coincide").css("display", "grid");
            g.registroRContrasena = false;
        }

    });
}
function comprobacionEmailEvento(){
    const formato = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    $("body").on("keyup", "#reg-email", function () {
        email = $(this).val().trim();
        if (email.length <= 0) {
            $(".label-reg-email>.respuesta>p").css("display", "none");
            g.registroEmail = false;
        } else if (!formato.test(email)) {
            $(".label-reg-email>.respuesta>p").css("display", "none");
            $(".label-reg-email>.respuesta>.email-valido").css("display", "grid");
            g.registroEmail = false;
        } else {
            $(".label-reg-email>.respuesta>p").css("display", "none");
            g.registroEmail = true;
        }
    });
}
function comprobacionREmailEvento(){
    $("body").on("keyup", "#reg-remail", function () {
        remail = $(this).val().trim();
        email = $("#reg-email").val().trim();
        if (remail.length <= 0) {
            $(".label-reg-remail>.respuesta>p").css("display", "none");
            g.registroREmail = false;

        } else if (remail == email) {
            $(".label-reg-remail>.respuesta>p").css("display", "none");
            g.registroREmail = true;
        } else {
            $(".label-reg-remail>.respuesta>p").css("display", "none");
            $(".label-reg-remail>.respuesta>.remail-coincide").css("display", "grid");
            g.registroREmail = false;
        }

    });
}
function comprobacionNombreEvento(){
    $("body").on("keyup", "#reg-nombre", function () {
        nombre = $(this).val().trim();

        if (nombre.length <= 0) {
            $(".label-reg-nombre>.respuesta>p").css("display", "none");
            g.registroNombre = false;

        } else if (nombre.length < 4) {
            $(".label-reg-nombre>.respuesta>p").css("display", "none");
            $(".label-reg-nombre>.respuesta>.nombre-corto").css("display", "grid");
            g.registroNombre = false;
        } else if (nombre.length > 50) {
            $(".label-reg-nombre>.respuesta>p").css("display", "none");
            $(".label-reg-nombre>.respuesta>.nombre-largo").css("display", "grid");
            g.registroNombre = false;
        } else  {
            $(".label-reg-nombre>.respuesta>p").css("display", "none");
            g.registroNombre = false;
        }
    });
}
function comprobacionApellidosEvento(){
    $("body").on("keyup", "#reg-apellidos", function () {
        apellidos = $(this).val().trim();

        if (apellidos.length <= 0) {
            $(".label-reg-apellidos>.respuesta>p").css("display", "none");
            g.registroApellidos = false;

        } else if (apellidos.length < 4) {
            $(".label-reg-apellidos>.respuesta>p").css("display", "none");
            $(".label-reg-apellidos>.respuesta>.apellidos-corto").css("display", "grid");
            g.registroApellidos = false;
        } else if (apellidos.length > 50) {
            $(".label-reg-apellidos>.respuesta>p").css("display", "none");
            $(".label-reg-apellidos>.respuesta>.apellidos-largo").css("display", "grid");
            g.registroApellidos = false;
        } else {
            $(".label-reg-apellidos>.respuesta>p").css("display", "none");
            g.registroApellidos = true;
        }
    });
}
function comprobacionTelefonoEvento(){
    const formato = /^\d+$/;
    $("body").on("keyup", "#reg-telefono", function () {
        telefono = $(this).val().trim();

        if (!formato.test(telefono)) {
            $(".label-reg-telefono>.respuesta>p").css("display", "none");
            $(".label-reg-telefono>.respuesta>.telefono-formato").css("display", "grid");
            g.registrarTelefono = false;
        }else if (telefono.length <= 0) {
            $(".label-reg-telefono>.respuesta>p").css("display", "none");
            g.registrarTelefono = false;
        } else if (telefono.length < 5) {
            $(".label-reg-telefono>.respuesta>p").css("display", "none");
            $(".label-reg-telefono>.respuesta>.telefono-corto").css("display", "grid");
            g.registrarTelefono = false;
        } else if (telefono.length > 15) {
            $(".label-reg-telefono>.respuesta>p").css("display", "none");
            $(".label-reg-telefono>.respuesta>.telefono-largo").css("display", "grid");
            g.registrarTelefono = false;
        } else {
            $(".label-reg-telefono>.respuesta>p").css("display", "none");
            g.registrarTelefono = true;
        }
    });
}