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
                    <form action="<?php if(isset($detil[0]['id'])) { if($detil[0]['id'] != "" || $detil[0]['id'] != NULL){ echo (base_url('produk/update'));}} else { echo (base_url('produk/add')); } ?>" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    
                        <input type="hidden" class="form-control" name="idproduk" id="idproduk" value="<?= (isset($detil[0]['id'])) ? $detil[0]['id'] : '' ?>">

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Foto Produk</label>
                            <div class="col-md-9 col-sm-9 ">
                                <img id="preview1" name="preview1" class="thumbnail" src="<?= base_url() ?>../assets/images/produk/<?php if(isset($detil[0]['foto'])) { if($detil[0]['foto'] != null){ echo $detil[0]['foto']; } else echo 'produk.png';} else echo 'produk.png'; ?>" title="Preview Logo">
                                <input type="file" name="foto_produk" id="foto_produk" onchange="tampilkanPreview(this,'preview1')"><br><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="ex. Hoodie" required value="<?= (isset($detil[0]['nama'])) ? $detil[0]['nama'] : '' ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Harga (Rp)</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" class="form-control" name="harga" id="harga" placeholder="ex. 100000" required value="<?= (isset($detil[0]['harga'])) ? $detil[0]['harga'] : '' ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Stok</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="number" class="form-control" name="stok" id="stok" placeholder="ex. 10" required value="<?= (isset($detil[0]['stok'])) ? $detil[0]['stok'] : '' ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Status</label>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="">
                                    <label>
                                        <input type="checkbox" class="toggle-switch" name="status" id="status" checked>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Keterangan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="">
                                <textarea id="keterangan" name="keterangan" rows="8">
                                    <?= isset($detil[0]['keterangan']) ? $detil[0]['keterangan'] : '' ?>
                                </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9">
                                <a class="btn btn-danger" href="<?php echo base_url("produk"); ?>">Cancel</a>
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