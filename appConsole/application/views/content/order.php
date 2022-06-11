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
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-order" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Actions</th>
                                        <th>ORDER ID</th>
                                        <th>Customer</th>
                                        <th>Pembayaran</th>
                                        <th>Bukti Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody id="data_order">
                                <?php if(isset($order)) : ?>
                                    <?php if(is_array($order)) : ?>
                                        <?php foreach($order as $key) : ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo base_url("order/view/"); echo base64_encode($key['id']);?>" class="btn btn-primary btn-sm btn-action"><i class="fa fa-eye"></i> View </a>
                                                <a href="<?php echo base_url("order/updates/"); echo base64_encode($key['id']);?>" class="btn btn-info btn-sm btn-action"><i class="fa fa-pencil"></i> Edit </a>
                                            </td>
                                            <td><?= (isset($key['id'])) ? $key['id'] : '' ?></td>
                                            <td><?= (isset($key['nama_user'])) ? $key['nama_user'] : '' ?></td>
                                            <td>Rp. <?= (isset($key['jumlah_pembayaran'])) ? $key['jumlah_pembayaran'] : '' ?></td>
                                            <td><img width="80" src="<?= base_url() ?>../assets/images/bukti_pembayaran/<?= (isset($key['bukti_pembayaran'])) ? $key['bukti_pembayaran'] : '' ?>" alt="" /></td>
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