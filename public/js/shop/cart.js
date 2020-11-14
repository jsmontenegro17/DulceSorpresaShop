window.onload = function () {

    var container = document.getElementById('loading-screen');
    var body = document.getElementById('body');
    var title = document.getElementById('title');
    setInterval(changeMessage, 5000);
    title.innerHTML= "TU CARRITO DE COMPRAS";
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

	$(".btn-delete").click(function(event){
		event.preventDefault();
		$("#body").css("overflow","hidden");
		$("#message-loading").html("Eliminando combo del carrito.");
		$("#message-loading").attr("data-message","Eliminando combo del carrito.");
		$("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");

		const id = $(this).data("id");
		const url = "?c=cart&a=remove";
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

				$(".order_total_amount").html("$ "+answer);
				$("#order_total").val(answer);
				$(".cart_price").html("$ "+answer)
				$("#cart_count_product").html(count-1);
				$("#input-cart-count").val(count-1);

				

        		if($("#input-cart-count").val()==0){
		        	$(".cart_list").html("<li class='cart_item clearfix text-center'><h3>No tienes favoritos</h3></li>");
		        	$(".cart_buttons").removeClass("col-lg-6");
		        	$(".cart_buttons").addClass("col-lg-12");
		        	$("#add-cart").html("<i class='fa fa-plus-circle'></i> Agrega tu primer <span class='hidden-max-992px'>combo</span>");
		        	$(".btn-make-order").remove();
		        }

		        $("#body").css("overflow","visible");
				$("#loading-screen").css("display","none");
        		$("#loading-screen").css("opacity","0");
	
			},
			error:function(){

			}
		});

	});



	$('#myList a').on('click', function (e) {
		e.preventDefault();
		$(this).tab('show');
	});


	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$(".quantity-combo").on('change', function(e){
		e.preventDefault();

		$("#body").css("overflow","hidden");
		$("#message-loading").html("Cambiando cantidad.");
		$("#message-loading").attr("data-message","Cambiando cantidad.");
		$("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");

		const url = "?c=cart&a=quantity&id_combo=";
		const id = $(this).data("id");
		const price = $("#price-"+id).val();
		const quantity = $(this).val();
		const price_total = quantity*price;
		const data = {
			combo_id:$(this).data("id"),
			quantity:$(this).val(),
		}
		var order_total = 0;

		$.ajax({
			url:url,
			type:"GET",
			data:data,
			success: function(answer){

				$("#price-quantity-"+id).html("$ "+price_total);
				$("#price-quantity-total-"+id).val(price_total);

				$('.price_quantity').each(function(){
					// alert($(this).val());
				    order_total += Number($(this).val());
				});

				$(".order_total_amount").html("$ "+order_total);
				$("#order_total").val(order_total);
				$(".cart_price").html("$ "+order_total);

				$("#body").css("overflow","visible");
				$("#loading-screen").css("display","none");
        		$("#loading-screen").css("opacity","0");
			},
			error:function(){

			}
		});

	});

	$(".btn-make-order").on("click", function(){
		$("#message-loading").html("Preparando la pagina para que hagas tu orden.");
		$("#message-loading").attr("data-message","Preparando la pagina para que hagas tu orden.");
	});

    $(document).on('click','[data-toggle="lightbox"]', function(event){
	    event.preventDefault();
	    $(this).ekkoLightbox({
	      alwaysShowClose: true
	    });
	});

    $('#table-products').DataTable({
        "paging":   false,
        "info": false,
        "language": {
            "lengthMenu": "Ver _MENU_ ",
            "zeroRecords": "Lo sentimos, no se encontro ningun combo",
            "info": "Paginas para ver _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "search":         "Buscar:",
            "infoFiltered": "( _MAX_ combos)",
            "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            }
        }
    }); 

});