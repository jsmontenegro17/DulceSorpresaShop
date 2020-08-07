$(document).ready(function(){

	$('.show-content-modal').on('click', function (event) {
        event.preventDefault();
        
        const url = $(this).attr('href');
		const data = {
			combo_id:$(this).attr("data-id")
		}
		ajaxRequest(data, url, 'show', 'POST');
    });

    $('#close-modal').on('click', function (event) {
        event.preventDefault();
        $('#modal-show-content').removeClass('show');
        $('#modal-show-content').css("display", "none");
        $("#bloqueo").removeClass("modal-backdrop fade show");
    });

    

	function ajaxRequest(data, url, functions, type){

		var screen = $('#loading-screen');
		configureLoadingScreen(screen);
		
		$.ajax({
			url:url,
			type:type,
			data:data,
			success: function(answer){
				if (functions == 'combo_destroy') {
					

				}else if (functions == 'show'){
					$('.modal-body').html(answer)
					$('#modal-show-content').addClass('show');
			        $('#modal-show-content').css("display", "block");
			        $("#bloqueo").addClass("modal-backdrop fade show");
				}else if (functions == 'state'){
					window.location.href = url;
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