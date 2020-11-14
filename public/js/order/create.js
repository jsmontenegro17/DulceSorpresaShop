$(document).ready(function(){


/////////////////////////////// AL CARGAR LA PAGINA 
var noConflict = jQuery.noConflict();
//////////////////////////////////////////////////
// CARGA DE LA FECHA ACTUAL
//////////////////////////////////////////////////
    
    moment.tz("America/Bogota");
    var date_ac = moment().add(3, "days").format("Y-MM-DD");

    $("#order_delivery_date").attr("value",date_ac);
    $("#order_delivery_date").attr("min",date_ac);

    // console.log(date_ac);

//////////////////////////////////////////////////
//////////////////////////////////////////////////

    $(".prevent").click(function(event){
        event.preventDefault();
    });

    noConflict('.select_search').select2({
        theme: "bootstrap4"
    });

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

            
            if ($("#category-modification-"+id+"-"+count).val()=="1") {
                // console.log($("#category-modification-"+id+"-"+count).data("product-count"));
                if($("#category-modification-"+id+"-"+count).data("product-count")==1){
                    $('#list-tab-modification-'+count).append('<a class="list-group-item list-group-item-action list-product-modification list-product-modification-'+count+' active show" data-count="'+count+'" id="list-modification-list-'+id+'-'+count+'" data-toggle="list" href="#list-modification-'+id+'-'+count+'" role="tab" aria-controls="modification"></a>'); 
                    $('#list-modification-'+id+'-'+count).addClass("show");
                    $('#list-modification-'+id+'-'+count).addClass("active");
                }else{
                    $('#list-tab-modification-'+count).append('<a class="list-group-item list-group-item-action list-product-modification list-product-modification-'+count+'" data-count="'+count+'" id="list-modification-list-'+id+'-'+count+'" data-toggle="list" href="#list-modification-'+id+'-'+count+'" role="tab" aria-controls="modification"></a>'); 
                }    
                $('#list-modification-list-'+id+'-'+count).append('<div class="img-thumbnail justify-content-center" style="width: 42px; height: 40px; overflow: hidden;"><a href="'+$("#category-modification-"+id+"-"+count).data("product-image")+'" data-gallery="product-gallery-'+id+'" data-title="'+$("#category-modification-"+id+"-"+count).data("product-name")+' ('+$("#category-modification-"+id+"-"+count).data("product-trademark")+')" data-toggle="lightbox"><img width="100%" height="auto" src="'+$("#category-modification-"+id+"-"+count).data("product-image")+'"></a></div>');
                // $('#list-modification-list-'+id+'-'+count).append('<span class="badge badge-warning badge-pill float-right" id="modification-count-'+id+'-'+count+'" style="font-size: 13px"></span>');

                var count_list = 1;
                $(".list-product-modification-"+count).each(function(){

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

            if ($("#category-customization-"+id+"-"+count).val()=="2") { 

                if($("#category-customization-"+id+"-"+count).data("product-count")==1){
                    $('#list-tab-customization-'+count).append('<a class="list-group-item list-group-item-action list-product-customization list-product-customization-'+count+' active show" data-count="'+count+'" id="list-customization-list-'+id+'-'+count+'" data-toggle="list" href="#list-customization-'+id+'-'+count+'" role="tab" aria-controls="customization"></a>'); 
                    $('#list-customization-'+id+'-'+count).addClass("show");
                    $('#list-customization-'+id+'-'+count).addClass("active");
                }else{
                    $('#list-tab-customization-'+count).append('<a class="list-group-item list-group-item-action list-product-customization list-product-customization-'+count+'" data-count="'+count+'" id="list-customization-list-'+id+'-'+count+'" data-toggle="list" href="#list-customization-'+id+'-'+count+'" role="tab" aria-controls="customization"></a>'); 
                }    
                $('#list-customization-list-'+id+'-'+count).append('<div class="img-thumbnail justify-content-center" style="width: 42px; height: 40px; overflow: hidden;"><a href="'+$("#category-customization-"+id+"-"+count).data("product-image")+'" data-gallery="product-gallery-'+id+'" data-title="'+$("#category-customization-"+id+"-"+count).data("product-name")+' ('+$("#category-customization-"+id+"-"+count).data("product-trademark")+')" data-toggle="lightbox"><img width="100%" height="auto" src="'+$("#category-customization-"+id+"-"+count).data("product-image")+'"></a></div>');
                // $('#list-customization-list-'+id+'-'+count).append('<span class="badge badge-warning badge-pill float-right" id="customization-count-'+id+'-'+count+'" style="font-size: 13px"></span>');
            }



        }


    });

    $(".units-product").each(function(){
        const count = parseInt($(this).attr("data-count"));
        const id = parseInt($(this).attr("data-id"));
        if ($(this).attr("disabled")){
            $(this).val(0);
        }

        if ($("#category-modification-"+id+"-"+count).val()=="1") {
            
            const modification_count = $(this).val();
            const colors = $("#colors-"+id+"-"+count).val()
            const flavors = $("#flavors-"+id+"-"+count).val();
            const recipes = $("#recipes-"+id+"-"+count).val();

            // alert(recipes);

            
            $("#list-modification-"+id+"-"+count).html("");
            $("#list-modification-"+id+"-"+count).append("<table class='table'><thead id='thead-modification-"+id+"-"+count+"'></thead><tbody id='tbody-modification-"+id+"-"+count+"'></tbody></table>");
            $("#tbody-modification-"+id+"-"+count).html("");
            $("#thead-modification-"+id+"-"+count).append("<tr class='bg-primary' style='color:white;'><th class='hidden-max-992px'>"+$("#category-modification-"+id+"-"+count).data("product-name")+"</th><th class='flavors-"+id+" text-center'>Sabores ("+modification_count+")</th><th class='colors-"+id+" text-center'>Colores ("+modification_count+")</th><th class='recipes-"+id+" text-center'>Recetas ("+modification_count+")</th></tr>");
            for (var i = 0; i < modification_count; i++) {

                
                $("#tbody-modification-"+id+"-"+count).append("<tr><td class='hidden-max-992px'># "+parseInt(i+1)+"</td> <td class='flavors-"+id+"'><select class='custom-select my-1 mr-sm-2 col-lg-12' id='select-flavors-"+id+"-"+count+"-"+parseInt(i+1)+"' name='select_flavors["+count+"]["+id+"]["+parseInt(i+1)+"]'> <option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td><td class='colors-"+id+"'><select id='select-colors-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name='select_colors["+count+"]["+id+"]["+parseInt(i+1)+"]'><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select</td><td class='recipes-"+id+"'><select id='select-recipes-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name='select_recipes["+count+"]["+id+"]["+parseInt(i+1)+"]'><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td></tr>");
               
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
        }

        if ($("#category-customization-"+id+"-"+count).val()=="2") {
            
            const customization_count = $(this).val();
            const text = $("#text-"+id+"-"+count).val()
            const image = $("#image-"+id+"-"+count).val();  

            $("#customization-count-"+id+"-"+count).html(customization_count);
            $("#list-customization-"+id+"-"+count).html("");
            $("#list-customization-"+id+"-"+count).append("<table class='table'><thead id='thead-customization-"+id+"-"+count+"'></thead><tbody id='tbody-customization-"+id+"-"+count+"'></tbody></table>");
            $("#tbody-customization-"+id+"-"+count).html("");
            $("#thead-customization-"+id+"-"+count).append("<tr class='bg-primary' style='color:white;'><th class='hidden-max-992px'>"+$("#category-customization-"+id+"-"+count).data("product-name")+"</th><th class='text-"+id+" text-center'>Texto ("+customization_count+")</th><th class='image-"+id+" text-center'>Imagen ("+customization_count+")</th></tr>");
            for (var i = 0; i < customization_count; i++) {

                
                // $("#tbody-customization-"+id+"-"+count).append("<tr><td class='hidden-max-992px'># "+parseInt(i+1)+"</td> <td class='text-"+id+"'><input type='text' placeholder='Nombre o frase' class='form-control' id='input-text-"+id+"-"+count+"-"+parseInt(i+1)+"' name='input_text["+count+"]["+id+"]["+parseInt(i+1)+"]'></td><td class='image-"+id+"'><input type='file' id='file-image-"+id+"-"+count+"-"+parseInt(i+1)+"' class='form-control' name='input_file_"+count+"_"+id+"_"+parseInt(i+1)+"'></td></tr>");
                $("#tbody-customization-"+id+"-"+count).append("<tr><td class='hidden-max-992px'># "+parseInt(i+1)+"</td> <td class='text-"+id+"'><input type='text' placeholder='Nombre o frase' class='form-control' id='input-text-"+id+"-"+count+"-"+parseInt(i+1)+"' name='input_text["+count+"]["+id+"]["+parseInt(i+1)+"]'></td><td class='image-"+id+"'><div class='col-sm-4 text-center'><div class='kv-avatar'><div class='file-loading'><input id='input_file_"+count+"_"+id+"_"+parseInt(i+1)+"' name='input_file_"+count+"_"+id+"_"+parseInt(i+1)+"' type='file' required></div></div></div></td></tr>");
                noConflict("#input_file_"+count+"_"+id+"_"+parseInt(i+1)).fileinput({
                    theme: "fa", // sireve para la seleccion de tema de iconos.
                    language: "es", //selecciona lenguaje.
                    maxFileSize: 5000, //tamaño maximo del archivo.
                    showClose: false,
                    showCaption: false,
                    showZoom: false,
                    browseLabel: '', //nombre del boto de seleccion o carga de archivo.
                    browseIcon: '<i class="fa fa-folder-open"></i>', //sirve para Seleccionar el icono que deseemos.
                    browseClass: 'btn btn-primary', // para seleccionar la clase del boton que tenemos.
                    removeLabel: '',
                    removeIcon: '<i class="fa fa-trash-alt"></i>', //seleccion de icono para quitar el archivo.
                    removeClass: 'btn btn-secondary', // clase del boto quitar
                    elErrorContainer: '#kv-user-errors-1', //informe de error
                    msgErrorClass: 'alert alert-block alert-danger',
                    defaultPreviewContent: '<img id="user-image-default" src="https://www.dropbox.com/s/0zvf0jmjo2b9cz2/1f3f7.png?raw=1" alt="Imagen del usuario">', //seleccionai magen por defecto
                    layoutTemplates: {main2: '{preview} {remove} {browse}'}, //botones del plugin,
                    allowedFileExtensions: ["jpg", "png", "gif"] //tipos de formatos que acepta el plugin.
                });

                if (image == null) {
                    $("#file-image-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                    $(".image-"+id).remove();
                   
                }
                if (text == null) {

                    $("#input-text-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                    $(".text-"+id).remove();

                }

            }
        }
    });

    $(".list-product-modification").each(function(){

        const count = $(this).data("count");
        $("#count-product-modification-"+count).html($(".list-product-modification-"+count).length);
        $("#count-product-modification-"+count).attr("data-current-count-product", ($(".list-product-modification-"+count).length));
        $("#collapse-modification-"+count).attr("data-count-product", ($(".list-product-modification-"+count).length));


    });

    $(".list-product-customization").each(function(){

        const count = $(this).data("count");
        $("#count-product-customization-"+count).html($(".list-product-customization-"+count).length);
        $("#count-product-customization-"+count).attr("data-current-count-product", ($(".list-product-customization-"+count).length));
        $("#collapse-customization-"+count).attr("data-count-product", ($(".list-product-customization-"+count).length));


    });

    $(".collapse-modification").each(function(){
        const count = $(this).data("count");
        if ($("#count-product-modification-"+count).attr("data-current-count-product")==0) {
           $("#button-accordion-modification-"+count).attr("disabled", "true");
           $("#collapse-modification-"+count).removeClass("show");   

        }
    });

    $(".collapse-customization").each(function(){
        const count = $(this).data("count");
        if ($("#count-product-customization-"+count).attr("data-current-count-product")==0) {
           $("#button-accordion-customization-"+count).attr("disabled", "true");
           $("#collapse-customization-"+count).removeClass("show");   
        }
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

        const count_product_modification = parseInt($("#count-product-modification-"+count).attr("data-current-count-product"));
        const count_product_customization = parseInt($("#count-product-customization-"+count).attr("data-current-count-product"));
        

        if( $(this).is(':checked') ){

            $('#units'+id+'-'+count).removeAttr('disabled');
            $('#units'+id+'-'+count).val('1');
            $('#units'+id+'-'+count).attr('min','1');
            $('#units'+id+'-'+count).attr('data-price-count',price);
            const units = $('#units'+id+'-'+count).val();

            
            if ($("#category-modification-"+id+"-"+count).val()=="1") {

                if ($("#button-accordion-modification-"+count).attr("disabled")) {

                    $("#button-accordion-modification-"+count).removeAttr("disabled");
                }

                $("#count-product-modification-"+count).html(parseInt(count_product_modification+1));
                $("#count-product-modification-"+count).attr("data-current-count-product", parseInt(count_product_modification+1));
                $("#collapse-modification-"+count).attr("data-count-product", parseInt(count_product_modification+1));


                $('#list-tab-modification-'+count).append('<a class="list-group-item list-group-item-action list-product-modification list-product-modification-'+count+'" data-count="'+count+'" id="list-modification-list-'+id+'-'+count+'" data-toggle="list" href="#list-modification-'+id+'-'+count+'" role="tab" aria-controls="modification"></a>'); 
                $('#list-modification-list-'+id+'-'+count).append('<div class="img-thumbnail justify-content-center" style="width: 42px; height: 40px; overflow: hidden;"><a href="'+$("#category-modification-"+id+"-"+count).data("product-image")+'" data-gallery="product-gallery-'+id+'" data-title="'+$("#category-modification-"+id+"-"+count).data("product-name")+' ('+$("#category-modification-"+id+"-"+count).data("product-trademark")+')" data-toggle="lightbox"><img width="100%" height="auto" src="'+$("#category-modification-"+id+"-"+count).data("product-image")+'"></a></div>');
                
                // $('#list-modification-list-'+id+'-'+count).append($("#category-modification-"+id+"-"+count).data("product-name")+' ('+$("#category-modification-"+id+"-"+count).data("product-trademark")+')');
                // $('#list-modification-list-'+id+'-'+count).append('<span class="badge badge-warning badge-pill float-right" id="modification-count-'+id+'-'+count+'" style="font-size: 13px">'+units+'</span>');

                const colors = $("#colors-"+id+"-"+count).val();
                const flavors = $("#flavors-"+id+"-"+count).val();
                const recipes = $("#recipes-"+id+"-"+count).val();

                $("#modification-count-"+id+"-"+count).html(units);
                $("#list-modification-"+id+'-'+count).html("");
                $("#list-modification-"+id+'-'+count).append("<table class='table'><thead id='thead-modification-"+id+"-"+count+"'></thead><tbody id='tbody-modification-"+id+"-"+count+"'></tbody></table>");
                $("#tbody-modification-"+id+"-"+count).html("");
                $("#thead-modification-"+id+"-"+count).html("");
                $("#thead-modification-"+id+"-"+count).append("<tr class='bg-primary' style='color:white;'><th class='hidden-max-992px'>"+$("#category-modification-"+id+"-"+count).data("product-name")+"</th><th class='flavors-"+id+" text-center'>Sabores ("+units+")</th><th class='colors-"+id+" text-center'>Colores ("+units+")</th><th class='recipes-"+id+" text-center'>Recetas ("+units+")</th></tr>");

                for (var i = 0; i < units; i++) {
                    $("#tbody-modification-"+id+"-"+count).append("<tr><td class='hidden-max-992px'># "+parseInt(i+1)+"</td> <td class='flavors-"+id+"'><select class='custom-select my-1 mr-sm-2 col-lg-12' id='select-flavors-"+id+"-"+count+"-"+parseInt(i+1)+"' name='select_flavors["+count+"]["+id+"]["+parseInt(i+1)+"]'> <option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td><td class='colors-"+id+"'><select id='select-colors-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name='select_colors["+count+"]["+id+"]["+parseInt(i+1)+"]'><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select</td><td class='recipes-"+id+"'><select id='select-recipes-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name='select_recipes["+count+"]["+id+"]["+parseInt(i+1)+"]'><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td></tr>");
                   
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
                $(".list-product-modification-"+count).each(function(){

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
                var count_collapse_modification=1;
                $(".collapse-modification").each(function(){
                    const count = $(this).data("count");
                    $(this).removeClass("show");
                    if (count_collapse_modification==1) {
                       $("#collapse-modification-"+count).addClass("show");   
                    }
                    count_collapse_modification++;
                });

            }//// Cierre condicion category == 1
            if ($("#category-customization-"+id+"-"+count).val()=="2") {

                if ($("#button-accordion-customization-"+count).attr("disabled")) {

                    $("#button-accordion-customization-"+count).removeAttr("disabled");
                }

                $("#count-product-customization-"+count).html(parseInt(count_product_customization+1));
                $("#count-product-customization-"+count).attr("data-current-count-product", parseInt(count_product_customization+1));
                $("#collapse-customization-"+count).attr("data-count-product", parseInt(count_product_customization+1));


                $('#list-tab-customization-'+count).append('<a class="list-group-item list-group-item-action list-product-customization list-product-customization-'+count+'" data-count="'+count+'" id="list-customization-list-'+id+'-'+count+'" data-toggle="list" href="#list-customization-'+id+'-'+count+'" role="tab" aria-controls="customization"></a>'); 
                $('#list-customization-list-'+id+'-'+count).append('<div class="img-thumbnail justify-content-center" style="width: 42px; height: 40px; overflow: hidden;"><a href="'+$("#category-customization-"+id+"-"+count).data("product-image")+'" data-gallery="product-gallery-'+id+'" data-title="'+$("#category-customization-"+id+"-"+count).data("product-name")+' ('+$("#category-customization-"+id+"-"+count).data("product-trademark")+')" data-toggle="lightbox"><img width="100%" height="auto" src="'+$("#category-customization-"+id+"-"+count).data("product-image")+'"></a></div>');
                
                // $('#list-customization-list-'+id+'-'+count).append($("#category-customization-"+id+"-"+count).data("product-name")+' ('+$("#category-customization-"+id+"-"+count).data("product-trademark")+')');
                // $('#list-customization-list-'+id+'-'+count).append('<span class="badge badge-warning badge-pill float-right" id="customization-count-'+id+'-'+count+'" style="font-size: 13px">'+units+'</span>');

                
                const text = $("#text-"+id+"-"+count).val()
                const image = $("#image-"+id+"-"+count).val();  

                $("#customization-count-"+id+"-"+count).html(units);
                $("#list-customization-"+id+"-"+count).html("");
                $("#list-customization-"+id+"-"+count).append("<table class='table'><thead id='thead-customization-"+id+"-"+count+"'></thead><tbody id='tbody-customization-"+id+"-"+count+"'></tbody></table>");
                $("#tbody-customization-"+id+"-"+count).html("");
                $("#thead-customization-"+id+"-"+count).append("<tr class='bg-primary' style='color:white;'><th class='hidden-max-992px'>"+$("#category-customization-"+id+"-"+count).data("product-name")+"</th><th class='text-"+id+" text-center'>Texto</th><th class='image-"+id+" text-center'>Imagen</th></tr>");
                for (var i = 0; i < units; i++) {

                    
                    // $("#tbody-customization-"+id+"-"+count).append("<tr><td class='hidden-max-992px'># "+parseInt(i+1)+"</td> <td class='text-"+id+"'><input type='text' placeholder='Nombre o frase' class='form-control' id='input-text-"+id+"-"+count+"-"+parseInt(i+1)+"' name='input_text["+count+"]["+id+"]["+parseInt(i+1)+"]'></td><td class='image-"+id+"'><input type='file' id='file-image-"+id+"-"+count+"-"+parseInt(i+1)+"' class='form-control' name='input_file_"+count+"_"+id+"_"+parseInt(i+1)+"'></td></tr>");
                    $("#tbody-customization-"+id+"-"+count).append("<tr><td class='hidden-max-992px'># "+parseInt(i+1)+"</td> <td class='text-"+id+"'><input type='text' placeholder='Nombre o frase' class='form-control' id='input-text-"+id+"-"+count+"-"+parseInt(i+1)+"' name='input_text["+count+"]["+id+"]["+parseInt(i+1)+"]'></td><td class='image-"+id+"'><div class='col-sm-4 text-center'><div class='kv-avatar'><div class='file-loading'><input id='input_file_"+count+"_"+id+"_"+parseInt(i+1)+"' name='input_file_"+count+"_"+id+"_"+parseInt(i+1)+"' type='file' required></div></div></div></td></tr>");
                    noConflict("#input_file_"+count+"_"+id+"_"+parseInt(i+1)).fileinput({
                        theme: "fa", // sireve para la seleccion de tema de iconos.
                        language: "es", //selecciona lenguaje.
                        maxFileSize: 5000, //tamaño maximo del archivo.
                        showClose: false,
                        showCaption: false,
                        showZoom: false,
                        browseLabel: '', //nombre del boto de seleccion o carga de archivo.
                        browseIcon: '<i class="fa fa-folder-open"></i>', //sirve para Seleccionar el icono que deseemos.
                        browseClass: 'btn btn-primary', // para seleccionar la clase del boton que tenemos.
                        removeLabel: '',
                        removeIcon: '<i class="fa fa-trash-alt"></i>', //seleccion de icono para quitar el archivo.
                        removeClass: 'btn btn-secondary', // clase del boto quitar
                        elErrorContainer: '#kv-user-errors-1', //informe de error
                        msgErrorClass: 'alert alert-block alert-danger',
                        defaultPreviewContent: '<img id="user-image-default" src="https://www.dropbox.com/s/0zvf0jmjo2b9cz2/1f3f7.png?raw=1" alt="Imagen del usuario">', //seleccionai magen por defecto
                        layoutTemplates: {main2: '{preview} {remove} {browse}'}, //botones del plugin,
                        allowedFileExtensions: ["jpg", "png", "gif"] //tipos de formatos que acepta el plugin.
                    });
                    if (image == null) {
                        $("#file-image-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                        $(".image-"+id).remove();
                       
                    }
                    if (text == null) {

                        $("#input-text-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                        $(".text-"+id).remove();

                    }

                }
                var count_list = 1;
                $(".list-product-customization-"+count).each(function(){

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
                var count_collapse_customization=1;
                $(".collapse-customization").each(function(){
                    const count = $(this).data("count");
                    $(this).removeClass("show");
                    if (count_collapse_customization==1) {
                       $("#collapse-customization-"+count).addClass("show");   
                    }
                    count_collapse_customization++;
                });

            }
//////////////////////////////////////////////////////////////////// CUANDO SE QUITA EL CHECKED
        }else{
            $('#units'+id+'-'+count).attr('disabled','disabled');
            $('#units'+id+'-'+count).val('0');
            $('#units'+id+'-'+count).attr('data-price-count',0);





            if ($("#category-modification-"+id+"-"+count).val()=="1") {

                $('#list-modification-list-'+id+'-'+count).remove();
                $('#list-modification-'+id+'-'+count).empty();

                $("#count-product-modification-"+count).html(parseInt(count_product_modification-1));
                $("#count-product-modification-"+count).attr("data-current-count-product", parseInt(count_product_modification-1));
                $("#collapse-modification-"+count).attr("data-count-product", parseInt(count_product_modification-1));

                if(parseInt(count_product_modification-1)==0){
                    
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

                var count_list = 1;
                $(".list-product-modification-"+count).each(function(){

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

            if ($("#category-customization-"+id+"-"+count).val()=="2") {
                
                $('#list-customization-list-'+id+'-'+count).remove();
                $('#list-customization-'+id+'-'+count).empty();

                $("#count-product-customization-"+count).html(parseInt(count_product_customization-1));
                $("#count-product-customization-"+count).attr("data-current-count-product", parseInt(count_product_customization-1));
                $("#collapse-customization-"+count).attr("data-count-product", parseInt(count_product_customization-1));

                if(parseInt(count_product_customization-1)==0){
                    
                    var count_collapse_customization = 1;
                    $("#button-accordion-customization-"+count).attr("disabled", "true");

                    $(".collapse-customization").each(function(){
                        const data_count_product = $(this).attr("data-count-product");
                        if (count_collapse_customization == 1 && data_count_product == 0) {
                            $(this).removeClass("show");
                        }else{
                            $(this).addClass("show");
                        }
                        count_collapse_customization++
                    });

                }

                var count_list = 1;
                $(".list-product-customization-"+count).each(function(){

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
            $("#price-order-"+count).html(price_total + price_base); 
             
        }else{
            $("#input"+count).val(price_total);
            $("#price"+count).attr('data-current-price',price_total);
            $("#price"+count).html(price_total);
            $("#price-order-"+count).html(price_total); 
             
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        var price_total_order=0;

        $(".input-hidden-price").each(function(){
            const price = $(this).val();
            // console.log(price);
            price_total_order += +price;
        });

        $("#cart-price-total").html(price_total_order);
        $("#input-cart-price-total").val(price_total_order);
        $("#order-price-total").html(price_total_order);
        $("#input-order-price-total").val(price_total_order);

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
            $("#price-order-"+count).html(price_total + price_base);  
            
        }else{
            $("#input"+count).val(price_total);
            $("#price"+count).attr('data-current-price',price_total);
            $("#price"+count).html(price_total);
            $("#price-order-"+count).html(price_total); 
        }

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        var price_total_order=0;

        $(".input-hidden-price").each(function(){
            const price = $(this).val();
            // console.log(price);
            price_total_order += +price;
        });

        $("#cart-price-total").html(price_total_order);
        $("#input-cart-price-total").val(price_total_order);
        $("#order-price-total").html(price_total_order);
        $("#input-order-price-total").val(price_total_order);

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($("#category-modification-"+id+"-"+count).val()=="1") {
            const colors = $("#colors-"+id+"-"+count).val();
            const flavors = $("#flavors-"+id+"-"+count).val();
            const recipes = $("#recipes-"+id+"-"+count).val();

            $("#tbody-modification-"+id+"-"+count).html("");
            $("#thead-modification-"+id+"-"+count).html("");
            $("#thead-modification-"+id+"-"+count).append("<tr class='bg-primary' style='color:white;'><th class='hidden-max-992px'>"+$("#category-modification-"+id+"-"+count).data("product-name")+" ("+units+")</th><th class='flavors-"+id+" text-center'>Sabores ("+units+")</th><th class='colors-"+id+" text-center'>Colores ("+units+")</th><th class='recipes-"+id+" text-center'>Recetas ("+units+")</th></tr>");


            for (var i = 0; i < units; i++) {
                $("#tbody-modification-"+id+"-"+count).append("<tr><td class='hidden-max-992px'># "+parseInt(i+1)+"</td> <td class='flavors-"+id+"'><select class='custom-select my-1 mr-sm-2 col-lg-12' id='select-flavors-"+id+"-"+count+"-"+parseInt(i+1)+"' name='select_flavors["+count+"]["+id+"]["+parseInt(i+1)+"]'> <option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td><td class='colors-"+id+"'><select id='select-colors-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name='select_colors["+count+"]["+id+"]["+parseInt(i+1)+"]'><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select</td><td class='recipes-"+id+"'><select id='select-recipes-"+id+"-"+count+"-"+parseInt(i+1)+"' class='custom-select my-1 mr-sm-2 col-lg-12' id='inlineFormCustomSelectPref' name='select_recipes["+count+"]["+id+"]["+parseInt(i+1)+"]'><option value='prediseñado'>Mira las opciones</option><option value='prediseñado'>A nuestro gusto</option></select></td></tr>");
               
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
            $(".list-product-modification-"+count).each(function(){

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

        if ($("#category-customization-"+id+"-"+count).val()=="2") {

            const text = $("#text-"+id+"-"+count).val()
            const image = $("#image-"+id+"-"+count).val();  

            $("#customization-count-"+id+"-"+count).html(units);
            $("#tbody-customization-"+id+"-"+count).html("");
            $("#thead-customization-"+id+"-"+count).html("");
            $("#thead-customization-"+id+"-"+count).append("<tr class='bg-primary' style='color:white;'><th class='hidden-max-992px'>"+$("#category-customization-"+id+"-"+count).data("product-name")+"</th><th class='text-"+id+" text-center'>Texto ("+units+") </th><th class='image-"+id+" text-center'>Imagen ("+units+")</th></tr>");

            for (var i = 0; i < units; i++) {
                // $("#tbody-customization-"+id+"-"+count).append("<tr><td class='hidden-max-992px'># "+parseInt(i+1)+"</td> <td class='text-"+id+"'><input type='text' placeholder='Nombre o frase' class='form-control' id='input-text-"+id+"-"+count+"-"+parseInt(i+1)+"' name='input_text["+count+"]["+id+"]["+parseInt(i+1)+"]'></td><td class='image-"+id+"'><input type='file' id='file-image-"+id+"-"+count+"-"+parseInt(i+1)+"' class='form-control' name='input_file_"+count+"_"+id+"_"+parseInt(i+1)+"'></td></tr>");
               $("#tbody-customization-"+id+"-"+count).append("<tr><td class='hidden-max-992px'># "+parseInt(i+1)+"</td> <td class='text-"+id+"'><input type='text' placeholder='Nombre o frase' class='form-control' id='input-text-"+id+"-"+count+"-"+parseInt(i+1)+"' name='input_text["+count+"]["+id+"]["+parseInt(i+1)+"]'></td><td class='image-"+id+"'><div class='col-sm-4 text-center'><div class='kv-avatar'><div class='file-loading'><input id='input_file_"+count+"_"+id+"_"+parseInt(i+1)+"' name='input_file_"+count+"_"+id+"_"+parseInt(i+1)+"' type='file' required></div></div></div></td></tr>");
                noConflict("#input_file_"+count+"_"+id+"_"+parseInt(i+1)).fileinput({
                    theme: "fa", // sireve para la seleccion de tema de iconos.
                    language: "es", //selecciona lenguaje.
                    maxFileSize: 5000, //tamaño maximo del archivo.
                    showClose: false,
                    showCaption: false,
                    showZoom: false,
                    browseLabel: '', //nombre del boto de seleccion o carga de archivo.
                    browseIcon: '<i class="fa fa-folder-open"></i>', //sirve para Seleccionar el icono que deseemos.
                    browseClass: 'btn btn-primary', // para seleccionar la clase del boton que tenemos.
                    removeLabel: '',                    
                    removeIcon: '<i class="fa fa-trash-alt"></i>', //seleccion de icono para quitar el archivo.
                    removeClass: 'btn btn-secondary', // clase del boto quitar
                    elErrorContainer: '#kv-user-errors-1', //informe de error
                    msgErrorClass: 'alert alert-block alert-danger',
                    defaultPreviewContent: '<img id="user-image-default" src="https://www.dropbox.com/s/0zvf0jmjo2b9cz2/1f3f7.png?raw=1" alt="Imagen del usuario">', //seleccionai magen por defecto
                    layoutTemplates: {main2: '{preview} {remove} {browse}'}, //botones del plugin,
                    allowedFileExtensions: ["jpg", "png", "gif"] //tipos de formatos que acepta el plugin.
                });
                if (image == null) {
                    $("#file-image-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                    $(".image-"+id).remove();
                   
                }
                if (text == null) {

                    $("#input-text-"+id+"-"+count+"-"+parseInt(i+1)).attr("disabled", "true");
                    $(".text-"+id).remove();

                }

            }
            var count_list = 1;
            $(".list-product-modification-"+count).each(function(){

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
    });
///////////////////////////////////////////////////////////////////////////////////////////////
// Traer municiopios y ciudades segun el departamento seleccionado
///////////////////////////////////////////////////////////////////////////////////////////////

    noConflict("#select_department").change(function(){
        event.preventDefault();

        const url = "?c=Department&a=departmentMunicipalitiesOption";


        const data = {
            department_id:$(this).val(),
        }

        
        // var screen = $('#loading-screen');
        // configureLoadingScreen(screen);

        $.ajax({
            url:url,
            type:"GET",
            data:data,
            success: function(answer){
                $("#select_municipality").html("");
                $("#select_municipality").html(answer);
            },
            error:function(){

            }
        });
    });

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////
// EFECTO CARGAR PAGINA
///////////////////////////////////////////////////////////////////////////////////////////////

    $(".load").on("click", function() {
        
        $("#body").css("overflow","hidden");
        $("#message-loading").html("Cargando tu peticion...")
        $("#message-loading").attr("data-message","Cargando tu peticion...")
        $("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");
    });

    $("#form-order").submit(function(event) {
        $("#body").css("overflow","hidden");
        $("#message-loading").html("Cargando tu peticion...")
        $("#message-loading").attr("data-message","Cargando tu peticion...")
        $("#loading-screen").css("display","block");
        $("#loading-screen").css("opacity","100");
    });


///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////
// Si seleciona una fecha
///////////////////////////////////////////////////////////////////////////////////////////////

    noConflict("#order_delivery_date").change(function(){
        event.preventDefault();

        const url = "?c=order&a=orderDeliveryTime";


        const data = {
            delivery_date:$(this).val(),
        }

        
        // var screen = $('#loading-screen');
        // configureLoadingScreen(screen);

        $.ajax({
            url:url,
            type:"GET",
            data:data,
            success: function(answer){
                $("#order_delivery_time").html("");
                $("#order_delivery_time").html(answer);
            },
            error:function(){

            }
        });
    });


///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////
// next nav order
///////////////////////////////////////////////////////////////////////////////////////////////

    noConflict(".next-order").click(function(){
        
        const href = $(this).attr("href");

        noConflict(".nav-link").each(function(){
            noConflict(this).removeClass("active");
            if (noConflict(this).attr("href")==href) {
                noConflict(this).addClass("active");
            }
        });

        noConflict(".nav-content").each(function(){
            noConflict(this).removeClass("active");
            if (href=="#"+noConflict(this).attr("id")) {
                noConflict(this).removeClass("fade");
                noConflict(this).addClass("active");
            }
        });

    });


///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////



    $(".list-group-item").click(function(){
        const count = $(this).data("count"); 
        var count_list = 1;
        if($(this).is(".active")){
            // alert(hola);
        }else{
            $(".list-product-modification-"+count).each(function(){
                if (count_list == 1) {

                    var href = $(this).attr("href");
                    $(href).removeClass("show");
                    $(href).removeClass("active");

                }
                count_list++
            });
        }
    });

    noConflict('.dataTables_length').DataTable({
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

	noConflict(document).on('click','[data-toggle="lightbox"]', function(event){
	    event.preventDefault();
	    noConflict(this).ekkoLightbox({
	    alwaysShowClose: true
		});
	 });


   

});