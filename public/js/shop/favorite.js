window.onload = function () {

    var container = document.getElementById('loading-screen');
    var body = document.getElementById('body');
    var title = document.getElementById('title');
    setInterval(changeMessage, 5000);
    title.innerHTML= "LISTA DE FAVORITOS";
    body.style.overflow = "visible";
    container.style.display = "none";
    container.style.opacity = "0";
}

$(document).ready(function(){

	$("a").on("click", function() {
		$("#body").css("overflow","hidden");
		$("#message-loading").html("Cargando tu peticion...")
		$("#message-loading").attr("data-message","Cargando tu peticion...")
		$("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");
	});

	$('.add-cart').on('click', function(event){
		event.preventDefault();

		$(this).attr("disableb");
		$("#body").css("overflow","hidden");
		$("#message-loading").html("Agregando al carrito.");
		$("#message-loading").attr("data-message","Agregando al carrito.");
		$("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");

		
		const url = $(this).data('url');
		const data = {
			quantity:$("#quantity_input").val(),
		}
		ajaxRequest(data, url, 'add_cart', 'GET');


	});

	function ajaxRequest(data, url, functions, type){


		$.ajax({
			url:url,
			type:type,
			data:data,
			success: function(answer){
				if (functions == 'add_cart') {
					// alert(answer);
					window.location.href = answer;
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

	$(".btn-delete").click(function(event){
		event.preventDefault();
		$("#body").css("overflow","hidden");
		$("#message-loading").html("Quitando de tus favoritos.");
		$("#message-loading").attr("data-message","Quitando de tus favoritos.");
		$("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");

		const id = $(this).data("id");
		const url = "?c=shop&a=removerFav";
		const count = $("#input-cart-count").val();


		const data = {
			combo_id:$(this).data("id"),
		}

		$.ajax({
			url:url,
			type:"GET",
			data:data,
			success: function(answer){
				if (answer=="") {
					answer = 0;
				}

				$("#li-"+id).remove();

				$("#fav_count_product").html(parseInt($("#input-fav-count").val())-1);
				$("#input-fav-count").val(parseInt($("#input-fav-count").val())-1);



		        if($("#input-fav-count").val()==0){
		        	$(".cart_list").html("<li class='cart_item clearfix text-center'><h3>No tienes favoritos</h3></li>");
		        	$("#add-favorites").html("<i class='fa fa-plus-circle'></i> Agrega tu primer <span class='hidden-max-992px'>combo</span>");
		        	
		        }

		       	$("#body").css("overflow","visible");
				$("#loading-screen").css("display","none");
		        $("#loading-screen").css("opacity","0");
			},
			error:function(){

			}
		});

	});
});