<div class="header_main">
	<div class="container">
		<div class="row">

			<!-- Logo -->
			<div class="col-lg-2 col-sm-3 col-3 order-1">
				<div class="logo_container">
					<div class="logo"><a href="?c=shop&a=index"><img src="https://www.dropbox.com/s/gauincozjpa3jrw/favicon.png?raw=1"></a></div>
				</div>
			</div>

			<!-- Search -->
			<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
				<div class="header_search">
					<div class="header_search_content">
						<div class="header_search_form_container">
							<form action="#" class="header_search_form clearfix">
								<input type="search" required="required" class="header_search_input" placeholder="Buscar producto...">
								<div class="custom_dropdown">
									<div class="custom_dropdown_list">
										<span class="custom_dropdown_placeholder clc">Todas las Categorias</span>
										<i class="fas fa-chevron-down"></i>
										<ul class="custom_list clc">
											<li><a class="clc" href="#">Todas las Categorias</a></li>
										</ul>
									</div>
								</div>
								<button type="submit" class="header_search_button trans_300" value="Submit"><img src="public/images/search.png" alt=""></button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Wishlist -->
			<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
				<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
					<div class="wishlist d-flex flex-row align-items-center justify-content-end">
						<div class="wishlist_icon"><img src="public/images/heart.png" alt=""></div>
						<div class="wishlist_content">
							<div class="wishlist_text"><a href="#">Favoritos</a></div>
							<div class="wishlist_count">115</div>
						</div>
					</div>

					<!-- Cart -->

					<a href="?c=cart&a=index">
						<div class="cart">
							<div class="cart_container d-flex flex-row align-items-center justify-content-end">
								<div class="cart_icon">
									<img src="public/images/cart.png" alt="" >

									<div class="cart_count"><span id="cart_count_product"><?php if (isset($_SESSION['shop-cart'])) { ?>
									<?php echo count($_SESSION['shop-cart']); ?>
									<?php } else { echo "0"; } ?></span></div>
									<input type="hidden" id="input-cart-count" value="<?php echo count($_SESSION['shop-cart']); ?>">
								</div>
								
								<div class="cart_content">
									<div class="cart_text"><a href="?c=cart&a=index">Carrito</a></div>
									<div class="cart_price"><?php if (isset($_SESSION['total-price'])) { ?>
										<?php echo '$'.$_SESSION['total-price']; ?>
										<?php } else { echo "$0"; } ?>	
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
