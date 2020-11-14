<?php include "Views/includes/head.html.php"; ?>
<title>Dulce Sorpresa</title>
<link rel="stylesheet" type="text/css" href="public/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="public/styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="public/styles/order/create.css">
<!-- CSS TABLE CON BUSCADOR -->
 <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<!-- CSS ICHEK BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- CSS ICHEK lightbox -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">
<!-- Select2 -->
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- INPUT FILE -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">


</head>

<body id="body" style="overflow: hidden;">
	<!-- LOAD EFECT -->

	<?php include "Views/includes/load.html.php"; ?>

    <!-- END LOAD EFECT -->
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="public/images/phone.png" alt=""></div>+57 310 526 1209</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="public/images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">dulcesorpresaflorida@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="#">Español<i class="fas fa-chevron-down"></i></a>
										<!-- <ul>
											<li><a href="#">Italian</a></li>
											<li><a href="#">Spanish</a></li>
											<li><a href="#">Japanese</a></li>
										</ul> -->
									</li>
									<li>
										<a href="#">$ COP Pesos Colombianos<i class="fas fa-chevron-down"></i></a>
<!-- 										<ul>
											<li><a href="#">EUR Euro</a></li>
											<li><a href="#">GBP British Pound</a></li>
											<li><a href="#">JPY Japanese Yen</a></li>
										</ul> -->
									</li>
								</ul>
							</div>
