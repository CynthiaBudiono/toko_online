<div class="hero-slider">
  <div class="slider-item th-fullpage hero-area" style="background-image: url(<?= base_url() ?>assets/images/slider/slider-1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-center">
          <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Clothing</p>
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Wujudkan Mimpimu <br> Bersama MerryRianaShop</h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="<?= base_url("produk") ?>">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
  <div class="slider-item th-fullpage hero-area" style="background-image: url(<?= base_url() ?>assets/images/slider/slider-2.jpg);"></div>
  <div class="slider-item th-fullpage hero-area" style="background-image: url(<?= base_url() ?>assets/images/slider/slider-3.jpg);"></div>
</div>

<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Produk Terlaris</h2>
			</div>
		</div>
		<div class="row">
        <?php if(isset($produk_terlaris)) : ?>
            <?php if(is_array($produk_terlaris)) : ?>
                <?php foreach($produk_terlaris as $key) : ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="<?= base_url() ?>/assets/images/produk/<?= (isset($key['foto'])) ? $key['foto'] : '' ?>" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li class="bg-red">
                                        <a href="" onclick="addquickcart(<?= (isset($key['id'])) ? $key['id'] : '' ?>)"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="<?= base_url("produk/detils/") ?><?= (isset($key['id'])) ? base64_encode($key['id']) : '' ?>"><?= (isset($key['nama'])) ? $key['nama'] : '' ?></a></h4>
                            <p class="price"><?= (isset($key['harga'])) ? $key['harga'] : '' ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
		</div>
	</div>
</section>