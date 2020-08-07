<?php include "Views/includes/head.html.php"; ?>
<!-- estile page unique -->
<link rel="stylesheet" type="text/css" href="public/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="public/styles/shop/index.css">
<link rel="stylesheet" type="text/css" href="public/styles/shop_responsive.css">

<title>Dulce Sorpresa</title>

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
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
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="public/images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title"></h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filtrar</div>
							<div class="sidebar_subtitle">Precio</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Rango: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
<!-- 						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								<li class="brand"><a href="#">Apple</a></li>
								<li class="brand"><a href="#">Beoplay</a></li>
								<li class="brand"><a href="#">Google</a></li>
								<li class="brand"><a href="#">Meizu</a></li>
								<li class="brand"><a href="#">OnePlus</a></li>
								<li class="brand"><a href="#">Samsung</a></li>
								<li class="brand"><a href="#">Sony</a></li>
								<li class="brand"><a href="#">Xiaomi</a></li>
							</ul>
						</div> -->
					</div>

				</div>

				<div class="col-lg-9">
	
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span><?php echo count($combos);?></span> Productos</div>
							<div class="shop_sorting">
								<span>Ordenar por:</span>
								<ul>
									<li>
										<span class="sorting_text">El mejor valorado<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Orden original</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>Nombre</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>Precio</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>

							<?php foreach($combos as $combo){ ?>

							<!-- Product Item -->
							<div class="product_item is_new" >
								<div class="product_border"></div>
								<a href="?c=shop&a=product&combo_id=<?php echo $combo->combo_id; ?>"><div class="product_image d-flex flex-column align-items-center justify-content-center" style="overflow: hidden;"><img src="<?php echo $combo->combo_image_name; ?>" alt="" style="height: 100%; width: auto;"></div></a>
								<div class="product_content">
									<div class="product_price"><a href="?c=shop&a=product&combo_id=<?php echo $combo->combo_id; ?>" style="color: black;">$<?php echo $combo->combo_sale_price; ?></a></div>
									<div class="product_name"><div><a href="?c=shop&a=product&combo_id=<?php echo $combo->combo_id; ?>"><strong><?php echo $combo->combo_name; ?></strong></a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
									<li class="product_mark product_discount">-25%</li>
									<a href="?c=shop&a=show" data-id="<?php echo $combo->combo_id; ?>" class="show-content-modal"><li class="product_mark product_show"><i class="fa fa-eye"></i></li></a>
									<?php 

										$today=date('Y-m-d');
										$created_at = explode(" ", $combo->created_at);
										$created_at[0];
										
										if ($today == $created_at[0]) { ?>

											<!-- <li class="product_mark product_new">new</li> -->

										<?php } ?>
									
								</ul>
							</div>
							<?php } ?>

							<!-- Product Item -->

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
<script src="public/js/shop_custom.js"></script>
<script src="public/js/shop/index.js"></script>

</body>

</html>

