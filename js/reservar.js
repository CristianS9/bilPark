var g;
g.seleccionZona = true;
g.aparcamientoSeleccionado = false;
g.horaInicio = new Date("Sun Dec 31 1899 01:00:00 GMT-0014");
g.horaFin = new Date("Sun Dec 31 1899 01:30:00 GMT-0014");


g.popup = [];
g.popup["infoAparcamiento"] = false;

$(document).ready(function(){
    botones();
    elementosActivos();  

});

function botones(){
    clicZona();
    abrirZonas();
    botonInfoAparcamiento();
    botonReservar();
}
function abrirZonas(){
    $(".abrir-zonas").click(function(){
        $(".zonas").css("display","grid");
        $(".mapa").css("background-image", "url(../images/zonas/base.JPG)");
        $(".simbolo-mapa").css("display","none");
    });
}
function botonReservar(){
    $("body").on("click",".reservar-aparcamiento",function(){
        let vInicio = valorTiempo(g.horaInicio);
        let vFin = valorTiempo(g.horaFin);
        let estado = $(".desconocido").css("display");
        if(estado =="grid"){
            g.popupLogin = vex.open({
            	contentClassName: 'popup-login',
            	unsafeContent: g.contenido_login,
            	className: "vex-theme-flat-attack",
            	overlayClosesOnClick: false
            });
        } else if (vInicio == vFin) {
            iziToast.warning({
                title: 'Incorrecto',
                message: 'La estancia minima es de 30 minutos!',
                position: 'topRight'
            });
        } else if (vInicio > vFin) {
            iziToast.warning({
                title: 'Aluncinante',
                message: 'pero no tenemos politica para viajes en el tiempo!',
                position: 'topRight'
            });
        } else {
            reservar(function(res){
                if(1==res){
                    iziToast.error({
                      	title: 'Error',
                      	message: 'por favor, intentelo mas tarde!',
                      	position: 'topRight'
                    });
                } else if(2==res){
                    iziToast.warning({
                    	title: 'Ocupado',
                    	message: 'Este aparcamiento no dispone de plazas con el horario elegido, prueba con otro u en un aparcamiento diferente',
                    	position: 'topRight'
                    });
                } else if(0==res){
                    g.popup["infoAparcamiento"].close();
                    iziToast.success({
                    	title: 'Reserva',
                    	message: 'relizada correctamente',
                    	position: 'topRight'
                    });
                }
            });
        }
    });
    
}
function reservar(callback) {
    const horaInicio = "1899-12-31 "+g.horaInicio.getHours()+":"+g.horaInicio.getMinutes()+":"+g.horaInicio.getSeconds();
    const horaFin = "1899-12-31 " + g.horaFin.getHours() + ":" + g.horaFin.getMinutes() + ":" + g.horaFin.getSeconds();
    const num = (valorTiempo(g.horaFin)-valorTiempo(g.horaInicio))/30;

    const data = {
        "id": g.aparcamientoSeleccionado,
        "hora_inicio": horaInicio,
        "hora_fin": horaFin,
        "num" : num

    };
    $.ajax({
       	url: "ajax/reservar/reservarAparcamiento",
       	type: "POST",
           data: data,
       	success: function (res) {
       		callback(res);
       	},
       	error: function (err) {
       		notificacionError("Error con la base de datos", "por favor intentalo denuevo dentro de unos minutos");
       	}
    }); 
}

function botonInfoAparcamiento(){
    $(".mapa").on("click", ".simbolo-mapa", function () {
        g.aparcamientoSeleccionado = $(this).attr("idApa");
        popupDatosAparcamiento();
    });
}
function clicZona(){
     $("section").on("click", ".zonas>div", function () {
     	g.seleccionZona = false;
     	let idZona = $(this).attr("value");
     	$(".zonas").css("display", "none");
     	$(".mapa").css("background-image", "url(../images/zonas/zona" + idZona + "_ampliada.JPG)");
     	$(".simbolo-mapa.zona_" + idZona).css("display", "grid");
     });
}
function elementosActivos(){
    cambioZonaMapa();

}
function cambioZonaMapa(){
    $("section").on("mouseenter", ".zonas>div", function () {
        let idZona = $(this).attr("value");
        $(".mapa").css("background-image", "url(../images/zonas/zona" + idZona + ".JPG)")
    });
    $("section").on("mouseleave", ".zonas", function () {
        if (g.seleccionZona) {
            $(".mapa").css("background-image", "url(../images/zonas/base.JPG)");
        }
    });
}
function popupDatosAparcamiento(){
    getDatosAparcamiento(function (res) {
        $("#nombre-aparcamiento").html(res.nombre);
        $("#precio").html(res.precio);
        mostrarDatosAparcamiento();
    });
}
function valorTiempo(tiempo){
    
    let minutos = tiempo.getMinutes();
    minutos = minutos + tiempo.getHours() * 60;
    return minutos;
}
function mostrarDatosAparcamiento(){
    let contenido = $(".info-aparcamiento").html();
      g.popup["infoAparcamiento"] = vex.open({
      	contentClassName: 'popup-info_aparcamiento',
      	unsafeContent: contenido,
      	className: "vex-theme-flat-attack",
      	overlayClosesOnClick: false
      });
      $('input#hora-inicio').timepicker({
      	timeFormat: 'HH:mm',
      	interval: 30,
      	minTime: '01:00',
      	maxTime: '23:30',
      	defaultTime: '01:00',
      	startTime: '01:00',
      	dynamic: false,
      	dropdown: true,
        scrollbar: true,
        change: function (time) {
            g.horaInicio = time;

        }
    });
    $('input#hora-fin').timepicker({
        timeFormat: 'HH:mm',
        interval: 30,
        minTime: '01:30',
        maxTime: '23:30',
        defaultTime: '01:30',
      	startTime: '01:30',
      	dynamic: false,
      	dropdown: true,
        scrollbar: true,
        change: function (time) {
              g.horaFin = time;

        }
      });
}
function getDatosAparcamiento(callback){
    $.ajax({
    	url: "ajax/reservar/datosAparcamiento",
    	type: "POST",
    	data: {
    		"id": g.aparcamientoSeleccionado
        },
        dataType: "json",
    	success: function (res) {
    		callback(res);
    	},
    	error: function (err) {
    		notificacionError("Error con la base de datos", "por favor intentalo denuevo dentro de unos minutos");
    	}
    });
}