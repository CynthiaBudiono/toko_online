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
                    <h2>Data</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div>
                    <a class="btn btn-sm bg-green" href="<?php echo base_url("produk/adds"); ?>">Tambah</a>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-user" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Actions</th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Status</th>
                                        <th>Deskripsi Produk</th>
                                    </tr>
                                </thead>
                                <tbody id="data_user">
                                <?php if(isset($produk)) : ?>
                                    <?php if(is_array($produk)) : ?>
                                        <?php foreach($produk as $key) : ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo base_url("produk/updates/"); echo base64_encode($key['id']);?>" class="btn btn-info btn-sm btn-action"><i class="fa fa-pencil"></i> Edit </a>
                                            </td>
                                            <td><?= (isset($key['id'])) ? $key['id'] : '' ?></td>
                                            <td>
                                                <img width="80" src="<?= base_url() ?>../assets/images/produk/<?= (isset($key['foto'])) ? $key['foto'] : '' ?>" alt="" />
                                                <br>
                                                <b><?= (isset($key['nama'])) ? $key['nama'] : '' ?></b>
                                            </td>
                                            <td><?= (isset($key['harga'])) ? $key['harga'] : '' ?></td>
                                            <td><?= (isset($key['stok'])) ? $key['stok'] : '' ?></td>
                                            <td>
                                                <?php 
                                                    if(isset($key['status'])) if($key['status']==1) echo '<span class="badge bg-green">active</span>'; else echo '<span class="badge bg-danger">non active</span>';?>
                                            </td>
                                            <td><?= (isset($key['keterangan'])) ? $key['keterangan'] : '' ?></td>
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
</div>