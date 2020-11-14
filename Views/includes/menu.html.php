<nav class="main_nav">
	<div class="container">
		<div class="row">
			<div class="col">
				
				<div class="main_nav_content d-flex flex-row">

					<!-- Categories Menu -->

					<div class="cat_menu_container">
						<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
							<div class="cat_burger"><span></span><span></span><span></span></div>
							<div class="cat_menu_text">categorias</div>
						</div>
						<ul class="cat_menu">
							<?php foreach($comboTypes as $comboType){ ?>
								<li><a class="load" href="?c=Shop&a=typeCombo&type=<?php echo $comboType->combo_type_name; ?>" ><?php echo ucwords($comboType->combo_type_name); ?><i class="fas fa-chevron-right ml-auto"></i></a></li>
							<?php } ?>
<!-- 							<li><a class="load" href="#">Computers & Laptops <i class="fas fa-chevron-right ml-auto"></i></a></li>
							<li><a class="load" href="#">Cameras & Photos<i class="fas fa-chevron-right"></i></a></li>
							<li class="hassubs">
								<a class="load" href="#">Hardware<i class="fas fa-chevron-right"></i></a>
								<ul>
									<li class="hassubs">
										<a class="load" href="#">Menu Item<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
											<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
											<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
											<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
									<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
									<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
									<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
								</ul>
							</li>
							<li><a class="load" href="#">Smartphones & Tablets<i class="fas fa-chevron-right"></i></a></li>
							<li><a class="load" href="#">TV & Audio<i class="fas fa-chevron-right"></i></a></li>
							<li><a class="load" href="#">Gadgets<i class="fas fa-chevron-right"></i></a></li>
							<li><a class="load" href="#">Car Electronics<i class="fas fa-chevron-right"></i></a></li>
							<li><a class="load" href="#">Video Games & Consoles<i class="fas fa-chevron-right"></i></a></li>
							<li><a class="load" href="#">Accessories<i class="fas fa-chevron-right"></i></a></li> -->
						</ul> 
					</div>

					<!-- Main Nav Menu -->

					<div class="main_nav_menu ml-auto">
						<ul class="standard_dropdown main_nav_dropdown">
							<li><a class="load" href="?c=shop&a=index">Todos los productos<i class="fas fa-chevron-down"></i></a></li>
							<li>
								<a class="load" href="?c=aboutus&a=index">¿Quienes somos?<i class="fas fa-chevron-down"></i></a>
<!-- 										<ul>
									<li>
										<a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
									<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
									<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
									<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
								</ul> -->
							</li>
<!-- 									<li class="hassubs">
								<a class="load" href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
								<ul>
									<li>
										<a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
									<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
									<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
									<li><a class="load" href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</li> -->
							<li><a class="load" href="https://dulcesorpresaflorida.blogspot.com">Blog<i class="fas fa-chevron-down"></i></a></li>
							<li><a class="load" href="?c=contact&a=index">Contactanos<i class="fas fa-chevron-down"></i></a></li>
						</ul>
					</div>

					<!-- Menu Trigger -->

					<div class="menu_trigger_container ml-auto">
						<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
							<div class="menu_burger">
								<div class="menu_trigger_text">menu</div>
								<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</nav>