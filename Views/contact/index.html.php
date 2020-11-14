<?php include "Views/includes/head.html.php"; ?>
<!-- estile page unique -->
<link rel="stylesheet" type="text/css" href="public/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="public/styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="public/styles/contact/index.css">
<!-- Select2 -->
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<title>Dulce Sorpresa</title>

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

		<?php include 'Views/includes/menu-responsive.html.php'; ?>

		<?php include 'Views/includes/navigation.html.php'; ?>
		

	</header>
	
	<!-- Home -->



	<!-- Shop -->

	<div class="contact_info">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image" style="font-size: 25px; color: #6f51c7 !important;"><i class="fa fa-phone"></i></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Telefono</div>
								<div class="contact_info_text">+57 310 526 1209</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image" style="font-size: 25px; color: #6f51c7 !important;"><i class="fa fa-at"></i></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Email</div>
								<div class="contact_info_text">dulcesorpresaflorida@gmail.com</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image" style="font-size: 25px; color: #6f51c7 !important;"><i class="fa fa-map-marker-alt"></i></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Direccion</div>
								<div class="contact_info_text">Carrera 25 # 9-17, Piso 2</div>
								<div class="contact_info_text">Florida - Valle, Colombia</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Formulario de contacto</div>

						<form action="?c=contact&a=save" method="POST" id="contact_form">
							<div class="row contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<div class="col-lg-3" style="padding-bottom: 20px">
									<input type="text" name="customer_name" id="contact_form_name" class="col-lg-12 form-control" placeholder="Tu nombre" required="required" data-error="Nombre es requerido.">
								</div>
								<div class="col-lg-3" style="padding-bottom: 20px">
									<input type="text" name="customer_email" id="contact_form_email" class="col-lg-12 form-control" placeholder="Tu email" required="required" data-error="Email es requerido.">
								</div>
								<div class="col-lg-3" style="padding-bottom: 20px">
			                    <select class="select_search" name="phone_code" style="width: 100%;" required>
				                    <option value="+57">Colombia, +57</option>
                    				<?php foreach ($cuontries as $cuontry) { ?>
                        				<?php if($cuontry->phone_code != "57"){ ?>
                        				<option value="+<?php echo $cuontry->phone_code ?>"><?php echo $cuontry->nombre.", +".$cuontry->phone_code ?></option>
                        				<?php } ?>
                    				<?php } ?>
			                    </select>
			               		</div>
			               		<div class="col-lg-3">
									<input type="text" class="col-lg-12 form-control" placeholder="Tu numero de celular" name="customer_phone" required>
								</div>
							</div>
							<div class="contact_form_text">
								<textarea id="contact_form_message" class="form-control" name="message" rows="4" placeholder="Sugerencia o mensaje" required="required" data-error="Por favor escriba tu mensaje o sugerencia."></textarea>
							</div>
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Enviar</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

	<!-- Map -->

	<div class="contact_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map col-lg-12">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d995.7728417483878!2d-76.24143097084794!3d3.327601538692494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3a12cebefb9ec9%3A0x74177870582b8b!2sCra.%2025%20%23%239-17%2C%20Florida%2C%20Valle%20del%20Cauca!5e0!3m2!1ses!2sco!4v1599066945426!5m2!1ses!2sco" width="100%" height="800" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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

	<?php include "Views/includes/load.html.php"; ?>

    <!-- END LOAD EFECT -->

	<!-- Copyright -->


<?php include "Views/includes/footer.html.php"; ?>


<?php include 'Views/includes/script.html.php'; ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<!-- Select2 -->
<script src="https://adminlte.io/themes/v3/plugins/select2/js/select2.full.min.js"></script>
<script src="public/js/contact/index.js"></script>
<script src="public/js/contact_custom.js"></script>

</body>

</html>

