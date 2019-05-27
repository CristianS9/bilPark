var g;
g.zonaSeleccionada = null;
g.posicion = false;
$(document).ready(function(){
    $("#nuevoAparcamiento").on("change","#zona",function(){
        g.zonaSeleccionada = $("#zona").val();
        $(".mapa").css("background-image", "url(../../images/zonas/zona" + g.zonaSeleccionada + "_ampliada.JPG)")
    });
    $(".mapa").click(function(event){
        var m = $(".mapa");
        var mapX = event.pageX - m.offset().left;
        var mapY = event.pageY - m.offset().top;
        var mapHeight = m.innerHeight();
        var mapWidth = m.innerWidth();


        // Coordenadas X e Y
        var puntoX = parseFloat(mapX / mapWidth * 100).toFixed(2);
        var puntoY = parseFloat(mapY / mapHeight * 100).toFixed(2);
        
        $("#punto-seleccionado").css("left",puntoX+"%");
        $("#punto-seleccionado").css("top",puntoY+"%");
        $("#posX").val(puntoX);
        $("#posY").val(puntoY);
        
        
        if(!g.posicion){
            $("#punto-seleccionado").css("display","grid");
        }
        
    });





});