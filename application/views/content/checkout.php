<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <form class="checkout-form" action="<?= base_url("order/orders") ?>" method="post">
                  <div class="block billing-details">
                     <h4 class="widget-title">Detail Pembayaran</h4>
                        <div class="form-group">
                           <label for="full_name">Full Name</label>
                           <input type="text" class="form-control" id="full_name" name="full_name" placeholder="" value="<?= (isset($customer[0]['nama'])) ? $customer[0]['nama'] : '-' ?>">
                        </div>
                        <div class="form-group">
                           <label for="user_address">Address</label>
                           <input type="text" class="form-control" id="user_address" name="user_address" placeholder="jln." value="<?= (isset($customer[0]['alamat'])) ? $customer[0]['alamat'] : '-' ?>">
                        </div>
                        <div class="form-group">
                           <label for="keterangan">Keterangan</label>
                           <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan untuk pemesanan" value="<?= (isset($customer[0]['keterangan'])) ? $customer[0]['keterangan'] : '-' ?>">
                        </div>
                  </div>
                  <div class="block">
                     <h4 class="widget-title">Tujuan Rekening</h4>
                     <p><?= (isset($tujuan_rekening)) ? $tujuan_rekening : '-' ?></p>
                     <div class="checkout-product-details">
                        <div class="payment">
                           <div class="card-details">
                              <button type="submit" class="btn btn-main mt-20">Order Sekarang</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-md-4">
               <div class="product-checkout-details">

                    <div class="block">
                        <?php $jumlah_pembayaran = 0; ?>
                        <h4 class="widget-title">Ringkasan Order</h4>
                        <?php if(($this->session->userdata('cart')) != null) : ?>
                           <?php if(is_array($this->session->userdata('cart'))) : ?>
                              <?php foreach($this->session->userdata('cart') as $key) : ?>
                                 <?php $jumlah_pembayaran += (int)$key['jumlah'] * (int)$key['harga'];?>
                                 <div class="media product-card">
                                    <a class="pull-left" href="product-single.html">
                                       <img width="80" src="<?= base_url() ?>/assets/images/produk/<?= (isset($key['foto'])) ? $key['foto'] : '' ?>" alt="" />                   
                                    </a>
                                    <div class="media-body">
                                       <h4 class="media-heading"><a href="<?= base_url("produk/detils/") ?><?= (isset($key['id'])) ? base64_encode($key['id']) : '' ?>"><?= (isset($key['nama'])) ? $key['nama'] : '' ?></a></h4>
                                       <p class="price"><?= (isset($key['jumlah'])) ? $key['jumlah'] : '' ?> x <?= (isset($key['harga'])) ? $key['harga'] : '' ?></p>
                                       <span class="remove" onclick="hapus(<?= (isset($key['id'])) ? $key['id'] : '' ?>)">Remove</span>
                                    </div>
                                 </div>
                              <?php endforeach; ?>
                           <?php endif; ?>
                        <?php endif; ?>
                        <div class="summary-total">
                              <span>Total</span>
                              <span>Rp. <?= $jumlah_pembayaran?></span>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
    var baseurl = "<?php echo base_url(); ?>";

	function hapus($id){
		$.post(baseurl + "order/cartremove", {
            id: $id
        },
        function(result) {
            var url = "<?= base_url('order/checkout/') ?>";
            window.location = url;
        });
	}
</script>