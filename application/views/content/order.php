<style>
    .tabCommon, .tab-content {
        border: none !important;
    }
</style>

<div class="container">
<div class="row">
    <div class="col-xs-12">
        <div class="tabCommon mt-20">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#cart" aria-expanded="true">Cart</a></li>
                <li class=""><a data-toggle="tab" href="#orders" aria-expanded="false">Orders</a></li>
            </ul>
            <div class="tab-content patternbg" style="min-height: 400px;">
                <div id="cart" class="tab-pane fade active in">
                    <div class="page-wrapper">
                        <div class="cart shopping">
                            <?php if(($this->session->userdata('cart')) != null) : ?>
                                <?php if(is_array($this->session->userdata('cart'))) : ?>
                                    <?php foreach($this->session->userdata('cart') as $key) : ?>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                        <div class="block">
                                            <div class="product-list">
                                            <form method="post">
                                                <table class="table">
                                                <thead>
                                                    <tr>

                                                        <th class="">Nama</th>
                                                        <th class="">Harga (Rp)</th>
                                                        <th class="">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                        <tr class="">
                                                        <td class="">
                                                            <div class="product-info">
                                                            <img width="80" src="<?= base_url() ?>/assets/images/produk/<?= (isset($key['foto'])) ? $key['foto'] : '' ?>" alt="" />
                                                            <a href="#!"><?= (isset($key['nama'])) ? $key['nama'] : '' ?></a>
                                                            </div>
                                                        </td>
                                                        <td class=""><?= (isset($key['harga'])) ? $key['harga'] : '' ?></td>
                                                        <td class="">
                                                            <a class="product-remove" href="#!">Remove</a>
                                                        </td>
                                                        </tr>
                                                        
                                                </tbody>
                                                </table>
                                                <a href="<?= base_url("order/checkout") ?>" class="btn btn-main pull-right">Checkout</a>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php else : ?>
                                <div class="container text-center">
                                    <h4>Ayo belanja sekarang!</h4>
                                    <a href="<?= base_url("produk") ?>" class="btn btn-main">Get Now</a>
                                </div>
                        <?php endif; ?>
                        </div>
                    </div>    
                </div>
                <div id="orders" class="tab-pane fade">
                <div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Tanggal Mesan</th>
									<th>Barang</th>
									<th>Total Harga</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td>#451231</td>
									<td>Mar 25, 2016</td>
									<td>2</td>
									<td>$99.00</td>
									<td><span class="label label-primary">Processing</span></td>
									<td>
                                        <a href="<?= base_url("produk/payment") ?>" class="btn btn-success">Bayar</a>
                                        <a href="<?= base_url("produk/detils") ?>" class="btn btn-default">View</a>
                                    </td>
								</tr>
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>