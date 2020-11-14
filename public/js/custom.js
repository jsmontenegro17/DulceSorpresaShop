$(document).ready(function(){
	$(".newsletter_form").submit(function(event) {
		event.preventDefault();

		$("#body").css("overflow","hidden");
        $("#message-loading").html("Cargando tu peticion...")
        $("#message-loading").attr("data-message","Cargando tu peticion...")
        $("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");
        $("#newsletter_input").attr("placeholder", "Ingrese su dirección de correo electrónico");
        
	    const url = "?c=Subscription&a=save";
        const data = {
            subscription_email:$("#newsletter_input").val(),
        }

        
        // var screen = $('#loading-screen');
        // configureLoadingScreen(screen);

        $.ajax({
            url:url,
            type:"POST",
            data:data,
            success: function(answer){
                // console.log(answer);
                
                $("#newsletter_input").val("");
                $(".newsletter_button").html(answer);
                $("#body").css("overflow","visible");
			    $("#loading-screen").css("display","none");
			    $("#loading-screen").css("opacity","0");
                setTimeout(function(){ $(".newsletter_button").html("Suscribirce"); }, 3000);
                // $(".newsletter_button").attr("disabled", true);
            },
            error:function(){

            }
        });
	});

	$(".newsletter_unsubscribe_link").click(function(event) {
		event.preventDefault();

		$("#body").css("overflow","hidden");
        $("#message-loading").html("Cargando tu peticion...")
        $("#message-loading").attr("data-message","Cargando tu peticion...")
        $("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");


	    const url = "?c=Subscription&a=updateState";

	    if($("#newsletter_input").val()==""){
	    	$("#body").css("overflow","visible");
			$("#loading-screen").css("display","none");
			$("#loading-screen").css("opacity","0");
	    	$("#newsletter_input").attr("placeholder", "ESCRIBA EL CORREO PARA DARLE DE BAJA")
	    }else{

	        const data = {
	            subscription_email:$("#newsletter_input").val(),
	        }

	        
	        // var screen = $('#loading-screen');
	        // configureLoadingScreen(screen);

	        $.ajax({
	            url:url,
	            type:"POST",
	            data:data,
	            success: function(answer){
	                // console.log(answer);
	                // $("#newsletter_input").val("");
	                $("#newsletter_input").val("");
	                $(".newsletter_button").html(answer);
	                $("#body").css("overflow","visible");
				    $("#loading-screen").css("display","none");
				    $("#loading-screen").css("opacity","0");
	                setTimeout(function(){ $(".newsletter_button").html("Suscribirce"); }, 3000);
	                // $(".newsletter_button").attr("disabled", true);
	            },
	            error:function(){

	            }
	        });
    	}
	});
});