<style>
	p{
		margin: 0px !important;
	}
</style>
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
									<img src='<?= base_url() ?>/assets/images/produk/<?= isset($detil[0]['foto']) ? $detil[0]['foto'] : 'default.png' ?>' alt='' data-zoom-image="<?= base_url() ?>/assets/images/produk/<?= (isset($detil['foto'])) ? $detil['foto'] : '' ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details" id="usingvue">
					<span id="idproduk" style="display: none;"><?= isset($detil[0]['id']) ? $detil[0]['id'] : '' ?></span>
					<h2> <?= isset($detil[0]['nama']) ? $detil[0]['nama'] : '' ?></h2>
					<p class="product-price" style="font-size: 25px;"> Rp. <?= isset($detil[0]['harga']) ? $detil[0]['harga'] : '' ?></p>
					<p class="product-description mt-20">
                        <?= isset($detil[0]['keterangan']) ? $detil[0]['keterangan'] : '' ?>
                    </p>
					<p class="product-description mt-20" style="font-size: 20px;">
                        <b>Stock : <span id="stok"><?= isset($detil[0]['stok']) ? $detil[0]['stok'] : '0' ?></span></b>
                    </p>
					<div class="product-quantity">
						<span>Quantity:</span>
						<div class="product-quantity-slider">
							<input id="product-quantity" type="number" value="1"  min="1" max="<?= isset($detil[0]['stok']) ? $detil[0]['stok'] : '0' ?>" @click="cekstok">
							<span id="error" style="color: red;"> {{ error_msg }}</span>
						</div>
					</div>
					<button class="btn btn-main mt-20" @click="addcart">Add To Cart</button>
					<!-- onclick="addcart()" -->
				</div>
			</div>
		</div>
	</div>
</section>

<script>
    var baseurl = "<?php echo base_url(); ?>";

	var error = new Vue({
		el: '#usingvue',
		data: {
			error_msg: ''
		},
		methods: {
			cekstok: function() {
				if(parseInt($("#product-quantity").val()) > parseInt($("#stok").html())){
					this.error_msg = "Stok Terbatas!";
				}
				else{
					this.error_msg = "";
				}
			},
			addcart: function(){
				if(this.error_msg == ""){
					$.post(baseurl + "order/cart", {
						id: $("#idproduk").html(),
						jumlah: $("#product-quantity").val(),
					},
					function(result) {
						var url = "<?= base_url('order/') ?>";
						window.location = url;
					});
				}
				else{
					alert("Jumlah pembelian melebihi stok");
				}
			}
		}
	})
</script>