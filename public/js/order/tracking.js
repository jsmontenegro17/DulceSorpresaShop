window.onload = function () {

    var container = document.getElementById('loading-screen');
    var body = document.getElementById('body');
    var title = document.getElementById('title');

    setInterval(changeMessage, 5000);
    
    title.innerHTML= "RASTREA TU ORDEN";
    body.style.overflow = "visible";
    container.style.display = "none";
    container.style.opacity = "0";
	
}

$(document).ready(function(){


	$("#form-tracking").submit(function(event) {
		event.preventDefault();

		$("#body").css("overflow","hidden");
        $("#message-loading").html("Cargando tu peticion...")
        $("#message-loading").attr("data-message","Cargando tu peticion...")
        $("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");

	    const url = "?c=Order&a=tracking";
        const data = $(this).serialize();

        
        // var screen = $('#loading-screen');
        // configureLoadingScreen(screen);

        $.ajax({
            url:url,
            type:"POST",
            data:data,
            success: function(answer){
                console.log(answer);
                
                if (answer == 0) {
                	$("#body").css("overflow","visible");
			        $("#loading-screen").css("display","none");
			        $("#loading-screen").css("opacity","0");
                	$(".lead").html("Orden y codigo no coiciden en la base de datos");
                	$(".display-4").html("Vuelve a digitar los datos");
                	$(".message").html("");
                }else{
                	$("#body").css("overflow","visible");
			        $("#loading-screen").css("display","none");
			        $("#loading-screen").css("opacity","0");
                	$("#form-tracking")[0].reset();
                	$(".jumbotron").html(answer);
                }
                // $(".newsletter_button").attr("disabled", true);
            },
            error:function(){

            }
        });
	});

});