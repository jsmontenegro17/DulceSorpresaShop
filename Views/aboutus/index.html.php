<?php include "Views/includes/head.html.php"; ?>
<!-- estile page unique -->
<link rel="stylesheet" type="text/css" href="public/styles/blog_single_styles.css">
<link rel="stylesheet" type="text/css" href="public/styles/blog_single_responsive.css">
<link rel="stylesheet" type="text/css" href="public/styles/aboutus/index.css">
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

	<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title"></div>
					<div class="single_post_text">
						<p>Dulce Sorpresa nace del amor por crear momentos especiales y recordarlos para siempre, en nuestra empresa encontraras  personal capacitado para realizar cada detalle con los más mínimos cuidados y asegurarte que tu regalo este hecho como tu lo deseas, contamos con todas las normas de higiene y seguridad para brindarte seguridad a ti y a los tuyos. Cada proceso es supervisado y nuestros productos son escojidos por marca y calidad asi te garantizamos que una vez reciban tu regalo sera la mejor experiencia.</p>

						<!-- <div class="single_post_quote text-center">
							<div class="quote_image"><img src="images/quote.png" alt=""></div>
							<div class="quote_text">Quisque sagittis non ex eget vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis in dictum tincidunt, dolor nibh lacinia lacus.</div>
							<div class="quote_name">Liam Neeson</div>
						</div>
 -->

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

	<?php include "Views/includes/load.html.php"; ?>

    <!-- END LOAD EFECT -->

	<!-- Copyright -->


<?php include "Views/includes/footer.html.php"; ?>


<?php include 'Views/includes/script.html.php'; ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="public/js/aboutus/index.js"></script>
<script src="public/js/blog_single_custom.js"></script>

</body>

</html>

