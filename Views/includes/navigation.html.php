<div class="header_main" style="z-index: 0">
	<div class="container">
		<div class="row">

			<!-- Logo -->
			<div class="col-lg-2 col-sm-3 col-3 order-1">
				<div class="logo_container">
					<div class="logo"><a class="load" href="?c=shop&a=index"><img src="https://www.dropbox.com/s/gauincozjpa3jrw/favicon.png?raw=1"></a></div>
				</div>
			</div>

			<!-- Search -->
			<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">

				<div class="header_search">
					<div class="header_search_content">
						
							<h2 id="title" class="text-center" style="color: #6f51c7 !important; font-family: 'Asap', sans-serif;">  </h2>
						
					</div>
				</div>
			</div>

			<!-- Wishlist -->
			<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
				<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
					<div class="wishlist d-flex flex-row align-items-center justify-content-end">
						<div class="wishlist_icon"><img src="public/images/heart.png" alt=""></div>
						<div class="wishlist_content">
							<div class="wishlist_text"><a class="load" href="?c=shop&a=favoriteView">Favoritos</a></div>
							<div class="wishlist_count"><span id="fav_count_product"><?php if (isset($_SESSION['fav'])) { ?>
							<?php echo count($_SESSION['fav']); ?>
							<?php } else { echo "0"; } ?></span></div>
							<input type="hidden" id="input-fav-count" value="<?php if (isset($_SESSION['fav'])) { ?>
							<?php echo count($_SESSION['fav']); ?>
							<?php } else { echo "0"; } ?>">
						</div>
					</div>

					<!-- Cart -->

					<a class="load" href="?c=cart&a=index">
						<div class="cart">
							<div class="cart_container d-flex flex-row align-items-center justify-content-end">
								<div class="cart_icon">
									<img src="public/images/cart.png" alt="" >

									<div class="cart_count"><span id="cart_count_product"><?php if (isset($_SESSION['shop-cart'])) { ?>
									<?php echo count($_SESSION['shop-cart']); ?>
									<?php } else { echo "0"; } ?></span></div>
									<input type="hidden" id="input-cart-count" value="<?php if (isset($_SESSION['shop-cart'])) { ?>
									<?php echo count($_SESSION['shop-cart']); ?>
									<?php } else { echo "0"; } ?>">
								</div>
								
								<div class="cart_content">
									<div class="cart_text"><a class="load" href="?c=cart&a=index">Carrito</a></div>
									<div class="cart_price">$ <strong id="cart-price-total"><?php if (isset($_SESSION['total-price'])) { ?>
										<input type="hidden" id="input-cart-price-total" value="<?php echo $_SESSION['total-price']; ?>">
										<?php echo $_SESSION['total-price']; ?>
										<?php } else { echo "$0"; } ?>	
										</strong>
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
