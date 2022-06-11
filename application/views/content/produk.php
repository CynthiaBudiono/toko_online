<section class="products section">
	<div class="container">
		<div class="row">
        <?php if(isset($produk)) : ?>
            <?php if(is_array($produk)) : ?>
                <?php foreach($produk as $key) : ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-thumb">
                            <?php if (isset($key['stok'])){ if ($key['stok'] <= 0){ ?>
                                <span class="bage bg-red">Out of Stock</span>
                            <?php } else{ ?>
                                <span class="bage"><?= $key['stok'] ?></span>
                            <?php }} ?>
                            <img class="img-responsive" src="<?= base_url() ?>/assets/images/produk/<?= (isset($key['foto'])) ? $key['foto'] : '' ?>" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li class="bg-red">
                                    <?php if (isset($key['stok'])){ if ($key['stok'] <= 0){ ?>
                                        <a disabled><i class="tf-ion-minus-circled"></i></a>
                                    <?php } else{ ?>
                                        <a onclick="addquickcart(<?= (isset($key['id'])) ? $key['id'] : '' ?>)"><i class="tf-ion-android-cart"></i></a>
                                    <?php }} ?>
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