<!-- 							<div class="top_bar_user">
								<div class="user_icon"><img src="public/images/user.svg" alt=""></div>
								<div><a href="#">Register</a></div>
								<div><a href="#">Sign in</a></div>
							</div> -->
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<?php include 'Views/includes/navigation.html.php'; ?>
		
		<!-- Main Navigation -->

		<?php include 'Views/includes/menu.html.php'; ?>
		
		<!-- Menu -->

		<?php include 'Views/includes/menu-responsive.html.php'; ?>

	</header>

	<!-- Cart -->

	<div class="cart_section">
		<h1 class="text-center text-size20px-max-992px col-lg-12 col-sm-12">Organiza el pedido a t&uacute; gusto </h1>
		<div class="container">
			<div class="row">
				<div class="col-lg-12" name="cart">
					<!-- Nav pills -->
					<ul class="nav nav-tabs row" id="nav-order">
					  <li class="nav-item width-100p-992px">
					    <a class="nav-link active" data-toggle="pill" href="#additional">Adicionales</a>
					  </li>
					  <li class="nav-item width-100p-992px">
					    <a class="nav-link" data-toggle="pill" href="#product-modification">Modificacion de productos</a>
					  </li>
					  <li class="nav-item width-100p-992px">
					    <a class="nav-link" data-toggle="pill" href="#product-customization">Personalizacion de productos</a>
					  </li>
					  <li class="nav-item width-100p-992px">
					    <a class="nav-link" data-toggle="pill" href="#product-base">Modifica y personaliza la base </a>
					  </li>
					  <li class="nav-item width-100p-992px">
					    <a class="nav-link" data-toggle="pill" href="#complete-order">Completa tu orden </a>
					  </li>
					</ul>

					<!-- Tab panes -->
					<form method="POST" enctype="multipart/form-data" id="form-order" action="?c=Order&a=save">
						<div class="tab-content">
							<div class="tab-pane container active nav-content" id="additional"><br>
								<div id="accordion-additional">
								<?php if(isset($_SESSION['shop-cart'])){ ?>
							  	<?php $count_combo = 0; ?>
							  	<?php foreach ($_SESSION['shop-cart'] as $shop_cart) { ?>
							  		<?php $combo_products = $this->products->arrayConvert($this->products->comboProducts($shop_cart['combo_id']));?>
							  		<?php $combo = $this->combos->find($shop_cart['combo_id']); ?>
							  		<?php $base = $this->bases->find($combo->base_id); ?>
							  		<?php for ($quantity=0; $quantity < $shop_cart['quantity'] ; $quantity++) { ?>
							  		<?php $count_combo++; ?>
									<div class="card">
									    <div class="card-header" id="heading-<?php echo $count_combo?>">
									      <h5 class="mb-0">
									        <button style="cursor: pointer;" class="btn btn-link prevent" data-toggle="collapse" data-target="#collapse-<?php echo $shop_cart['combo_id']."-".$count_combo?>" aria-expanded="true" aria-controls="collapse<?php echo $shop_cart['combo_id']?>" >
									        		<span class="hidden-max-992px">
											          	<?php echo ucwords($combo->combo_name)." (".ucwords($combo->combo_type_name).") #".$count_combo; ?>
											          	Quitar o agregar productos<i class="fa fa-sort-down"></i>
											        </span>
											        <span class="hidden-min-992px">
											        	T&uacute; Combo # <?php echo $count_combo; ?>
											        </span>
											</button>
											
											<input type="hidden" name="combo_unist[<?php echo $count_combo ?>]" value="<?php echo $shop_cart['quantity'] ?>">
											<input class="input-hidden-price" type="hidden" name="combo_sale_price[<?php echo $count_combo?>]" data-count="<?php echo $count_combo;?>" id="input<?php echo $count_combo?>" value="<?php echo $combo->combo_sale_price;?>">
											<input  type="hidden" name="combo_name[<?php echo $count_combo?>]" value="<?php echo $combo->combo_name;?>">
											<input  type="hidden" name="combo_id[<?php echo $count_combo?>]" value="<?php echo $combo->combo_id;?>">
											<input  type="hidden" name="combo_type_id[<?php echo $count_combo?>]" value="<?php echo $combo->combo_type_id;?>">
											<input  type="hidden" name="base_id[<?php echo $count_combo?>]" value="<?php echo $combo->base_id;?>">

											<span class="badge badge-warning badge-pill float-right" style="font-size: 13px">$ <strong id="price<?php echo $count_combo?>" data-current-price=""></strong></span>

									      </h5>
									    </div>

									    <div id="collapse-<?php echo $shop_cart['combo_id']."-".$count_combo?>" class="collapse <?php if($count_combo==1){ echo 'show'; } ?>" aria-labelledby="heading-<?php echo $count_combo?>" data-parent="#accordion-additional">
										    <div class="card-body" style="overflow-y: scroll; overflow-x: hidden; height: 400px;">
										    	<h3 class="text-center text-size12px-max-992px">Agregar o quitar productos del combo <p>("<?php echo ucwords($combo->combo_name); ?>")</p></h3>
							                    <table class="dataTables_length" id="table-products">
							                        <thead>
							                          <tr>
							                            <th>Imagen</th>
							                            <th class='hidden-max-992px'>Nombre</th>
							                            <th class='hidden-max-992px'>Marca</th>
							                            <th class='hidden-max-992px'>Precio</th>
							                            <th class="text-center">Agregar</th>
							                            <th>Cantidad</th>
							                          </tr>
							                        </thead>
							                        <tbody>
							                          <?php foreach($products as $product): ?>
							                          	
								                          <!-- sumar el 60% al precio original de la base -->
								                          <?php $product_price = $product->product_price; $product_price += ($product_price * 60 / 100);?>

								                          <?php $base_price = $base->base_price; $base_price += ($base_price * 60 / 100);?>
								                          <!-- sumar el 60% al precio original de la base -->
								                          <tr>
								                            <td>
								                              <div class="img-thumbnail justify-content-center" style="width: 42px; height: 40px; overflow: hidden;">
								                                <a href="<?php echo $product->product_image_name; ?>" data-gallery="product-gallery-<?php echo $product->product_id; ?>" data-title="<?php echo $product->product_name; ?>, <?php echo $product->product_trademark; ?>  ($<?php echo $product_price; ?>)" data-toggle="lightbox">
								                                <img width="100%" height="auto" src="<?php echo  $product->product_image_name; ?>">
								                                </a>
								                              </div>  
								                            </td>
								                            <td class="align-middle hidden-max-992px"><?php echo $product->product_name; ?></td>
								                            <td class="align-middle hidden-max-992px"><?php echo $product->product_trademark; ?></td>
								                            <td class="align-middle hidden-max-992px">$<?php echo $product_price; ?></td>
								                            <td class="text-center align-middle">
								                              <div class="icheck-primary d-inline">
								                                <input class="checkbox-product" type="checkbox" id="checkbox<?php echo $product->product_id."-".$count_combo; ?>"  data-id="<?php echo $product->product_id?>" data-count="<?php echo $count_combo;  ?>" data-price="<?php echo $product_price; ?>" value="<?php echo $product->product_id; ?>" name="product_id[<?php echo $count_combo;  ?>][]" <?php if(is_array($combo_products) && in_array($product->product_id, $combo_products[0])){ echo "checked"; }?> >
								                                <label class="checkbox-primary" for="checkbox<?php echo $product->product_id."-".$count_combo; ?>" >
								                                </label>
								                              </div>                          
								                            </td>
								                            <td>
								                              <input class="units-product" name="units[<?php echo $count_combo?>][<?php echo $product->product_id ?>]" id="units<?php echo $product->product_id."-".$count_combo; ?>" data-price-base="<?php echo $base_price ?>" data-price="<?php echo $product_price; ?>" type="number" min="0" <?php if(is_array($combo_products) && in_array($product->product_id, $combo_products[0])){ echo "value='".$combo_products[1][$product->product_id]."'"; }else{ echo "value='0'"; }?> data-price-count="0" data-id="<?php echo $product->product_id; ?>" data-count="<?php echo $count_combo; ?>"  style="width: 60px; height: 40px; padding: 9px; font-size: 30px; margin: 5px;" disabled>
								                            </td>
								                          </tr>
							                          <?php endforeach?>
							                        </tbody>
							                    </table>
										    </div>
									    </div>
									</div>
									<?php } ?>
									<input type="hidden" name="count_combo" value="<?php echo $count_combo; ?>">
									<?php } ?>
								<?php } ?>
								</div><br>
								<div class="container hidden-max-992px">
									<a class="btn btn-primary col-lg-4 offset-8 next-order" href="#product-modification">Siguiente</a>
								</div>
								<div class="container hidden-min-992px">
									<a class="btn btn-primary col-lg-12 next-order" href="#product-modification">Siguiente</a>
								</div>
							</div>
							<div class="tab-pane container fade nav-content" id="product-modification"><br>
								<div id="accordion-modification">
							  	<?php if(isset($_SESSION['shop-cart'])){ ?>
							  		<?php $count_combo = 0; ?>
							  		<?php foreach ($_SESSION['shop-cart'] as $shop_cart) { ?>
							  			<?php $combo = $this->combos->find($shop_cart['combo_id']); ?>
							  			<?php for ($quantity=0; $quantity < $shop_cart['quantity'] ; $quantity++) { ?>
							  				<?php $count_combo++; ?>
											<div class="card" id="card-modification-<?php echo $count_combo?>">
											    <div class="card-header" id="heading-<?php echo $count_combo?>">
											      <h5 class="mb-0">
											        <button class="btn btn-link prevent" id="button-accordion-modification-<?php echo $count_combo?>" data-toggle="collapse" data-target="#collapse-modification-<?php echo $count_combo?>" aria-expanded="true" aria-controls="collapse<?php echo $shop_cart['combo_id']?>"  style="cursor: pointer;">
											          	<span class="hidden-max-992px">
											          	<?php echo ucwords($combo->combo_name)." (".ucwords($combo->combo_type_name).") #".$count_combo; ?>
											          	Quitar o agregar productos<i class="fa fa-sort-down"></i>
												        </span>
												        <span class="hidden-min-992px">
												        	T&uacute; Combo # <?php echo $count_combo; ?>
												        </span>
											        </button>
											        <span class="badge badge-warning badge-pill float-right" style="font-size: 13px"><strong id="count-product-modification-<?php echo $count_combo?>" data-current-count-product="0">0</strong></span>
											      </h5>
											    </div>
											    <div id="collapse-modification-<?php echo $count_combo?>" class="collapse collapse-modification <?php if($count_combo==1){ echo 'show'; } ?>" aria-labelledby="heading-<?php echo $count_combo?>" data-count="<?php echo $count_combo?>" data-parent="#accordion-modification">
											      	<div class="card-body">
											      		<h3 class="text-center text-size12px-max-992px">Seleccion de colores, sabores y recepas de los productos seleccionados en este combo <p>("<?php echo ucwords($combo->combo_name); ?>")</p></h3>
											      		<div class="row">
		  													<div class="col-4">
		  														<div class="list-group" id="list-tab-modification-<?php echo $count_combo; ?>" role="tablist">
														       	<?php $products = $this->products->get(); ?>
														       	<?php $count_product = 0; ?>
														       	<?php foreach($products as $product){ ?>
														       		<?php $product_categories = $this->products->productCategories($product->product_id) ?>
													       			<?php foreach($product_categories as $product_categorie){ ?>
													       				<?php if ($product_categorie->product_category_id == 1) { $count_product ++; ?>
													       					<input type="hidden" id="category-modification-<?php echo $product->product_id."-".$count_combo ?>" value="<?php echo $product_categorie->product_category_id; ?>" data-product-name="<?php echo $product->product_name?>" data-product-trademark="<?php echo $product->product_trademark?>" data-product-count="<?php echo $count_product ?>" data-product-image="<?php echo $product->product_image_name?>">
													       				<?php  } ?>
														       		<?php }?>
															    <?php }?>
																</div>
														    </div>
														    <div class="col-8">
		   														<div class="tab-content" id="nav-tabContent"> 
		   															<?php $products = $this->products->get();?>
															       	<?php $count_product = 0; ?>
															       	<?php foreach($products as $product){ ?>										       		
															       		<?php $colors = explode(",", $product->product_colors);?>
															       		<input type="hidden" id="colors-<?php echo $product->product_id."-".$count_combo; ?>" value="<?php echo $product->product_colors ?>">
															       		<?php $flavors = explode(",", $product->product_flavors);?>
															       		<input type="hidden" id="flavors-<?php echo $product->product_id."-".$count_combo; ?>" value="<?php echo $product->product_flavors ?>">
															       		<?php $recipes = explode("->", $product->product_recipes);?>
															       		<input type="hidden" id="recipes-<?php echo $product->product_id."-".$count_combo; ?>" value="<?php echo $product->product_recipes ?>">
															       		<?php $product_categories = $this->products->productCategories($product->product_id) ?>
														       			<?php foreach($product_categories as $product_categorie){ ?>
														       				<?php if($product_categorie->product_category_id==1){?>	
														       					<div class="tab-pane table-modification fade"  id="list-modification-<?php echo $product->product_id."-".$count_combo; ?>" role="tabpanel" aria-labelledby="list-modification-list">

														       					</div>
															       			<?php }?>
															       		<?php }?>
																    <?php }?>
		   														</div>
		   													</div>	
														</div>   					 
												    </div>
											    </div>
											</div>
										<?php }?>
									<?php }?>	
								 <?php }?>
								</div><br>
								<div class="container hidden-max-992px">
									<a class="nav-link btn btn-primary col-lg-4 offset-8 next-order" href="#product-customization">Siguiente</a>
								</div>
								<div class="container hidden-min-992px">
									<a class="nav-link btn btn-primary col-lg-12 next-order" href="#product-customization">Siguiente</a>
								</div>
							</div>
							<div class="tab-pane container fade nav-content" id="product-customization"><br>
								<div id="accordion-customization">
							  	<?php if(isset($_SESSION['shop-cart'])){ ?>
							  		<?php $count_combo = 0; ?>
							  		<?php foreach ($_SESSION['shop-cart'] as $shop_cart) { ?>
							  			<?php $combo = $this->combos->find($shop_cart['combo_id']); ?>
							  			<?php for ($quantity=0; $quantity < $shop_cart['quantity'] ; $quantity++) { ?>
							  				<?php $count_combo++; ?>
											<div class="card" id="card-customization-<?php echo $count_combo?>">
											    <div class="card-header" id="heading-<?php echo $count_combo?>">
											      <h5 class="mb-0">
											        <button class="btn btn-link prevent" id="button-accordion-customization-<?php echo $count_combo?>" data-toggle="collapse" data-target="#collapse-customization-<?php echo $count_combo?>" aria-expanded="true" aria-controls="collapse<?php echo $shop_cart['combo_id']?>"  style="cursor: pointer;">
											        	<span class="hidden-max-992px">
												          	<?php echo ucwords($combo->combo_name)." (".ucwords($combo->combo_type_name).") #".$count_combo; ?>
												          	Quitar o agregar productos<i class="fa fa-sort-down"></i>
												        </span>
												        <span class="hidden-min-992px">
												        	T&uacute; Combo # <?php echo $count_combo; ?>
												        </span>
											        </button>
											        <span class="badge badge-warning badge-pill float-right" style="font-size: 13px"><strong id="count-product-customization-<?php echo $count_combo?>" data-current-count-product="0">0</strong></span>
											      </h5>
											    </div>
											    <div id="collapse-customization-<?php echo $count_combo?>" class="collapse collapse-customization <?php if($count_combo==1){ echo 'show'; } ?>" aria-labelledby="heading-<?php echo $count_combo?>" data-count="<?php echo $count_combo?>" data-parent="#accordion-customization">
											      	<div class="card-body">
											      		<h3 class="text-center text-size12px-max-992px">Personalizacion con texto o imagenes segun los productos seleccionados en este combo <p>("<?php echo ucwords($combo->combo_name); ?>")</p></h3>
											      		<div class="row">
		  													<div class="col-4">
		  														<div class="list-group" id="list-tab-customization-<?php echo $count_combo; ?>" role="tablist">
														       	<?php $products = $this->products->get(); ?>
														       	<?php $count_product = 0; ?>
														       	<?php foreach($products as $product){ ?>
														       		<?php $product_categories = $this->products->productCategories($product->product_id) ?>
													       			<?php foreach($product_categories as $product_categorie){ ?>
													       				<?php if ($product_categorie->product_category_id == 2) { $count_product ++; ?>
													       					<input type="hidden" id="category-customization-<?php echo $product->product_id."-".$count_combo ?>" value="<?php echo $product_categorie->product_category_id; ?>" data-product-name="<?php echo $product->product_name?>" data-product-trademark="<?php echo $product->product_trademark?>" data-product-count="<?php echo $count_product ?>" data-product-image="<?php echo $product->product_image_name?>">
													       				<?php  } ?>
														       		<?php }?>
															    <?php }?>
																</div>
														    </div>
														    <div class="col-8">
		   														<div class="tab-content" id="nav-tabContent"> 
		   															<?php $products = $this->products->get();?>
															       	<?php $count_product = 0; ?>
															       	<?php foreach($products as $product){ ?>										       		
															       		<?php $product_customization = explode(",", $product->product_customization);?>
															       		
															       		<?php if (count($product_customization)==1 && $product_customization[0] == "text") { ?>
															       			<input type="hidden" id="text-<?php echo $product->product_id."-".$count_combo; ?>" value="<?php echo $product_customization[0] ?>">
															       		<?php } ?>
															       		<?php if (count($product_customization)==1 && $product_customization[0] == "image") { ?>
															       			<input type="hidden" id="image-<?php echo $product->product_id."-".$count_combo; ?>" value="<?php echo $product_customization[0] ?>">
															       		<?php } ?>
															       		<?php if (count($product_customization)==2) { ?>
															       			<input type="hidden" id="image-<?php echo $product->product_id."-".$count_combo; ?>" value="<?php echo $product_customization[0] ?>">
															       			<input type="hidden" id="text-<?php echo $product->product_id."-".$count_combo; ?>" value="<?php echo $product_customization[1] ?>">
															       		<?php } ?>
															       		<?php $product_categories = $this->products->productCategories($product->product_id) ?>
														       			<?php foreach($product_categories as $product_categorie){ ?>
														       				<?php if($product_categorie->product_category_id==2){?>	
														       					<div class="tab-pane table-customization fade"  id="list-customization-<?php echo $product->product_id."-".$count_combo; ?>" role="tabpanel" aria-labelledby="list-customization-list">

														       					</div>
															       			<?php }?>
															       		<?php }?>
																    <?php }?>
		   														</div>
		   													</div>	
														</div>   					 
												    </div>
											    </div>
											</div>
										<?php }?>
									<?php }?>	
								 <?php }?>
								</div><br>
								<div class="container hidden-max-992px">
									<a class="nav-link btn btn-primary col-lg-4 offset-8 next-order" href="#product-base">Siguiente</a>
								</div>
								<div class="container hidden-min-992px">
									<a class="nav-link btn btn-primary col-lg-12 next-order" href="#product-base">Siguiente</a>
								</div>
							</div>
							<div class="tab-pane container fade nav-content" id="product-base"><br>
								<div id="accordion-base">
							  	<?php if(isset($_SESSION['shop-cart'])){ ?>
							  		<?php $count_combo = 0; ?>
							  		<?php foreach ($_SESSION['shop-cart'] as $shop_cart) { ?>
							  			<?php $combo = $this->combos->find($shop_cart['combo_id']); ?>
							  			<?php $base = $this->bases->find($combo->base_id);?>
							  			<?php for ($quantity=0; $quantity < $shop_cart['quantity'] ; $quantity++) { ?>
							  				<?php $count_combo++; ?>
											<div class="card" id="card-base-<?php echo $count_combo?>">
											    <div class="card-header" id="heading-<?php echo $count_combo?>">
											      <h5 class="mb-0">
											        <button class="btn btn-link prevent" id="button-accordion-base-<?php echo $count_combo?>" data-toggle="collapse" data-target="#collapse-base-<?php echo $count_combo?>" aria-expanded="true" aria-controls="collapse<?php echo $shop_cart['combo_id']?>"  style="cursor: pointer;" <?php if ($base->base_colors=="" && $base->base_customization==""): ?>
											        	disabled	
											        <?php endif ?>>
											          <span class="hidden-max-992px">
												          	<?php echo ucwords($combo->combo_name)." (".ucwords($combo->combo_type_name).") #".$count_combo; ?>
												          	Modificacion de base<i class="fa fa-sort-down"></i>
												        </span>
												        <span class="hidden-min-992px">
												        	Base de t&uacute; Combo # <?php echo $count_combo; ?>
												        </span>
											        </button>
											      </h5>
											    </div>
											    <div id="collapse-base-<?php echo $count_combo?>" class="collapse collapse-base <?php if ($base->base_colors!="" || $base->base_customization!=""): ?> <?php if($count_combo==1){ echo 'show'; } ?> <?php endif ?> " aria-labelledby="heading-<?php echo $count_combo?>" data-count="<?php echo $count_combo?>" data-parent="#accordion-base">
											      	<div class="card-body">
											      		<div class="row">
		  													<!-- <div class="col-4">
		  														<div class="list-group" id="list-tab-base-<?php echo $count_combo; ?>" role="tablist">
														       		<a class="list-group-item list-group-item-action list-combo-base list-combo-base-<?php echo $count_combo; ?> active show"  id="list-base-list-<?php echo $base->base_id."-".$count_combo; ?>" data-toggle="list" href="#list-base-<?php echo $base->base_id."-".$count_combo; ?>" role="tab" aria-controls="base"><?php echo $base->base_name." (".$base->base_measure.")"; ?></a>	
																</div>
														    </div> -->
														    <div class="col-lg-12">
														    	<h3 class="text-center text-size12px-max-992px">Aqui puedes personalizar la base con el nombre o frase que desees y el color que prefieras.<p>("<?php echo ucwords($combo->combo_name); ?>")</p></h3>
		   														<div class="tab-content" id="nav-tabContent"> 
														       		<div class="tab-pane table-base fade show active"  id="list-base-<?php echo $base->base_id."-".$count_combo; ?>" role="tabpanel" aria-labelledby="list-base-list">
														       			<table class="table">
														       				<thead id="thead-customization-<?php echo $base->base_id."-".$count_combo; ?>">
														       					<tr class='bg-primary' style='color:white;'>
														       						<th class="hidden-max-992px"><?php echo $base->base_name ?></th>
														       						<?php if($base->base_colors != ""){ ?>
														       						<th class='text-center'>Nombre o texto</th>
														       						<?php } ?>
														       						<?php if($base->base_customization != ""){ ?>
														       						<th class='text-center'>Color</th>
														       						<?php } ?>
														       					</tr>
														       				</thead>
														       				<tbody id="tbody-customization-<?php echo $base->base_id."-".$count_combo; ?>">
														       					<tr>
														       						<td class="hidden-max-992px">#1</td>
														       						<?php if($base->base_customization != ""){ ?>
														       						<td>
														       							<input type="text" class="form-control" id="input-text-<?php echo $base->base_id."-".$count_combo; ?>" placeholder="Maria" name="customization_base_text[<?php echo $count_combo; ?>]">
														       						</td>
														       						<?php } ?>
														       						<?php if($base->base_colors != ""){ ?>
														       						<?php $base_colors = explode(",",$base->base_colors); ?>
														       						<td style="padding: .70em;">
														       							<select class="custom-select my-1 mr-sm-2 col-lg-12 form-control" name="customization_base_color[<?php echo $count_combo; ?>]" > name="customization_base_color[<?php echo $count_combo; ?>]">
														       								<option>Mira las opciones</option>
														       								<option>A nuestro gusto</option>
														       								<?php foreach ($base_colors as $key => $value): ?>
														       									<option value="<?php echo $value ?>"><?php echo $value ?></option>
														       								<?php endforeach ?>
														       							</select>
														       						</td>
														       						<?php } ?>
														       					</tr>
														       				</tbody>
														       			</table>
														       		</div>
		   														</div>
		   													</div>	
														</div>   					 
												    </div>
											    </div>
											</div>
										<?php }?>
									<?php }?>	
								 <?php }?>
								</div><br>
								<div class="container hidden-max-992px">
									<a class="nav-link btn btn-primary col-lg-4 offset-8 next-order" href="#complete-order">Siguiente</a>
								</div>
								<div class="container hidden-min-992px">
									<a class="nav-link btn btn-primary col-lg-12 next-order" href="#complete-order">Siguiente</a>
								</div>
							</div>
							<div class="tab-pane container fade nav-content" id="complete-order">
								<div class="container-fluid">
								    <div class="row">
								        <div class="col-12 col-lg-11">
								            <div class="card card0 rounded-0">
								                <div class="row">
								                    <div class="col-md-5 d-md-block d-none p-0 box"><br>
								                        <div class="card rounded-0 border-0 card1" id="bill" >
								                            <h3 id="heading1">Tu pedido</h3>
								                            <?php if(isset($_SESSION['shop-cart'])){ ?>
														  	<?php $count_combo = 0; ?>
														  		<?php foreach ($_SESSION['shop-cart'] as $shop_cart) { ?>
															  		<?php $combo_products = $this->products->arrayConvert($this->products->comboProducts($shop_cart['combo_id']));?>
															  		<?php $combo = $this->combos->find($shop_cart['combo_id']); ?>
															  		<?php $base = $this->bases->find($combo->base_id); ?>
															  		<?php for ($quantity=0; $quantity < $shop_cart['quantity'] ; $quantity++) { ?>
															  		<?php $count_combo++; ?>
															  		<div class="row">
										                                <div class="col-lg-7 col-8 mt-4 line pl-4">
										                                    <h2 class="bill-head"><?php echo $combo->combo_name ?></h2> 
										                                    <small class="bill-date">$</small>
										                                    <small class="bill-date" id="price-order-<?php echo $count_combo;?>"> <?php echo $combo->combo_sale_price?></small>
										                                </div>
										                                <div class="col-lg-5 col-4 mt-4">

										                                    <small class="bill-date px-xl-5 px-lg-4"><?php echo $combo->combo_type_name ?></small>
										                                </div>
										                            </div>
															  		<?php }?>
														  		<?php }?>
														  	<?php }?>
								                            
								                            <div class="row">
								                                <div class="col-md-12 red-bg">
								                                    <p id="total-label">Precio Total</p>
								                                    <input type="hidden" id="input-order-price-total" name="input-order-price-total" value="<?php echo $_SESSION['total-price']; ?>">
								                                    <h2>$ <strong id="order-price-total"><?php echo $_SESSION['total-price']; ?></strong></h2>
								                                    <small id="total-label">Precio incluye cambios que realizaste</small>
								                                </div>
								                            </div>
								                        </div>
								                    </div>
								                    <div class="col-md-7 col-sm-12 p-0 box"><br>
								                        <div class="card rounded-0 border-0 card2" id="paypage" >
								                        	<h2 id="heading2" class="text-danger" >Informacion del cliente</h2>
								                        	<div class="form-group row">
								                        		<div class="col-lg-6">
								                        			<label><strong>Tu nombre completo</strong></label>
								                        			<input type="text" class="form-control" placeholder="Juan Rodriguez" name="customer_name" required>
								                        		</div>
								                        		<div class="col-lg-6">
								                        			<label><strong>Tu correo</strong></label>
								                        			<input type="text" class="form-control" placeholder="juanrodriguez02@gmail.com" name="customer_email" required>
								                        		</div>
								                        	</div>
								                        	<div class="form-group row">
								                        		<div class="col-lg-4">
								                        			<label><strong>Indicativo</strong></label>
												                    <select class="form-control select_search" name="phone_code" style="width: 100%;" required>
													                    <option value="Colombia" selected>Colombia, +57</option>
								                        				<?php foreach ($cuontries as $cuontry) { ?>
									                        				<?php if($cuontry->phone_code != "57"){ ?>
									                        				<option value="<?php echo $cuontry->nombre ?>"><?php echo $cuontry->nombre.", +".$cuontry->phone_code ?></option>
									                        				<?php } ?>
								                        				<?php } ?>
												                    </select>
								                        		</div>
								                        		<div class="col-lg-8">
								                        			<label><strong>Numero de celular</strong></label>
								                        			<input type="text" class="form-control" placeholder="3025896359	" name="customer_phone" required>
								                        		</div>
								                        	</div>
								                        	<hr>
								                        	<h2 id="heading2" class="text-danger" >Informacion de entrega</h2>
								                        	<div class="form-group row">
								                        		<div class="col-lg-6">
								                        			<label><strong>Departamento</strong></label>
												                    <select class="form-control select_search" id="select_department" style="width: 100%;" required>
													                    <option value="76">VALLE DEL CAUCA</option>
								                        				<?php foreach ($departments as $department) { ?>
									                        				<?php if($department->department_name != "VALLE DEL CAUCA"){ ?>
									                        				<option value="<?php echo $department->department_id ?>"><?php echo $department->department_name ?></option>
									                        				<?php } ?>
								                        				<?php } ?>
												                    </select>
								                        		</div>
								                        		<div class="col-lg-6">
								                        			<label><strong>Municipio/Ciudad</strong></label>
												                    <select class="form-control select_search" id="select_municipality" name="municipality_id" style="width: 100%;" required>
													                    <option value="341">Florida</option>
													                    <?php $municipalities=$this->municipalities->departmentMunicipalities("76"); ?>
								                        				<?php foreach ($municipalities as $municipality) { ?>
								                        					<?php if($municipality->municipality_name != "Florida"){ ?>
									                        				<option value="<?php echo $municipality->municipality_id ?>"><?php echo $municipality->municipality_name ?></option>
									                        				<?php } ?>
								                        				<?php } ?>
												                    </select>
								                        		</div>
								                        	</div>
								                        	<div class="form-group">
								                        		<label><strong>Direcci&oacute;n y barrio/corregimiento</strong></label>
								                        		<input type="text" class="form-control" placeholder="carrera 2 # 23-12, San antonio de los caballeros " name="order_delivery_address" required>
								                        	</div>
								                        	<div class="form-group row">
								                        		<div class="col-lg-6">
								                        			<label><strong>Fecha de entrega</strong></label>
								                        			<input class="form-control" type="date"  id="order_delivery_date" name="order_delivery_date" required>
								                        		</div>
								                        		<div class="col-lg-6">
								                        			<label><strong>Hora de entrega</strong></label>         			<select class="form-control custom-select select_search" name="order_delivery_time" id="order_delivery_time" style="width: 100%;" required>
								                        				<option value="">Horas disponibles</option>
								                        				<?php $count_times = 1 ?>
								                        				<?php if (count($$order_times)!=0) {?>
								                        				
									                        				<?php foreach ($order_times as $key => $value) { ?>
									                           					<option value="<?php echo $value?>"><?php echo $value?></option>
									                        				<?php $count_times++; } ?>

								                        				<?php }else{ ?>
								                        					<option value="0" selected >Día Copado</option>
								                        				<?php } ?>
													                    
													                </select>
								                        		</div>
								                        	</div>
								                        	<div class="form-group hidden-max-992px">
								                        		<button class="btn btn-primary col-lg-4 offset-8 next-order" type="submmit">Enviar tu orden</button>
								                        	</div>
								                        	<div class="form-group hidden-min-992px">
								                        		<button class="btn btn-primary col-lg-12 load" type="submmit">Enviar tu orden</button>
								                        	</div>
								                        </div>
								                    </div>
								                </div>
								            </div>
								        </div>
								    </div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>				

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="public/images/send.png" alt=""></div>
							<div class="newsletter_title">Regístrese para recibir noticias</div>
							<div class="newsletter_text"><p>... Y recibe ofertas y se el primero en verlas</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" id="newsletter_input" required="required" placeholder="Ingrese su dirección de correo electrónico">
								<button class="newsletter_button">Suscribirce</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">darse de baja</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<!-- MODAL -->

	<?php include "Views/includes/modal.html.php"; ?>

    <!-- END THE MODAL -->




	<!-- Copyright -->


<?php include "Views/includes/footer.html.php"; ?>


<?php include 'Views/includes/script.html.php'; ?>
<!-- INPUT FILE -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/themes/fa/theme.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/locales/es.js"></script>
<!-- table -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- Select2 -->
<script src="https://adminlte.io/themes/v3/plugins/select2/js/select2.full.min.js"></script>

<!-- PROPIAS DE LA PAGINA-->
<script src="public/js/cart_custom.js"></script>
<script src="public/js/order/load.js"></script>
<script src="public/js/order/create.js"></script>



</body>

</html>