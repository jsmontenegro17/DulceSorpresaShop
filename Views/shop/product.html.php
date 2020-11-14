<?php include "Views/includes/head.html.php"; ?>
<title>Dulce Sorpresa</title>

<link rel="stylesheet" type="text/css" href="public/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="public/styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="public/styles/shop/product.css">

</head>

<body id="body" style="overflow: hidden;">

<div class="super_container">
	
	<!-- Header -->
	
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
		
	</header>
	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<!-- Header Main -->
			<?php include 'Views/includes/navigation.html.php'; ?>
			<!-- Main Navigation -->
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<?php foreach ($combo_images as $combo_image) { ?>
							<li data-image="<?php echo $combo_image->combo_image_name; ?>"><img src="<?php echo $combo_image->combo_image_name; ?>" alt=""></li>
						<?php } ?>
						
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="<?php echo $combo_image->combo_image_name;?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category"><?php echo ucwords($combo->combo_type_name); ?></div>
						<div class="product_name"><?php echo ucwords($combo->combo_name); ?></div>
						<!-- <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div> -->
						<div class="product_text">
							<!-- <form></form> -->
							<?php foreach($products as $product){ ?>	
							<div id="accordion">						
								<?php echo $product->units.'. '.ucfirst($product->product_name.', '.$product->product_trademark.', '.$product->product_net_content) ?> 
								
							</div>
							<?php } ?>
						</div>		
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Cantidad: </span>
										<input id="quantity_input" type="number" min="1"  value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									<!-- Product Color -->

								</div>

								<div class="product_price">$<?php echo $combo->combo_sale_price?></div>
								<div class="button_container">
									<button type="button" data-url="?c=cart&a=add&combo_id=<?php echo $combo->combo_id; ?>" class="button cart_button add-cart">Agregar al carrito</button>
									<div class="product_fav 
									<?php $arrayFav = $_SESSION['fav'];
			 						$find=false;
			 						$number = 0;
							 		for ($i=0; $i < count($arrayFav) ; $i++) { 
							 			
							 			if ($arrayFav[$i]['combo_id'] == $combo->combo_id) {
							 				$find = true;
							 				$number = $i;
							 			}
							 		}
							 		if ($find == true) {
							 			echo "active";
							 		} ?>" data-url="?c=shop&a=fav&combo_id=<?php echo $combo->combo_id; ?>" data-id="<?php echo $combo->combo_id; ?>"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
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
<script src="public/js/product_custom.js"></script>

<script src="public/js/shop/product.js"></script>


</body>

</html>
