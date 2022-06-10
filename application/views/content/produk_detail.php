<section class="single-product">
	<div class="container">
		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<img src='images/shop/single-products/product-1.jpg' alt='' data-zoom-image="images/shop/single-products/product-1.jpg" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details">
					<h2> <?= isset($detil[0]['nama']) ? $detil[0]['nama'] : '' ?></h2>
					<p class="product-price"> <?= isset($detil[0]['harga']) ? $detil[0]['harga'] : '' ?></p>
					
					<p class="product-description mt-20">
                        <?= isset($detil[0]['keterangan']) ? $detil[0]['keterangan'] : '' ?>
                    </p>
					<div class="product-quantity">
						<span>Quantity:</span>
						<div class="product-quantity-slider">
							<input id="product-quantity" type="text" value="0" name="product-quantity">
						</div>
					</div>
					<a href="<?= base_url("order") ?>" class="btn btn-main mt-20">Add To Cart</a>
				</div>
			</div>
		</div>
	</div>
</section>