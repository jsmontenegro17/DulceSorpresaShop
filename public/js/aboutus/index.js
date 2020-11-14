window.onload = function () {

    var container = document.getElementById('loading-screen');
    var body = document.getElementById('body');
    var title = document.getElementById('title');

    setInterval(changeMessage, 5000);
    
    title.innerHTML= "¿QUIENES SOMOS?";
    body.style.overflow = "visible";
    container.style.display = "none";
    container.style.opacity = "0";
	
}

$(document).ready(function(){

	$(".load").on("click", function() {
		$("#body").css("overflow","hidden");
		$("#message-loading").html("Cargando tu peticion...")
		$("#message-loading").attr("data-message","Cargando tu peticion...")
		$("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");
	});

});

