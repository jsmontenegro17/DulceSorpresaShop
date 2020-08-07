$(document).ready(function(){

	$('.add-cart').on('click', function(event){
		event.preventDefault();

		// const quantity = $("#quantity_input").val();
		// const data = $('form#form-combo').serialize()+ "&quantity=" + quantity;
		
		const url = $(this).data('url');
		const data = {
			quantity:$("#quantity_input").val(),
		}
		ajaxRequest(data, url, 'add_cart', 'GET');


	});

	function ajaxRequest(data, url, functions, type){

		var screen = $('#loading-screen');
		configureLoadingScreen(screen);

		$.ajax({
			url:url,
			type:type,
			data:data,
			success: function(answer){
				if (functions == 'add_cart') {
					// alert(answer);
					window.location.href = answer;
				}
			},
			error:function(){

			}
		});
	}

	function configureLoadingScreen(screen) {
    	$(document)
    		.ajaxStart(function(){
    			screen.fadeIn();
    		})
    		.ajaxStop(function(){
    			screen.fadeOut();
    		});
    }

});