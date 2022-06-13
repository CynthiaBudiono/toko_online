<style>
    .tabCommon, .tab-content {
        border: none !important;
    }
</style>

<div class="container">
<div class="row" id="usingvue">
    <div class="col-xs-12">
        <div class="tabCommon mt-20">
            <ul class="nav nav-tabs">
                <?php if(isset($mode)) {?>
                    <li class="" ><a data-toggle="tab" href="#cart" aria-expanded="true">Cart</a></li>
                    <li class="active"><a data-toggle="tab" href="#orders" aria-expanded="false">Orders</a></li>
                <?php } else{?>
                    <li class="active" ><a data-toggle="tab" href="#cart" aria-expanded="true">Cart</a></li>
                    <li class=""><a data-toggle="tab" href="#orders" aria-expanded="false">Orders</a></li>
                <?php }?>
            </ul>
            <div class="tab-content patternbg" style="min-height: 400px;">
                <?php if(isset($mode)) {?>
                    <div id="cart" class="tab-pane fade">
                <?php } else{?>
                    <div id="cart" class="tab-pane fade active in">
                <?php }?>
                    <div class="page-wrapper">
                        <div class="cart shopping">
                            <?php if(($this->session->userdata('cart')) != null) : ?>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                        <div class="block">
                                            <div class="product-list">
                                            <form method="post">
                                                <table class="table">
                                                <thead>
                                                    <tr>

                                                        <th class="">Nama</th>
                                                        <th class="">Jumlah x Harga (Rp)</th>
                                                        <th class="">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(is_array($this->session->userdata('cart'))) : ?>
                                                    <?php foreach($this->session->userdata('cart') as $key) : ?>
                                                        <tr class="">
                                                        <td class="">
                                                            <div class="product-info">
                                                            <img width="80" src="<?= base_url() ?>/assets/images/produk/<?= (isset($key['foto'])) ? $key['foto'] : '' ?>" alt="" />
                                                            <a href="<?= base_url("produk/detils/") ?><?= (isset($key['id'])) ? base64_encode($key['id']) : '' ?>"><?= (isset($key['nama'])) ? $key['nama'] : '' ?></a>
                                                            </div>
                                                        </td>
                                                        <td class=""><?= (isset($key['jumlah'])) ? $key['jumlah'] : '' ?> x <?= (isset($key['harga'])) ? $key['harga'] : '' ?></td>
                                                        <td class="">
                                                            <!-- <button class="btn btn-main mt-20" onclick="addcart()">Add To Cart</button> -->
                                                            <a class="product-remove" href="" @click="hapus(<?= (isset($key['id'])) ? $key['id'] : '' ?>)">Remove</a>
                                                            <!-- onclick="hapus(<?= (isset($key['id'])) ? $key['id'] : '' ?>)" -->
                                                        </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                </tbody>
                                                </table>
                                                <a href="<?= base_url("order/checkout") ?>" class="btn btn-main pull-right">Checkout</a>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                            <?php else : ?>
                                <div class="container text-center">
                                    <h4>Ayo belanja sekarang!</h4>
                                    <a href="<?= base_url("produk") ?>" class="btn btn-main">Get Now</a>
                                </div>
                        <?php endif; ?>
                        </div>
                    </div>    
                </div>
                <?php if(isset($mode)) {?>
                    <div id="orders" class="tab-pane fade active in">
                <?php } else{?>
                    <div id="orders" class="tab-pane fade">
                <?php }?>
                
                <div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Tanggal Mesan</th>
									<th>Barang</th>
									<th>Total Harga</th>
                                    <th>Bukti Bayar</th>
									<!-- <th>Status</th> -->
									<th></th>
								</tr>
							</thead>
							<tbody>
                            <?php if(isset($order)) : ?>
                                <?php if(is_array($order)) : ?>
                                    <?php foreach($order as $key) : ?>
                                    <?php $idproduk = (isset($key['id'])) ? $key['id'] : ''; 
                                        $bukti_pembayaran = (isset($key['bukti_pembayaran'])) ? $key['bukti_pembayaran'] : '0';
                                        $jumlah_pembayaran = (isset($key['jumlah_pembayaran'])) ? $key['jumlah_pembayaran'] : '0';?>
                                    <tr>
                                        <td>#<?= (isset($key['id'])) ? $key['id'] : '' ?></td>
                                        <td><?= (isset($key['created'])) ? $key['created'] : '' ?></td>
                                        <td><?= (isset($key['jumlah_produk'])) ? $key['jumlah_produk'] : '' ?></td>
                                        <td>Rp. <?= (isset($key['jumlah_pembayaran'])) ? $key['jumlah_pembayaran'] : '' ?></td>
                                        <!-- <td><span class="label label-primary">Processing</span></td> -->
                                        <td>
                                            <img width="80" src="<?= base_url() ?>/assets/images/bukti_pembayaran/<?php if(isset($key['bukti_pembayaran'])){ if($key['bukti_pembayaran'] != null) echo $key['bukti_pembayaran']; else echo 'pay.png'; }?>" alt="" />
                                        </td>
                                        <td>
                                            <?php if($key['bukti_pembayaran'] != null){ ?>
                                                <a disabled class="btn btn-success">Bayar</a>
                                            <?php } else {?>
                                                <a data-toggle="modal" data-target="#payment-modal" class="btn btn-success">Bayar</a>
                                            <?php }?>
                                            <a href="<?= base_url("order/detils/") ?><?= (isset($key['id'])) ? base64_encode($key['id']) : '' ?>" class="btn btn-default">View</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endif; ?>
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal product-modal fade" id="payment-modal">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i class="tf-ion-close"></i>
    </button>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?= base_url('order/payment') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="idproduk" id="idproduk" value="<?= $idproduk ?>"/>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <img id="preview1" name="preview1" style="min-height:100px;" src="<?= base_url() ?>assets/images/bukti_pembayaran/<?= $bukti_pembayaran?>" title="Preview Logo">
                            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" onchange="tampilkanPreview(this,'preview1')">
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-short-details">
                                <h2 class="product-title">Pembayaran melalui</h2>
                                <p class="product-price">Rp. <?= $jumlah_pembayaran?></p>
                                <p class="product-short-description">
                                    <?= (isset($tujuan_rekening)) ? $tujuan_rekening : '' ?>
                                </p>
                                <button type="submit" class="btn-main">BAYAR</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /.modal -->

<script>
    var baseurl = "<?php echo base_url(); ?>";

    var error = new Vue({
		el: '#usingvue',
		methods: {
			hapus: function($id) {
				$.post(baseurl + "order/cartremove", {
                    id: $id
                },
                function(result) {
                    var url = "<?= base_url('order/') ?>";
                    window.location = url;
                });
			}
		}
	})

	// function hapus($id){
	// 	$.post(baseurl + "order/cartremove", {
    //         id: $id
    //     },
    //     function(result) {
    //         var url = "<?= base_url('order/') ?>";
    //         window.location = url;
    //     });
	// }

    function tampilkanPreview(userfile, idpreview){

        var gb = userfile.files;

        for (var i = 0; i < gb.length; i++){

            var gbPreview = gb[i];

            var imageType = /image.*/;

            var preview = document.getElementById(idpreview);

            var reader = new FileReader();

            if (gbPreview.type.match(imageType))
            {
                //jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function(element)
                    {
                        return function(e)
                        {
                            element.src = e.target.result;
                        };
                    })(preview);
                //membaca data URL gambar
                reader.readAsDataURL(gbPreview);
            }
            else{
                //jika tipe data tidak sesuai
                alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
            }
        }
        }
</script>