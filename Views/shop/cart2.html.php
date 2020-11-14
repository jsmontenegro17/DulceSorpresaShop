<?php include "Views/includes/head.html.php"; ?>
<title>Dulce Sorpresa</title>
<link rel="stylesheet" type="text/css" href="public/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="public/styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="public/styles/shop/cart.css">

</head>

<body id="body" style="overflow: hidden;">
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
				<div class="col-lg-12 ">
					<nav>
					  <div class="nav nav-tabs" id="nav-tab" role="tablist">
					    <a class="nav-item nav-link active" id="nav-cart-tab" data-toggle="tab" href="#nav-cart" role="tab" aria-controls="nav-cart" aria-selected="true">Carrito</a>
					    <a class="nav-item nav-link" id="nav-additional-tab" data-toggle="tab" href="#nav-additional" role="tab" aria-controls="nav-additional" aria-selected="false">Adicionales</a>
					    <a class="nav-item nav-link" id="nav-editable-product-tab" data-toggle="tab" href="#nav-editable-product" role="tab" aria-controls="nav-editable-product" aria-selected="false">Editar productos de tu combo</a>
					  </div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
					  <div class="tab-pane fade show active" id="nav-cart" role="tabpanel" aria-labelledby="nav-cart-tab"><br>
					  	<div class="cart_container">
							<div class="cart_title">Tu carrito de compras</div>
							<div class="cart_items">
								<ul class="cart_list">
									<?php if(isset($_SESSION['shop-cart'])){ ?>
										<?php foreach ($_SESSION['shop-cart'] as $shop_cart) { ?>
											<li class="cart_item clearfix">
												<div class="cart_item_image"><img src="<?php echo $shop_cart['combo_image_name'] ?>" alt=""></div>
												<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
													<div class="cart_item_name cart_info_col">
														<div class="cart_item_title">Nombre</div>
														<div class="cart_item_text"><?php echo $shop_cart['combo_name'] ?></div>
													</div>
													<div class="cart_item_quantity cart_info_col">
														<div class="cart_item_title">Cantidad</div>
														<div class="cart_item_text"><input type="number" class="quantity-combo" name="quantity-<?php echo $shop_cart['combo_id'] ?>" value="<?php echo $shop_cart['quantity'] ?>" ></div>
													</div>
													<div class="cart_item_price cart_info_col">
														<div class="cart_item_title">Precio</div>
														<div class="cart_item_text">$ <?php echo $shop_cart['combo_sale_price'] ?></div>
													</div>
													<div class="cart_item_total cart_info_col">
														<div class="cart_item_title">Total</div>
														<div class="cart_item_text">$ <?php echo $shop_cart['price_quantity'] ?></div>
													</div>
													<div class="cart_item_total cart_info_col">
														<div class="cart_item_title">Acciones</div>
														<div class="cart_item_text"><a href="?c=shop&a=product&combo_id=<?php echo $shop_cart['combo_id'] ?>" title="Ver combo" class="btn btn-info"><i class="fa fa-eye"></i></a> <a href="" title="Quitar combo" class="btn btn-danger btn-delete" data-id="<?php echo $shop_cart['combo_id'] ?>"><i class="fa fa-trash-alt"></i></a></div>
													</div>
												</div>
											</li>
											<?php } ?>
									<?php }else{ ?>
										<li class="cart_item clearfix text-center">
											<h3>Carrito vacío</h3>
										</li>
									<?php } ?>

								</ul>
							</div>
							
							<!-- Order Total -->
							<div class="order_total">
								<div class="order_total_content text-md-right">
									<div class="order_total_title">Orden Total:</div>
									<div class="order_total_amount">
										<?php if (isset($_SESSION['total-price'])) { ?>
											<?php echo '$'.$_SESSION['total-price']; ?>
										<?php } else { echo "$0"; } ?>			
									</div>
								</div>
							</div>

							<div class="cart_buttons">
								<a href="?c=shop&a=index" class="button cart_button_clear"><i class="fa fa-plus-circle"></i> Agregar más al carrito</a>
								<a href="" class="button cart_button_checkout">Empezar hacer la orden</a>
							</div>
						</div>
					  </div>
					  <div class="tab-pane fade" id="nav-additional" role="tabpanel" aria-labelledby="nav-additional-tab">...</div>
					  <div class="tab-pane fade" id="nav-editable-product" role="tabpanel" aria-labelledby="nav-editable-product-tab">
					  	<div id="accordion">
					  	<?php if(isset($_SESSION['shop-cart'])){ ?>
					  		<?php print_r($_SESSION['shop-cart']) ?>
					  		<?php $count_combo = 0; ?>
					  		<?php foreach ($_SESSION['shop-cart'] as $shop_cart) { ?>
					  			<?php $count_combo++; ?>
					  			<?php $combo = $this->combos->find($shop_cart['combo_id']); ?>
					  			<?php for ($i=0; $i < $shop_cart['quantity'] ; $i++) { ?>
					  				
					  			
					  			
									<div class="card">
									    <div class="card-header" id="headingOne">
									      <h5 class="mb-0">
									        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $shop_cart['combo_id']?>" aria-expanded="true" aria-controls="collapse<?php echo $shop_cart['combo_id']?>" style="cursor: pointer;" >
									          <?php echo ucwords($combo->combo_name)." (".ucwords($combo->combo_type_name).")"; ?>
									          Productos editables<i class="fa fa-sort-down"></i>
									        </button>
									      </h5>
									    </div>
									    <div id="collapse<?php echo $shop_cart['combo_id']?>" class="collapse <?php if($count_combo==1){ echo 'show'; } ?>" aria-labelledby="headingOne" data-parent="#accordion">
									      	<div class="card-body">
									      		<div class="row">
  													<div class="col-4">
  														<div class="list-group" id="list-tab" role="tablist">
												       	<?php $products = $this->products->comboProducts($shop_cart['combo_id']); ?>
												       	<?php $count_product = 0; ?>
												       	<?php foreach($products as $product){ ?>
												       		<?php $product_categories = $this->products->productCategories($product->product_id) ?>
											       			<?php foreach($product_categories as $product_categorie){ ?>
											       				<?php if($product_categorie->product_category_id==1){?>	
											       					<a class="list-group-item list-group-item-action <?php if($count_product==0){ echo 'active';  $count_product ++;} ?>" id="list-home-list" data-toggle="list" href="#list-<?php echo $product->product_id ?>" role="tab" aria-controls="home">
											       						<?php echo ucfirst($product->product_name.', '.$product->product_trademark.', '.$product->product_net_content) ?>
											       						<span class="badge badge-warning badge-pill float-right" style="font-size: 13px"><?php echo $product->units?></span>
											       					</a>

												       			<?php }?>
												       		<?php }?>
													    <?php }?>
														</div>
												    </div>
												    <div class="col-8">
   														<div class="tab-content" id="nav-tabContent">
   															<?php $products = $this->products->comboProducts($shop_cart['combo_id']); ?>
													       	<?php $count_product = 0; ?>
													       	<?php foreach($products as $product){ ?>										       		
													       		<?php $colors = explode(",", $product->product_colors);?>
													       		<?php $flavors = explode(",", $product->product_flavors);?>
													       		<?php $recipes = explode("->", $product->product_recipes);?>
													       		<?php $product_categories = $this->products->productCategories($product->product_id) ?>
												       			<?php foreach($product_categories as $product_categorie){ ?>
												       				<?php if($product_categorie->product_category_id==1){?>	
												       					<div class="tab-pane fade show <?php if($count_product==0){ echo 'active'; $count_product ++; } ?>" id="list-<?php echo $product->product_id ?>" role="tabpanel" aria-labelledby="list-home-list">
												       						<table class="table">
																			  	<thead>
																				    <tr>
																					    <th scope="col">#</th>
																					    <th class="text-center" scope="col">Colores</th>
																					    <th class="text-center" scope="col">Sabores</th>
																					    <th class="text-center" scope="col">Recetas</th>
																				    </tr>
																			  	</thead>
																			  	<tbody>
																			  		<?php for ($i=0; $i < $product->units ; $i++) { ?>
																			  		

																			  		<tr>
																			  			<td><?php $num=1; echo $num= $num + $i;?></td>	
																			  			<td>
																			  				<select class="custom-select my-1 mr-sm-2 col-lg-12" id="inlineFormCustomSelectPref" name="<?php echo $product->product_id."-color-".$num ?>"  <?php if($product->product_colors == null){ echo 'disabled'; } ?>>	
																			  					<option value="prediseñado">Mira las opciones</option>
																			  					<option value="prediseñado">A nuestro gusto</option>
																			  					<?php foreach ($colors as $key => $color) { ?>
																			  						<option value="<?php echo $color ?>"><?php echo $color ?></option>
																			  					<?php } ?>
																			  					
																			  				</select>
																			  			</td>	
																			  			<td>
																			  				<select class="custom-select my-1 mr-sm-2 col-lg-12" id="inlineFormCustomSelectPref" name="<?php echo $product->product_id."-flagor-".$num ?>"  <?php if($product->product_flavors == null){ echo 'disabled'; } ?>>
																			  					<option value="prediseñado">Mira las opciones</option>
																			  					<option value="prediseñado">A nuestro gusto</option>
																			  					<?php foreach ($flavors as $key => $flavor) { ?>
																			  						<option value="<?php echo $flavor ?>"><?php echo $flavor ?></option>
																			  					<?php } ?>
																			  				</select>	  				
																			  			</td>	
																			  			<td>
																			  				<select class="custom-select my-1 mr-sm-2 col-lg-12" id="inlineFormCustomSelectPref" name="<?php echo $product->product_id."-recipe-".$num ?>"  <?php if($product->product_recipes == null){ echo 'disabled'; } ?>>
																			  					<option value="prediseñado">Mira las opciones</option>
																			  					<option value="prediseñado">A nuestro gusto</option>
																			  					<?php foreach ($recipes as $key => $recipe) { ?>
																			  						<?php if ($recipe != null){ ?>
																			  							<option value="<?php echo $recipe ?>"><?php echo $recipe ?></option>
																			  						<?php } ?>
																			  					<?php } ?>
																			  				</select>
																			  			</td>	
																			  		</tr>
																			  		<?php }?>
																			  	</tbody>	
																			</table>
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
								<?php } ?>
							<?php }?>	
						 <?php }?>
						</div>
					  </div>
					  
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


	<!-- LOAD EFECT -->

	<?php include "Views/includes/load.html.php"; ?>

    <!-- END LOAD EFECT -->

	<!-- Copyright -->


<?php include "Views/includes/footer.html.php"; ?>


<?php include 'Views/includes/script.html.php'; ?>
<script src="public/js/cart_custom.js"></script>
<script src="public/js/shop/cart.js"></script>


</body>

</html>