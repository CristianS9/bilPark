var g ={};
g.popupLogin = false;
g.usuarioDisponibleLogin = false;
$(document).ready(function(){
    const contenido_login = $(".contenido-login").html();
    $(".contenido-login").html("");
    
    abrirPopupLoginActivo(contenido_login);
    comprobacionUsuarioDisponibleLogin();
    
});
function comprobacionUsuarioDisponibleLogin(){
    let usuario = "";
    $("body").on("keyup","#log-usuario",function(){
        usuario = $(this).val();
        nombreUsuarioDisponilbe(usuario,function(res){
            if(res=="1"){
                $(".label-log-usuario>.respuesta>.fa-times").css("display","none");
                $(".label-log-usuario>.respuesta>.fa-check").css("display","grid");
            } else{
                $(".label-log-usuario>.respuesta>.fa-check").css("display", "none");
                $(".label-log-usuario>.respuesta>.fa-times").css("display", "grid");

            }
        });
    });
}
function abrirPopupLoginActivo(contenido_login){
    $(".abrir-login").click(function(){
        g.popupLogin = vex.open({
            contentClassName: 'popup-login',
            unsafeContent: contenido_login,
            className: "vex-theme-flat-attack"
        });
    });
}
function nombreUsuarioDisponilbe(nombre,callback){
    $.ajax({
        url: "ajax/login/nombreUsuarioDisponible",
        data: {"nombre":nombre},
        type:"POST",
        success:function(res){
            callback(res);
        },error:function(res){
            console.log(res)
        }
    });
}