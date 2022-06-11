<section class="user-dashboard page-wrapper">
  <div class="container">
  <a href="<?= base_url("order/orderan") ?>" class="btn btn-main mt-20">Go to List Order</a>
    <div class="row">
    <?php if(isset($order_detail)) : ?>
            <?php if(is_array($order_detail)) : ?>
                <?php foreach($order_detail as $key) : ?>
                    <div class="col-md-12">
                        <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="media">
                            <div class="pull-left text-center" href="<?= base_url("produk/detils/") ?><?= (isset($key['id'])) ? base64_encode($key['id']) : '' ?>">
                                <!-- <img class="media-object user-img" src="images/avater.jpg" alt="Image"> -->
                                <img width="100" src="<?= base_url() ?>/assets/images/produk/<?= (isset($key['foto'])) ? $key['foto'] : '' ?>" alt="Image" />
                            </div>
                            <div class="media-body">
                            <ul class="user-profile-list">
                                <li><span>Produk:</span><?= (isset($key['nama_produk'])) ? $key['nama_produk'] : '' ?></li>
                                <li><span>Jumlah:</span><?= (isset($key['jumlah'])) ? $key['jumlah'] : '' ?></li>
                                <li><span>@Harga:</span> Rp. <?= (isset($key['harga'])) ? $key['harga'] : '' ?></li>
                            </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
  </div>
</section>