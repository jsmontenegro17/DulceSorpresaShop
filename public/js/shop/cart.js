$(document).ready(function(){

	$(".btn-delete").click(function(event){
		event.preventDefault();

		const id = $(this).data("id");
		const url = "?c=cart&a=remove";
		const count = $("#input-cart-count").val();


		const data = {
			combo_id:$(this).data("id"),
		}

		
		var screen = $('#loading-screen');
		configureLoadingScreen(screen);

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

		var screen = $('#loading-screen');
		configureLoadingScreen(screen);

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
			},
			error:function(){

			}
		});

	});


	function configureLoadingScreen(screen) {
    	$(document)
    		.ajaxStart(function(){
    			screen.fadeIn();
    		})
    		.ajaxStop(function(){
    			screen.fadeOut();
    		});
    }

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