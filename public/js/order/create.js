$(document).ready(function(){
/////////////////////////////// AL CARGAR LA PAGINA SI HAY UN ERROR   

    $(".input-hidden-price").each(function() {

        // const id = parseInt($(this).attr("data-id"));
        const count = parseInt($(this).attr("data-count"));
        var price_total = $(this).val();

        // console.log("price"+id+"-"+count);

        $("#price"+count).attr('data-current-price',price_total);
        $("#price"+count).html(price_total);
    });



    $(".checkbox-product").each(function(){
        const id = parseInt($(this).attr("data-id"));
        const count = parseInt($(this).attr("data-count"));
        if( $(this).is(':checked') ){

            const units = parseInt($('#units'+id+'-'+count).val());   
            $('#units'+id+'-'+count).removeAttr('disabled');
            $('#units'+id+'-'+count).attr('min','1');
            $('#units'+id+'-'+count).attr('data-price-count',parseInt($(this).attr("data-price"))*units);

            if ($("#category-"+id+"-"+count).val()=="1") {

                if($("#category-"+id+"-"+count).data("product-count")==1){
                    $('#list-tab-'+count).append('<a class="list-group-item list-group-item-action list-product-'+count+' active show" data-count="'+count+'" id="list-home-list-'+id+'-'+count+'" data-toggle="list" href="#list-'+id+'-'+count+'" role="tab" aria-controls="home"></a>'); 
                    $('#list-'+id+"-"+count).addClass("show");
                    $('#list-'+id+"-"+count).addClass("active");
                }else{
                    $('#list-tab-'+count).append('<a class="list-group-item list-group-item-action list-product-'+count+'" data-count="'+count+'" id="list-home-list-'+id+'-'+count+'" data-toggle="list" href="#list-'+id+'-'+count+'" role="tab" aria-controls="home"></a>'); 
                }    
                $('#list-home-list-'+id+'-'+count).append($("#category-"+id+"-"+count).data("product-name")+' ('+$("#category-"+id+"-"+count).data("product-trademark")+')');
                $('#list-home-list-'+id+'-'+count).append('<span class="badge badge-warning badge-pill float-right" id="modification-count-'+id+'-'+count+'" style="font-size: 13px"></span>');
            }
            
        }


    });

    $(".units-product").each(function(){
        const count = parseInt($(this).attr("data-count"));
        const id = parseInt($(this).attr("data-id"));
        if ($(this).attr("disabled")){
            $(this).val(0);
        }

        const modification_count = $(this).val();
        const colors = $("#colors-"+id+"-"+count).val()
        const flavors = $("#flavors-"+id+"-"+count).val();
        const recipes = $("#recipes-"+id+"-"+count).val();

        // alert(recipes);

        $("#modification-count-"+id+"-"+count).html(modification_count);
        $("#list-"+id+"-"+count).html("");
        $("#list-"+id+"-"+count).append("<table class='table'><thead id='thead-modification-"+id+"-"+count+"'></thead><tbody id='tbody-modification-"+id+"-"+count+"'></tbody></table>");
        $("#tbody-modification-"+id+"-"+count).html("");
        $("#thead-modification-"+id+"-"+count).append("<tr class='bg-primary' style='color:white;'><th>"+$("#category-"+id+"-"+count).data("product-name")+"</th><th class='flavors-"+id+" text-center'>Sabores</th><th class='colors-"+id+" text-center'>Colores</th><th class='recipes-"+id+" text-center'>Recetas</th></tr>");
        for (var i = 0; i < modification_count; i++) {

            
            $("#tbody-modification-"+id+"-"+count).append("<tr><td># "+parseInt(i+1)+"</td> <td class='flavors-"+id+"'><select class='custom-select my-1 mr-sm-2 col-lg-12' id='select-flavors-"+id+"-"+count+"-"+parseInt(i+1)+"' name=''> <option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td><td class='colors-"+id+"'><select id='select-colors-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name=''><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select</td><td class='recipes-"+id+"'><select id='select-recipes-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name=''><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td></tr>");
           
            if (colors == "") {
                $("#select-colors-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                $(".colors-"+id).remove();
               
            }else{
                $.each(colors.split(","), function(key, colors){
                        $("#select-colors-"+id+"-"+count+"-"+parseInt(i+1)).append("<option value='"+colors+"'>"+colors+"</option>")
                });
            }
            if (flavors == "") {

                $("#select-flavors-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                $(".flavors-"+id).remove();

            }else{
                $.each(flavors.split(","), function(key, flavors){
                    $("#select-flavors-"+id+"-"+count+"-"+parseInt(i+1)).append("<option value='"+flavors+"'>"+flavors+"</option>")
                });
            }
            if (recipes == "") {

                $("#select-recipes-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                $(".recipes-"+id).remove(); 

            }else{
                $.each(recipes.split("->"), function(key, recipes){
                    if (recipes!="") {
                        $("#select-recipes-"+id+"-"+count+"-"+parseInt(i+1)).append("<option value='"+recipes+"'>"+recipes+"</option>");
                    } 
                });
            }
        }
    });

    $(".list-group-item").each(function(){
        const count = $(this).data("count"); 
        $("#count-product-modifiable-"+count).html($(".list-product-"+count).length);
        $("#count-product-modifiable-"+count).attr("data-current-count-product",($(".list-product-"+count).length));
        $("#collapse-modification-"+count).attr("data-count-product", ($(".list-product-"+count).length));
    });
   
    // $(".base").each(function(){
    //     if( $(this).is( ':checked' ) ){

    //         let price_base = parseInt($(this).attr('data-price-base'));
    //         let price_base_before = parseInt($(this).attr('data-price-before'));

    //         $(".units-product").attr('data-price-base', price_base);
    //         $(".base").attr('data-price-before', price_base);

    //         if(price == null){

    //             var price_total = $("#price-form").val();
    //             $("#price").attr('data-current-price',price_base);
    //             $("#price").html(price_base);   

    //         }else{

    //             var price_total = $("#price-form").val();
    //             $("#price").attr('data-current-price',price_total - price_base_before + price_base);
    //             $("#price").html(price_total - price_base_before + price_base);
    //         }
            
    //     }
    // });

////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////


    $(".checkbox-product").change(function(event) {
        event.preventDefault();

        const id = parseInt($(this).attr("data-id"));
        const count = parseInt($(this).attr("data-count"));
        const price = parseInt($(this).attr("data-price"));

        const count_product_modifiable = parseInt($("#count-product-modifiable-"+count).attr("data-current-count-product"));
        
    

        if( $(this).is(':checked') ){

            $('#units'+id+'-'+count).removeAttr('disabled');
            $('#units'+id+'-'+count).val('1');
            $('#units'+id+'-'+count).attr('min','1');
            $('#units'+id+'-'+count).attr('data-price-count',price);
            const units = $('#units'+id+'-'+count).val();

            
            if ($("#category-"+id+"-"+count).val()=="1") {

                if ($("#button-accordion-modification-"+count).attr("disabled")) {

                    $("#button-accordion-modification-"+count).removeAttr("disabled");
                }

                $("#count-product-modifiable-"+count).html(parseInt(count_product_modifiable+1));
                $("#count-product-modifiable-"+count).attr("data-current-count-product", parseInt(count_product_modifiable+1));
                $("#collapse-modification-"+count).attr("data-count-product", parseInt(count_product_modifiable+1));


                $('#list-tab-'+count).append('<a class="list-group-item list-group-item-action list-product-'+count+'" data-count="'+count+'" id="list-home-list-'+id+'-'+count+'" data-toggle="list" href="#list-'+id+'-'+count+'" role="tab" aria-controls="home"></a>'); 
                $('#list-home-list-'+id+'-'+count).append($("#category-"+id+"-"+count).data("product-name")+' ('+$("#category-"+id+"-"+count).data("product-trademark")+')');
                $('#list-home-list-'+id+'-'+count).append('<span class="badge badge-warning badge-pill float-right" id="modification-count-'+id+'-'+count+'" style="font-size: 13px">'+units+'</span>');

                const colors = $("#colors-"+id+"-"+count).val();
                const flavors = $("#flavors-"+id+"-"+count).val();
                const recipes = $("#recipes-"+id+"-"+count).val();

                $("#modification-count-"+id+"-"+count).html(units);
                $("#list-"+id+"-"+count).html("");
                $("#list-"+id+"-"+count).append("<table class='table'><thead id='thead-modification-"+id+"-"+count+"'></thead><tbody id='tbody-modification-"+id+"-"+count+"'></tbody></table>");
                $("#tbody-modification-"+id+"-"+count).html("");
                $("#thead-modification-"+id+"-"+count).html("");
                $("#thead-modification-"+id+"-"+count).append("<tr class='bg-primary' style='color:white;'><th>"+$("#category-"+id+"-"+count).data("product-name")+"</th><th class='flavors-"+id+" text-center'>Sabores</th><th class='colors-"+id+" text-center'>Colores</th><th class='recipes-"+id+" text-center'>Recetas</th></tr>");

                for (var i = 0; i < units; i++) {
                    $("#tbody-modification-"+id+"-"+count).append("<tr><td># "+parseInt(i+1)+"</td> <td class='flavors-"+id+"'><select class='custom-select my-1 mr-sm-2 col-lg-12' id='select-flavors-"+id+"-"+count+"-"+parseInt(i+1)+"' name=''> <option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td><td class='colors-"+id+"'><select id='select-colors-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name=''><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select</td><td class='recipes-"+id+"'><select id='select-recipes-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name=''><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td></tr>");
                   
                    if (colors == "") {
                        $("#select-colors-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                        $(".colors-"+id).remove();
                       
                    }else{
                        $.each(colors.split(","), function(key, colors){
                                $("#select-colors-"+id+"-"+count+"-"+parseInt(i+1)).append("<option value='"+colors+"'>"+colors+"</option>")
                        });
                    }
                    if (flavors == "") {

                        $("#select-flavors-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                        $(".flavors-"+id).remove();

                    }else{
                        $.each(flavors.split(","), function(key, flavors){
                            $("#select-flavors-"+id+"-"+count+"-"+parseInt(i+1)).append("<option value='"+flavors+"'>"+flavors+"</option>")
                        });
                    }
                    if (recipes == "") {

                        $("#select-recipes-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                        $(".recipes-"+id).remove(); 

                    }else{
                        $.each(recipes.split("->"), function(key, recipes){
                            if (recipes!="") {
                                $("#select-recipes-"+id+"-"+count+"-"+parseInt(i+1)).append("<option value='"+recipes+"'>"+recipes+"</option>");
                            } 
                        });
                    }
                }
                var count_list = 1;
                $(".list-product-"+count).each(function(){

                    $(this).removeClass("active");
                    var href = $(this).attr("href");
                        $(href).removeClass("show");
                        $(href).removeClass("active");


                    if (count_list == 1) {
                        
                        $(this).addClass("active");
                        $(href).addClass("show");
                        $(href).addClass("active");

                    }
                    count_list++
                });
            }
//////////////////////////////////////////////////////////////////// CUANDO SE QUITA EL CHECKED
        }else{
            $('#units'+id+'-'+count).attr('disabled','disabled');
            $('#units'+id+'-'+count).val('0');
            $('#units'+id+'-'+count).attr('data-price-count',0);
            $('#list-home-list-'+id+'-'+count).remove();
            $('#list-'+id+'-'+count).empty();
            if ($("#category-"+id+"-"+count).val()=="1") {

                $("#count-product-modifiable-"+count).html(parseInt(count_product_modifiable-1));
                $("#count-product-modifiable-"+count).attr("data-current-count-product", parseInt(count_product_modifiable-1));
                $("#collapse-modification-"+count).attr("data-count-product", parseInt(count_product_modifiable-1));

                if(parseInt(count_product_modifiable-1)==0){
                    
                    var count_collapse_modification = 1;
                    $("#button-accordion-modification-"+count).attr("disabled", "true");

                    $(".collapse-modification").each(function(){
                        const data_count_product = $(this).attr("data-count-product");
                        if (count_collapse_modification == 1 && data_count_product == 0) {
                            $(this).removeClass("show");
                        }else{
                            $(this).addClass("show");
                        }
                        count_collapse_modification++
                    });

                }

            }
            var count_list = 1;
            $(".list-product-"+count).each(function(){

                $(this).removeClass("active");
                var href = $(this).attr("href");
                    $(href).removeClass("show");
                    $(href).removeClass("active");


                if (count_list == 1) {
                    
                    $(this).addClass("active");
                    $(href).addClass("show");
                    $(href).addClass("active");

                }
                count_list++
            });

        }

        var price_total = 0;

        $(".units-product").each(function(){
            // alert($(this).attr("data-count"));
            if ($(this).attr("data-count")==count) {
                price_total += +$(this).attr('data-price-count');
            }
        });

        if ($(".units-product").attr("data-price-base")) {
            const price_base = parseInt($("#units"+id+'-'+count).attr('data-price-base'));
            $("#input"+count).val(price_total + price_base);
            $("#price"+count).attr('data-current-price',price_total + price_base);
            $("#price"+count).html(price_total + price_base);   
        }else{
            $("#input"+count).val(price_total);
            $("#price"+count).attr('data-current-price',price_total);
            $("#price"+count).html(price_total);    
        }

    });

////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////



    $('.units-product').change(function(event){

        const count = parseInt($(this).attr("data-count"));
        const id = parseInt($(this).attr("data-id"));
        const price_product =  parseInt($(this).attr('data-price'));
        const units =  parseInt($(this).val());
        const price_current = price_product * units; 
    
        $(this).attr('data-price-count',price_current);

        var price_total = 0;
        $(".units-product").each(function(){
            if ($(this).attr("data-count")==count) {
                price_total += +$(this).attr('data-price-count');
            }
        });



        if ($(".units-product").attr("data-price-base")) {
            const price_base = parseInt($("#units"+id+'-'+count).attr('data-price-base'));
            $("#input"+count).val(price_total + price_base);
            $("#price"+count).attr('data-current-price',price_total + price_base);
            $("#price"+count).html(price_total + price_base);   
        }else{
            $("#input"+count).val(price_total);
            $("#price"+count).attr('data-current-price',price_total);
            $("#price"+count).html(price_total);    
        }

        const modification_count = $(this).val();

        const colors = $("#colors-"+id+"-"+count).val();
        const flavors = $("#flavors-"+id+"-"+count).val();
        const recipes = $("#recipes-"+id+"-"+count).val();

        $("#modification-count-"+id+"-"+count).html(modification_count);
        $("#tbody-modification-"+id+"-"+count).html("");
        $("#thead-modification-"+id+"-"+count).html("");
        $("#thead-modification-"+id+"-"+count).append("<tr class='bg-primary' style='color:white;'><th>"+$("#category-"+id+"-"+count).data("product-name")+"</th><th class='flavors-"+id+" text-center'>Sabores</th><th class='colors-"+id+" text-center'>Colores</th><th class='recipes-"+id+" text-center'>Recetas</th></tr>");


        for (var i = 0; i < modification_count; i++) {
            $("#tbody-modification-"+id+"-"+count).append("<tr><td># "+parseInt(i+1)+"</td> <td class='flavors-"+id+"'><select class='custom-select my-1 mr-sm-2 col-lg-12' id='select-flavors-"+id+"-"+count+"-"+parseInt(i+1)+"' name=''> <option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td><td class='colors-"+id+"'><select id='select-colors-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name=''><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select</td><td class='recipes-"+id+"'><select id='select-recipes-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name=''><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td></tr>");
           
            if (colors == "") {
                $("#select-colors-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                $(".colors-"+id).remove();
               
            }else{
                $.each(colors.split(","), function(key, colors){
                        $("#select-colors-"+id+"-"+count+"-"+parseInt(i+1)).append("<option value='"+colors+"'>"+colors+"</option>")
                });
            }
            if (flavors == "") {

                $("#select-flavors-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                $(".flavors-"+id).remove();

            }else{
                $.each(flavors.split(","), function(key, flavors){
                    $("#select-flavors-"+id+"-"+count+"-"+parseInt(i+1)).append("<option value='"+flavors+"'>"+flavors+"</option>")
                });
            }
            if (recipes == "") {

                $("#select-recipes-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                $(".recipes-"+id).remove(); 

            }else{
                $.each(recipes.split("->"), function(key, recipes){
                    if (recipes!="") {
                        $("#select-recipes-"+id+"-"+count+"-"+parseInt(i+1)).append("<option value='"+recipes+"'>"+recipes+"</option>");
                    } 
                });
            }
        }
    });
///////////////////////////////////////////////////////////////////////////////////////////////

    $(".list-group-item").click(function(){
        const count = $(this).data("count"); 
        var count_list = 1;
        if($(this).is(".active")){
            // alert(hola);
        }else{
            $(".list-product-"+count).each(function(){
                if (count_list == 1) {

                    var href = $(this).attr("href");
                    $(href).removeClass("show");
                    $(href).removeClass("active");

                }
                count_list++
            });
        }
    });

    $('.dataTables_length').DataTable({
        "paging":   false,
        "filter": false,
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

	$(document).on('click','[data-toggle="lightbox"]', function(event){
	    event.preventDefault();
	    $(this).ekkoLightbox({
	    alwaysShowClose: true
		});
	 });

});