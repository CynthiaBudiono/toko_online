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
                    <h2>Order #<?= (isset($order[0]['id'])) ? $order[0]['id'] : '' ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 invoice-col">
                            To
                            <address>
                                <strong><?= (isset($order[0]['nama_pemesanan'])) ? $order[0]['nama_pemesanan'] : '' ?></strong>
                                <br><?= (isset($order[0]['alamat_pengiriman'])) ? $order[0]['alamat_pengiriman'] : '' ?>
                                <br>Phone: <?= (isset($order[0]['no_hp'])) ? $order[0]['no_hp'] : '' ?>
                                <br>Email: <?= (isset($order[0]['email'])) ? $order[0]['email'] : '' ?>
                            </address>
                        </div>
                        <div class="col-md-4 col-sm-4 invoice-col">
                            <b>Tanggal Pemesanan :</b> <?= (isset($order[0]['created'])) ? $order[0]['created'] : '' ?>
                        </div>
                        <div class="col-md-4 col-sm-4 invoice-col">
                            <b>Note :</b>
                            <br>
                            <?= (isset($order[0]['keterangan'])) ? $order[0]['keterangan'] : '' ?>
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
                                            <td>
                                                <img width="80" src="<?= base_url() ?>../assets/images/produk/<?= (isset($key['foto'])) ? $key['foto'] : '' ?>" alt="" />
                                                <b><?= (isset($key['nama_produk'])) ? $key['nama_produk'] : '' ?></b>
                                            </td>
                                            <td><?= (isset($key['jumlah'])) ? $key['jumlah'] : '' ?> x Rp. <?= (isset($key['harga'])) ? $key['harga'] : '' ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                    <h2>Total <br><span style="font-size: 25px; font-weight:bold;"> Rp.<?= (isset($order[0]['jumlah_pembayaran'])) ? $order[0]['jumlah_pembayaran'] : '' ?><span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>