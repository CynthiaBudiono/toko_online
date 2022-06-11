<style>
    p{
        margin-bottom: 0px;
    }
</style>
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
                                <table id="datatable-user" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Actions</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Informasi</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody id="data_user">
                                <?php if(isset($user)) : ?>
                                    <?php if(is_array($user)) : ?>
                                        <?php foreach($user as $key) : ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo base_url("user/updates/"); echo base64_encode($key['id']);?>" class="btn btn-info btn-sm btn-action"><i class="fa fa-pencil"></i> Edit </a>
                                            </td>
                                            <td><?= (isset($key['username'])) ? $key['username'] : '' ?></td>
                                            <td><?= (isset($key['nama'])) ? $key['nama'] : '' ?></td>
                                            <td>
                                                <p><b>Email : </b><?php if(isset($key['email'])) { if($key['email'] != null) echo $key['email']; else echo '-';}?></p>
                                                <p><b>HP : </b><?php if(isset($key['no_hp'])) { if($key['no_hp'] != null) echo $key['no_hp']; else echo '-';}?></p>
                                                <p><b>Alamat : </b><?php if(isset($key['alamat'])) { if($key['alamat'] != null) echo $key['alamat']; else echo '-';}?></p>
                                            </td>
                                            <td><?= (isset($key['created'])) ? $key['created'] : '' ?></td>
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