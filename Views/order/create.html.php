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


</head>

<body>
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
		<div class="container">
			<div class="row">
				<div class="col-lg-12" name="cart">
					<!-- Nav pills -->
					<ul class="nav nav-pills">
					  <li class="nav-item">
					    <a class="nav-link active" data-toggle="pill" href="#additional">Adicionales</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#product-modification">Modificacion de productos</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#product-customization">Personalizacion de productos</a>
					  </li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane container active" id="additional"><br>
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
								        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?php echo $shop_cart['combo_id']."-".$count_combo?>" aria-expanded="true" aria-controls="collapse<?php echo $shop_cart['combo_id']?>" style="cursor: pointer;" >
										          <?php echo ucwords($combo->combo_name)." (".ucwords($combo->combo_type_name).") #".$count_combo; ?>
										          Quitar o agregar productos<i class="fa fa-sort-down"></i>
										</button>
										

										<input class="input-hidden-price" type="hidden" name="input<?php echo $count_combo?>" data-count="<?php echo $count_combo;?>" id="input<?php echo $count_combo?>" value="<?php echo $combo->combo_sale_price;?>">
										<span class="badge badge-warning badge-pill float-right" style="font-size: 13px">$ <strong id="price<?php echo $count_combo?>" data-current-price=""></strong></span>

								      </h5>
								    </div>

								    <div id="collapse-<?php echo $shop_cart['combo_id']."-".$count_combo?>" class="collapse <?php if($count_combo==1){ echo 'show'; } ?>" aria-labelledby="heading-<?php echo $count_combo?>" data-parent="#accordion-additional">
									    <div class="card-body" style="overflow-y: scroll; height: 400px;">
									    	<h2 class="text-center">Agregar o quitar productos del combo <?php echo ucwords($combo->combo_name); ?></h2>
						                    <table class="dataTables_length" id="table-products">
						                        <thead>
						                          <tr>
						                            <th>Imagen</th>
						                            <th>Nombre</th>
						                            <th>Marca</th>
						                            <th>Precio</th>
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
							                                <a href="<?php echo $product->product_image_name; ?>" data-gallery="product-gallery-<?php echo $product->product_id; ?>" data-title="<?php echo $product->product_name; ?> ($<?php echo $product_price; ?>)" data-toggle="lightbox">
							                                <img width="100%" height="auto" src="<?php echo  $product->product_image_name; ?>">
							                                </a>
							                              </div>  
							                            </td>
							                            <td class="align-middle"><?php echo $product->product_name; ?></td>
							                            <td class="align-middle"><?php echo $product->product_trademark; ?></td>
							                            <td class="align-middle">$<?php echo $product_price; ?></td>
							                            <td class="text-center align-middle">
							                              <div class="icheck-primary d-inline">
							                                <input class="checkbox-product" type="checkbox" id="checkbox<?php echo $product->product_id."-".$count_combo; ?>"  data-id="<?php echo $product->product_id?>" data-count="<?php echo $count_combo;  ?>" data-price="<?php echo $product_price; ?>" value="<?php echo $product->product_id; ?>" name="product_id[]" <?php if(is_array($combo_products) && in_array($product->product_id, $combo_products[0])){ echo "checked"; }?> >
							                                <label class="checkbox-primary" for="checkbox<?php echo $product->product_id."-".$count_combo; ?>" >
							                                </label>
							                              </div>                          
							                            </td>
							                            <td>
							                              <input class="units-product" name="units[<?php echo $product->product_id."-".$count_combo; ?>]" id="units<?php echo $product->product_id."-".$count_combo; ?>" data-price-base="<?php echo $base_price ?>" data-price="<?php echo $product_price; ?>" type="number" min="0" <?php if(is_array($combo_products) && in_array($product->product_id, $combo_products[0])){ echo "value='".$combo_products[1][$product->product_id]."'"; }else{ echo "value='0'"; }?> data-price-count="0" data-id="<?php echo $product->product_id; ?>" data-count="<?php echo $count_combo; ?>"  style="width: 60px; height: 40px; padding: 9px; font-size: 30px; margin: 5px;" disabled>
							                            </td>
							                          </tr>
						                          <?php endforeach?>
						                        </tbody>
						                    </table>
									    </div>
								    </div>
								</div>
								<?php } ?>
								<?php } ?>
							<?php } ?>
							</div>
						</div>
						<div class="tab-pane container fade" id="product-modification"><br>
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
										        <button class="btn btn-link" id="button-accordion-modification-<?php echo $count_combo?>" data-toggle="collapse" data-target="#collapse-modification-<?php echo $count_combo?>" aria-expanded="true" aria-controls="collapse<?php echo $shop_cart['combo_id']?>"  style="cursor: pointer;">
										          <?php echo ucwords($combo->combo_name)." (".ucwords($combo->combo_type_name).") #".$count_combo; ?>
										          Productos editables <i class="fa fa-sort-down"></i>
										        </button>
										        <span class="badge badge-warning badge-pill float-right" style="font-size: 13px"><strong id="count-product-modifiable-<?php echo $count_combo?>" ></strong></span>
										      </h5>
										    </div>
										    <div id="collapse-modification-<?php echo $count_combo?>" class="collapse collapse-modification <?php if($count_combo==1){ echo 'show'; } ?>" aria-labelledby="heading-<?php echo $count_combo?>" data-parent="#accordion-modification">
										      	<div class="card-body">
										      		<div class="row">
	  													<div class="col-4">
	  														<div class="list-group" id="list-tab-<?php echo $count_combo; ?>" role="tablist">
													       	<?php $products = $this->products->get(); ?>
													       	<?php $count_product = 0; ?>
													       	<?php foreach($products as $product){ ?>
													       		<?php $product_categories = $this->products->productCategories($product->product_id) ?>
												       			<?php foreach($product_categories as $product_categorie){ ?>
												       				<?php if ($product_categorie->product_category_id == 1) { $count_product ++; ?>
												       					<input type="hidden" id="category-<?php echo $product->product_id."-".$count_combo ?>" value="<?php echo $product_categorie->product_category_id; ?>" data-product-name="<?php echo $product->product_name?>" data-product-trademark="<?php echo $product->product_trademark?>" data-product-count="<?php echo $count_product ?>">
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
													       					<div class="tab-pane table-modification fade"  id="list-<?php echo $product->product_id."-".$count_combo; ?>" role="tabpanel" aria-labelledby="list-home-list">

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
							</div>
						</div>
						<div class="tab-pane container fade" id="product-customization">Personalizacion de productos</div>
					</div>
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
								<input type="email" class="newsletter_input" required="required" placeholder="Ingrese su dirección de correo electrónico">
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


	<!-- LOAD EFECT -->

	<?php include "Views/includes/load.html.php"; ?>

    <!-- END LOAD EFECT -->

	<!-- Copyright -->


<?php include "Views/includes/footer.html.php"; ?>


<?php include 'Views/includes/script.html.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="public/js/cart_custom.js"></script>
<script src="public/js/order/create.js"></script>



</body>

</html>