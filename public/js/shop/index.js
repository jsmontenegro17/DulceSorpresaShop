window.onload = function () {

    var container = document.getElementById('loading-screen');
    var body = document.getElementById('body');
    var title = document.getElementById('title');

    setInterval(changeMessage, 5000);
    
    title.innerHTML= "NUESTRA TIENDA"
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

	$('.show-content-modal').on('click', function (event) {
        event.preventDefault();

        $("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");


        const url = $(this).attr('href');
		const data = {
			combo_id:$(this).attr("data-id")
		}
		// console.log($(this).attr("data-id"));
		ajaxRequest(data, url, 'show', 'POST');
    });

    $('#close-modal').on('click', function (event) {
        event.preventDefault();
        $("#body").css("overflow","visible");
        $('#modal-show-content').removeClass('show');
        $('#modal-show-content').css("display", "none");
        $("#bloqueo").removeClass("modal-backdrop fade show");
    });

    $('.product_fav').on("click", function (event){

    	$("#body").css("overflow","hidden");
		$("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");

    	var url = "";

    	if($(this).hasClass("active")==true){
    		url = $(this).data("url");
    		$("#message-loading").html("Agregando a tus favoritos.");
			$("#message-loading").attr("data-message","Agregando a tus favoritos.");
    	}else{
    		url = "?c=shop&a=removerFav&combo_id=&combo_id="+$(this).data("id");
    		$("#message-loading").html("Quitando de tus favoritos.");
			$("#message-loading").attr("data-message","Quitando de tus favoritos.");
    	}
    	
    	const data = ""

    	ajaxRequest(data, url, 'fav', 'GET');
	});

	function ajaxRequest(data, url, functions, type){

		
		
		$.ajax({
			url:url,
			type:type,
			data:data,
			success: function(answer){
				if (functions == 'show'){
					
					$('.modal-body').html(answer)
					$('#modal-show-content').addClass('show');
			        $('#modal-show-content').css("display", "block");
			        $("#bloqueo").addClass("modal-backdrop fade show");

			        $("#loading-screen").css("display","none");
        			$("#loading-screen").css("opacity","0");

				}else if (functions == 'fav'){

					console.log(answer);
					if (answer=="0") {
						alert("Ya tienes este producto como favorito");
					}else if (answer=="1"){
						$("#fav_count_product").html(parseInt($("#input-fav-count").val())+1);
						$("#input-fav-count").val(parseInt($("#input-fav-count").val())+1);
						$("#body").css("overflow","visible");
						$("#loading-screen").css("display","none");
				        $("#loading-screen").css("opacity","0");
					}else if (answer=="2"){
						$("#fav_count_product").html(parseInt($("#input-fav-count").val())-1);
						$("#input-fav-count").val(parseInt($("#input-fav-count").val())-1);
						$("#body").css("overflow","visible");
						$("#loading-screen").css("display","none");
				        $("#loading-screen").css("opacity","0");
					}
				}
			},
			error:function(){

			}
		});
	}
});