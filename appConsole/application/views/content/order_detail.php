<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= isset($title) ? $title : "-" ?></h3>
            </div>
        </div>
        <!-- VIEW -->
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title" id="data_table">
                    <h2>Order #<?= (isset($order['id'])) ? $order['id'] : '' ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong><?= (isset($order['nama_customer'])) ? $order['nama_customer'] : '' ?></strong>
                                    <br><?= (isset($order['alamat'])) ? $order['alamat'] : '' ?>
                                    <br>Phone: <?= (isset($order['no_hp'])) ? $order['no_hp'] : '' ?>
                                    <br>Email: <?= (isset($order['email'])) ? $order['email'] : '' ?>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Tanggal Pemesanan :</b> <?= (isset($order['created'])) ? $order['created'] : '' ?>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Note :</b>
                                <br>
                                <?= (isset($order['keterangan'])) ? $order['keterangan'] : '' ?>
                            </div>
                        </div>

                        <div class="row">
                        <div class="table">
                            <table id="datatable-order" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Jumlah x Harga Satuan</th>
                                    </tr>
                                </thead>
                                <tbody id="data_order">
                                <?php if(isset($order_detail)) : ?>
                                    <?php if(is_array($order_detail)) : ?>
                                        <?php foreach($order_detail as $key) : ?>
                                        <tr>
                                            <td><?= (isset($key['id'])) ? $key['id'] : '' ?></td>
                                            <td>
                                                <img width="80" src="<?= base_url() ?>../assets/images/produk/<?= (isset($key['foto'])) ? $key['foto'] : '' ?>" alt="" />
                                                <b><?= (isset($key['nama_produk'])) ? $key['nama_produk'] : '' ?></b>
                                            </td>
                                            <td><?= (isset($key['nama_produk'])) ? $key['nama_produk'] : '' ?>Rp. <?= (isset($key['jumlah_pembayaran'])) ? $key['jumlah_pembayaran'] : '' ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                      </div>

                      <div class="row">
                        <h2>Total <?= (isset($order['jumlah_pembayaran'])) ? $key['jumlah_pembayaran'] : '' ?></h2>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>