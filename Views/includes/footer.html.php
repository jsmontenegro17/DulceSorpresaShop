
	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a class="load" href="?c=shop&a=index"><img src="https://www.dropbox.com/s/gauincozjpa3jrw/favicon.png?raw=1"></a></div>
						</div>
						<div class="footer_title">¿Tienes una pregunta? Llámenos 24/7</div>
						<div class="footer_phone">+57 310 526 1209</div>
						<div class="footer_contact_text">
							<p>Carrera 25 # 9-17, Piso 2</p>
							<p>Florida - Valle, Colombia</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a class="load" href="https://www.facebook.com/DULCE-Sorpresa-101799444745303"><i class="fab fa-facebook-f"></i></a></li>
								<li><a class="load" href="#"><i class="fab fa-blogger"></i></a></li>
								<li><a class="load" href="https://www.instagram.com/dulce_sorpresaflorida/?hl=es-la"><i class="fab fa-instagram"></i></a></li>
								<li><a class="load" href="#"><i class="fab fa-google"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Encuéntralo rápido</div>
						<ul class="footer_list">
							<?php $count_type = 0; ?>
							<?php foreach($comboTypes as $comboType){ ?>
								<?php $count_type++ ?>
								<?php if ($count_type <= 7): ?>
									<li><a class="load" href="?c=Shop&a=typeCombo&type=<?php echo $comboType->combo_type_name; ?>" ><?php echo ucwords($comboType->combo_type_name); ?></a></li>
								<?php endif ?>
								
							<?php } ?>
<!-- 							<li><a class="load" href="#">Cameras & Photos</a></li>
							<li><a class="load" href="#">Hardware</a></li>
							<li><a class="load" href="#">Smartphones & Tablets</a></li>
							<li><a class="load" href="#">TV & Audio</a></li> -->
						</ul>
<!-- 						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a class="load" href="#">Car Electronics</a></li>
						</ul> -->
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
						<?php $count_type = 0; ?>
						<?php foreach($comboTypes as $comboType){ ?>
							<?php $count_type++ ?>
							<?php if ($count_type > 7): ?>
								<li><a class="load" href="?c=Shop&a=typeCombo&type=<?php echo $comboType->combo_type_name; ?>" ><?php echo ucwords($comboType->combo_type_name); ?></a></li>
							<?php endif ?>
							
						<?php } ?>
						</ul>
					</div> 
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Atención al cliente</div>
						<ul class="footer_list">
							<li><a class="load" href="?c=Order&a=trackingView">Rastreo de orden</a></li>
							<li><a class="load" href="?c=shop&a=favoriteView">Lista de favoritos</a></li>
							<li><a class="load" href="?c=contact&a=index">Servicios al cliente</a></li>
							<!-- <li><a class="load" href="#">FAQs</a></li>
							<li><a class="load" href="#">Soporte de producto</a></li> -->
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos lo derechos reservado a esta plantilla | esta editado por JSMT Organization <i class="fa fa-heart" aria-hidden="true"></i> by <a class="load" href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
<!-- 							<ul class="logos_list">
								<li><a class="load" href="#"><img src="public/images/logos_1.png" alt=""></a></li>
								<li><a class="load" href="#"><img src="public/images/logos_2.png" alt=""></a></li>
								<li><a class="load" href="#"><img src="public/images/logos_3.png" alt=""></a></li>
								<li><a class="load" href="#"><img src="public/images/logos_4.png" alt=""></a></li>
							</ul> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

