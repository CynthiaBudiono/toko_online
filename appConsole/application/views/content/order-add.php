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
                    <form action="<?php if(isset($detil[0]['id'])) { if($detil[0]['id'] != "" || $detil[0]['id'] != NULL){ echo (base_url('order/update'));}} else { echo (base_url('order/add')); } ?>" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    
                        <input type="hidden" class="form-control" name="idorder" id="idorder" value="<?= (isset($detil[0]['id'])) ? $detil[0]['id'] : '' ?>">

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Bukti Pembayaran</label>
                            <div class="col-md-9 col-sm-9 ">
                                <img id="preview1" name="preview1" class="thumbnail" src="<?= base_url() ?>../assets/images/bukti_pembayaran/<?php if(isset($detil[0]['bukti_pembayaran'])) { if($detil[0]['bukti_pembayaran'] != null){ echo $detil[0]['bukti_pembayaran']; } else echo 'pay.png';} else echo 'pay.png'; ?>" title="Preview Logo">
                                <input type="file" name="foto_bukti_pembayaran" id="foto_bukti_pembayaran" onchange="tampilkanPreview(this,'preview1')"><br><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Penerima</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="nama_pemesanan" id="nama_pemesanan" placeholder="xxx" required value="<?= (isset($detil[0]['nama_pemesanan'])) ? $detil[0]['nama_pemesanan'] : '' ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Alamat Pengiriman</label>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="">
                                <textarea id="alamat_pengiriman" name="alamat_pengiriman" rows="8">
                                    <?= isset($detil[0]['alamat_pengiriman']) ? $detil[0]['alamat_pengiriman'] : '' ?>
                                </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9">
                                <a class="btn btn-danger" href="<?php echo base_url("order"); ?>">Cancel</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div> <!-- /x_content -->
            </div>
        </div>
    </div>
</div>

<script>
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