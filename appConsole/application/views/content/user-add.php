<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= isset($title) ? $title : "-" ?></h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php if(isset($detil[0]['id'])) { if($detil[0]['id'] != "" || $detil[0]['id'] != NULL){ echo 'Update'; }} else {echo 'Add'; } ?> </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form action="<?php if(isset($detil[0]['id'])) { if($detil[0]['id'] != "" || $detil[0]['id'] != NULL){ echo (base_url('user/update'));}} else { echo (base_url('user/add')); } ?>" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    
                        <input type="hidden" class="form-control" name="iduser" id="iduser" value="<?= (isset($detil[0]['id'])) ? $detil[0]['id'] : '' ?>">

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="XXX" required value="<?= (isset($detil[0]['nama'])) ? $detil[0]['nama'] : '' ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Email</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="email" class="form-control" name="email" id="email" placeholder="xx@gmail.com" required value="<?= (isset($detil[0]['email'])) ? $detil[0]['email'] : '' ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">No HP</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="08.." required value="<?= (isset($detil[0]['no_hp'])) ? $detil[0]['no_hp'] : '' ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">alamat</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="jl.." required value="<?= (isset($detil[0]['alamat'])) ? $detil[0]['alamat'] : '' ?>">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9">
                                <a class="btn btn-danger" href="<?php echo base_url("user"); ?>">Cancel</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div> <!-- /x_content -->
            </div>
        </div>
    </div>
</div>