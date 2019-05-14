var g ={};
g.popupLogin = false;
g.popupRegistro = false;
g.usuarioDisponibleLogin = false;
g.loginUsuarioExiste = false;
g.contenido_login;
g.contenido_registro;

g.registro = {
    "usuario": false,
    "contrasena" : false,
    "rcontrasena" : false,
    "email" : false,
    "remail" :false,
    "nombre" : false,
    "apellidos" : false,
    "telefono" : false
}

$(document).ready(function(){
    g.contenido_login = $(".contenido-login").html();
    $(".contenido-login").html("");
    g.contenigo_registro = $(".contenido-registro").html();
    $(".contenido-registro").html("");
    
    abrirPopupLoginEvento(g.contenido_login);
    abrirPopupRegistroEvento(g.contenigo_registro)

    comprobacionTiempoReal();
    botonesActivos();   
    
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
function botonesActivos(){
    botonLogin();
    botonRegistrar();
}
function botonLogin(){
    $("body").on("click",".boton.login",function(){
        console.log("bb");
    });
}
function botonRegistrar(){
    $("body").on("click",".boton.registrar",function(){
        if (g.registro["usuario"] && g.registro["contrasena"] && g.registro["rcontrasena"] && g.registro["email"] 
            && g.registro["remail"] && g.registro["nombre"] && g.registro["apellidos"] && g.registro["telefono"]){ 
                const data = {
                    "usuario" : $("#reg-usuario").val().trim(),
                    "contrasena" : $("#reg-contrasena").val().trim(),
                    "rcontrasena" : $("#reg-rcontrasena").val().trim(),
                    "email" : $("#reg-email").val().trim(),
                    "remail" : $("#reg-remail").val().trim(),
                    "nombre" : $("#reg-nombre").val().trim(),
                    "apellidos" : $("#reg-apellidos").val().trim(),
                    "telefono": $("#reg-telefono").val().trim(),
                }
            $.ajax({
                url: "ajax/acceso/registrar",
                data: data,
                type: "POST",
                success: function (res) {
                    if(res=="1"){
                        g.popupRegistro.close();
                        iziToast.success({
                            title: 'Registrado',
                            message: 'correctamente, ya puedes inciar session',
                            position: 'topCenter'
                        });
                        
                        g.popupLogin = vex.open({
                            contentClassName: 'popup-login',
                            unsafeContent: g.contenido_login,
                            className: "vex-theme-flat-attack",
                            overlayClosesOnClick: false
                        });
                    } else{
                        notificacionErrorInseperado();
                        console.log(res);
                    }
                }, error: function (res) {
                    notificacionErrorInseperado();
                    console.log(res)
                }
            });
        }
    });
}
function notificacionErrorInseperado(){
    iziToast.error({
        title: 'Error',
        message: 'Por favor intentelo mas tarde <br>o pongase en contacto con un administrador',
        position: 'topRight'
    });
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
            compoIncorrecto("usuario");

        } else if(usuario.length<4){        
            compoIncorrecto("usuario","nombre-usuario-corto");

        }else if(usuario.length>25){
            compoIncorrecto("usuario", "nombre-usuario-largo");

        } else {
            nombreUsuarioExiste(usuario, function (res) {
                if (res == "1") {
                    compoIncorrecto("usuario", "nombre-usuario-ocupado");

                } else {
                    campoCorrecto("usuario");

                }
            });
        }
        
    });
}
function campoCorrecto(label){
    g.registro[label] = true;

    $(".label-reg-"+label+">.respuesta>p").css("display", "none");
    $(".label-reg-"+label+">.input-base>i").css("display", "grid");
}
function compoIncorrecto(label,mensaje){
    g.registro[label] = false;

    $(".label-reg-"+label+">.input-base>i").css("display", "none");
    $(".label-reg-"+label+">.respuesta>p").css("display", "none");
    if(mensaje){
        $(".label-reg-"+label+">.respuesta>."+mensaje).css("display", "grid");
    }
}

