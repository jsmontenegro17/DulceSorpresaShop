<?php include "Views/includes/head.html.php"; ?>
<title>Dulce Sorpresa</title>
<link rel="stylesheet" type="text/css" href="public/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="public/styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="public/styles/shop/cart.css">
<!-- CSS TABLE CON BUSCADOR -->
 <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<!-- CSS ICHEK BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- CSS ICHEK lightbox -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">

</head>

<body id="body" style="overflow: hidden;">
	<header class="header">

		<!-- Top Bar -->

<!-- 		<div class="top_bar">
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
										<ul>
											<li><a href="#">Italian</a></li>
											<li><a href="#">Spanish</a></li>
											<li><a href="#">Japanese</a></li>
										</ul>
									</li>
									<li>
										<a href="#">$ COP Pesos Colombianos<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">EUR Euro</a></li>
											<li><a href="#">GBP British Pound</a></li>
											<li><a href="#">JPY Japanese Yen</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="public/images/user.svg" alt=""></div>
								<div><a href="#">Register</a></div>
								<div><a href="#">Sign in</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div> -->



		<?php include 'Views/includes/menu.html.php'; ?>
		
		<!-- Menu -->

		<?php include 'Views/includes/menu-responsive.html.php'; ?>
		<!-- Header Main -->

		<?php include 'Views/includes/navigation.html.php'; ?>
		
		<!-- Main Navigation -->

	</header>

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12" name="cart">
					<div class="tab-content" id="nav-tabContent" >
					  <div class="tab-pane fade show active" id="nav-cart" role="tabpanel" aria-labelledby="nav-cart-tab">
					  	<div class="cart_container">
							<div class="cart_title"></div>
							<div class="cart_items">
								<ul class="cart_list">
									<?php if(isset($_SESSION['shop-cart'])){ ?>
										<?php foreach ($_SESSION['shop-cart'] as $shop_cart) { ?>
											<li class="cart_item clearfix" id="li-<?php echo $shop_cart['combo_id'] ?>">
												<div class="cart_item_image" style="overflow: hidden;"><img src="<?php echo $shop_cart['combo_image_name'] ?>" alt=""></div>
												<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
													<div class="cart_item_name cart_info_col">
														<div class="cart_item_title">Nombre</div>
														<div class="cart_item_text"><?php echo $shop_cart['combo_name'] ?></div>
													</div>
													<div class="cart_item_quantity cart_info_col">
														<div class="cart_item_title">Cantidad</div>
														<div class="cart_item_text"><input type="number" class="quantity-combo" data-id="<?php echo $shop_cart['combo_id'] ?>" min="1" name="quantity-<?php echo $shop_cart['combo_id'] ?>" value="<?php echo $shop_cart['quantity'] ?>" ></div>
													</div>
													<div class="cart_item_price cart_info_col">
														<div class="cart_item_title">Precio</div>
														<div class="cart_item_text">$ <?php echo $shop_cart['combo_sale_price'] ?></div>
														<input type="hidden" id="price-<?php echo $shop_cart['combo_id'] ?>" value="<?php echo $shop_cart['combo_sale_price']?>">
													</div>
													<div class="cart_item_total cart_info_col">
														<div class="cart_item_title">Total</div>
														<div class="cart_item_text" id="price-quantity-<?php echo $shop_cart['combo_id'] ?>">$ <?php echo $shop_cart['price_quantity'] ?></div>
														<input type="hidden" id="price-quantity-total-<?php echo $shop_cart['combo_id'] ?>" class="price_quantity" value="<?php echo $shop_cart['price_quantity']?>">
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
							<div class="row">

								<?php if (isset($_SESSION['total-price'])) { ?>
								<div class="cart_buttons width-50p col-lg-6">
									<a href="?c=shop&a=index" class="button cart_button_clear" id="add-cart"><i class="fa fa-plus-circle"></i> Agregar <span class="hidden-max-992px">más</span></a>
								</div>
								<div class="cart_buttons width-50">
									<a href="?c=order&a=create" class="button cart_button_checkout btn-make-order"><i class="fa fa-edit"></i> Hacer orden</a>
								</div>
								<?php }else{?> 
								<div class="cart_buttons width-50p col-lg-12">
									<a href="?c=shop&a=index" class="button cart_button_clear" id="add-cart"><i class="fa fa-plus-circle"></i> Agrega <span class="hidden-max-992px"> tu primer combo</span></a>
								</div>
								<?php } ?>
							</div>
							
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="public/js/cart_custom.js"></script>
<script src="public/js/shop/cart.js"></script>


</body>

</html>