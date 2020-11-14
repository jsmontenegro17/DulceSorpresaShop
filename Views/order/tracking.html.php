<?php include "Views/includes/head.html.php"; ?>
<title>Dulce Sorpresa</title>
<link rel="stylesheet" type="text/css" href="public/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="public/styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="public/styles/order/tracking.css">
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
		</div>
 -->
		<!-- Header Main -->

		
		<!-- Main Navigation -->

		<?php include 'Views/includes/menu.html.php'; ?>
		
		<!-- Menu -->

		<?php include 'Views/includes/menu-responsive.html.php'; ?>

		
		<?php include 'Views/includes/navigation.html.php'; ?>

	</header>

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12" name="cart">
					<div class="tab-content" id="nav-tabContent">
						<form id="form-tracking">
							<div class="row">
								<div class="col-lg-3">
									<label>Numero de tu orden</label>
									<input type="text" class="form-control" name="order_number" id="order_number" required>
								</div>
								<div class="col-lg-3 margin-top-10px">
									<label>Codigo de seguridad</label>
									<input type="text" class="form-control" name="order_security_code" id="order_security_code" autocomplete="off" required>
								</div>
								<div class="col-lg-3">
									<button class="btn btn-info" class="load" style="margin-top: 28px;">RASTREAR</button>
								</div>									
							</div>
						</form>
						<div class="tab-pane fade show active" id="nav-cart" role="tabpanel" aria-labelledby="nav-cart-tab"><br>
						  	<div class="cart_container">

								
						  		<div class="jumbotron">
								  	<h1 class="display-4">Hola!</h1>
								 	 <p class="lead">Aqu&iacute; podras rastrear tu orden.</p>
								 	 <hr class="my-4">
								  	<p style="font-size: 13px" class="message">Digita el numero de tu orden y el codigo de seguridad que se te asigno en el correo de confirmacion que te llego cuando nos enviaste tu orden, cabe resaltar que el codigo de seguridad es unico para que puedas seguir tu orden as&iacute; que no la pierdas, si lo perdiste comunicate con nuestros asesores comerciales para la recuperaci&oacute;n </p>
								  	
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
<script src="public/js/custom.js"></script>
<script src="public/js/order/tracking.js"></script>


</body>

</html>