function abrirPopupLoginEvento(contenido_login){
    $("body").on("click", ".abrir-login", function () {
        if(g.popupRegistro){
            g.popupRegistro.close();            
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
            g.popupLogin.close();
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
        url: "ajax/acceso/nombreUsuarioExiste",
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
            compoIncorrecto("contrasena");
 
        }else if (contrasena.length < 4) {
            compoIncorrecto("contrasena","contrasena-corta");
        }else if(contrasena.length>50){
            compoIncorrecto("contrasena","contrasena-larga");
        } else if (!minimos.test(contrasena)){
            compoIncorrecto("contrasena","contrasena-minimos");
        } else {
            campoCorrecto("contrasena");
        }

    });
}
function comprobacionRContrasenaEvento(){
    $("body").on("keyup", "#reg-rcontrasena", function () {
        rcontrasena = $(this).val().trim();
        contrasena = $("#reg-contrasena").val().trim();

        if (rcontrasena.length <= 0) {
            compoIncorrecto("rcontrasena");
             
        } else if(rcontrasena==contrasena){
            campoCorrecto("rcontrasena");

        } else {
            compoIncorrecto("rcontrasena","rcontrasena-coincide");
        }

    });
}
function comprobacionEmailEvento(){
    const formato = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    $("body").on("keyup", "#reg-email", function () {
        email = $(this).val().trim();

        if (email.length <= 0) {
            compoIncorrecto("email");

        } else if (!formato.test(email)) {
            compoIncorrecto("email","email-valido");

        } else if (email.length>50) {
            compoIncorrecto("email", "email-largo");

        } else {
            emailExiste(email, function (res) {
                if (res == "1") {
                    compoIncorrecto("email", "email-ocupado");

                } else {
                    campoCorrecto("email");

                }
            });
        }
    });
}
function emailExiste(email,callback){
    $.ajax({
        url: "ajax/acceso/emailExiste",
        data: { "email": email },
        type: "POST",
        success: function (res) {
            callback(res);
        }, error: function (res) {
            console.log(res)
        }
    });
}
function comprobacionREmailEvento(){
    $("body").on("keyup", "#reg-remail", function () {
        remail = $(this).val().trim();
        email = $("#reg-email").val().trim();

        if (remail.length <= 0) {
            compoIncorrecto("remail");

        } else if (remail != email) {

            compoIncorrecto("remail", "remail-coincide");

        } else {
            campoCorrecto("remail");

        }

    });
}
function comprobacionNombreEvento(){
    $("body").on("keyup", "#reg-nombre", function () {
        nombre = $(this).val().trim();

        if (nombre.length <= 0) {
            $(".label-reg-nombre>.respuesta>p").css("display", "none");
            compoIncorrecto("nombre");

        } else if (nombre.length < 4) {
            compoIncorrecto("nombre","nombre-corto");

        } else if (nombre.length > 50) {
            compoIncorrecto("nombre","nombre-largo");

        } else  {
            campoCorrecto("nombre");

        }
    });
}
function comprobacionApellidosEvento(){
    $("body").on("keyup", "#reg-apellidos", function () {
        apellidos = $(this).val().trim();

        if (apellidos.length <= 0) {
            compoIncorrecto("apellidos");
            
        } else if (apellidos.length < 4) {
            compoIncorrecto("apellidos","apellidos-corto");
            
        } else if (apellidos.length > 50) {
            compoIncorrecto("apellidos","apellidos-largo");
            
        } else {
            campoCorrecto("apellidos");
            
        }
    });
}
function comprobacionTelefonoEvento(){
    const formato = /^\d+$/;
    $("body").on("keyup", "#reg-telefono", function () {
        telefono = $(this).val().trim();
        if (telefono.length <= 0) {
            compoIncorrecto("telefono");
        
        }else if (!formato.test(telefono)) {
            compoIncorrecto("telefono","telefono-formato");
            
        } else if (telefono.length < 5) {
            compoIncorrecto("telefono","telefono-corto");
            
        } else if (telefono.length > 15) {
            compoIncorrecto("telefono","telefono-largo");

        } else {
            campoCorrecto("telefono");

        }
    });
}