$(document).ready(function(){
    $(".info-reservas").on("click", ".eliminar-reserva", function () {
        const idReserva = $(this).attr("idReserva");
        eliminarReserva(idReserva,function(res){
            if (res == 0) {
              	$(".reserva_" + idReserva).remove();
        
              	iziToast.success({
              		title: 'Reserva',
              		message: 'eliminada correctamente !',
              		position: 'topRight'
              	});
            } else {
                iziToast.error({
                    title: 'Error',
                    message: 'no se ha podido eliminar este aparcamiento, por favor intentelo mas tarde.',
                    position: 'topRight'
                });

            };
        });
       
     
   

    });
});
function eliminarReserva(id,callback) {
	$.ajax({
		url: "ajax/perfil/eliminarReserva",
		type: "POST",
		data: {
			"id": id
		},
		success: function (res) {
			callback(res);
		},
		error: function (err) {
			notificacionError("Error LogOut", "por favor intentalo denuevo dentro de unos minutos");
		}
	});
}