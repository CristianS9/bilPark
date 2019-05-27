var g;
g.popup = [];
g.eliminarAparcamiento = false;
$(document).ready(function(){
    $(".aparcamientos").on("click",".eliminar-aparcamiento",function(){
            g.eliminarAparcamiento = $(this).attr("aparcamiento_id");
            let nombre = $(".aparcamiento.id-" + g.eliminarAparcamiento + " .nombre").html();
            $("#nombre-aparcamiento").html(nombre);
            let contenido = $(".confirmacion-eliminar").html();
        	g.popup["confirmacion-eliminar"] = vex.open({
        		contentClassName: 'popup-eliminar_aparcamiento',
        		unsafeContent: contenido,
        		className: "vex-theme-flat-attack",
        		overlayClosesOnClick: false
            });
            
    });
 
    $("body").on("click", "#cancelar-eliminacion", function () {
        g.popup["confirmacion-eliminar"].close();
        g.eliminarAparcamiento = false;
    });
    $("body").on("click", "#confirmar-eliminacion", function () {
 
            eliminarAparcamiento(function(res){
                if(res==0){
                    $(".aparcamiento.id-" + g.eliminarAparcamiento + " .nombre").remove();
                        g.popup["confirmacion-eliminar"].close();
                        g.eliminarAparcamiento = false;
                        iziToast.success({
                            title: 'Aparacamiento',
                            message: 'eliminado correctamente !',
                            position: 'topRight'
                        });
                } else {
                    iziToast.error({
                        title: 'Error',
                        message: 'no se ha podido eliminar este aparcamiento, por favor intentelo mas tarde.',
                        position: 'topRight'
                    });

                }
            }); 
        
    });
    
});
function eliminarAparcamiento(callback){
    $.ajax({
        url: "ajax/administrar/eliminarAparcamiento",
        type: "POST",
        data: {
            "id": g.eliminarAparcamiento
        },
        success: function (res) {
            callback(res);
        },
        error: function (err) {
            notificacionError("Error LogOut", "por favor intentalo denuevo dentro de unos minutos");
        }
    });
}