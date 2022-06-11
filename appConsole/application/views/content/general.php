<style>
    .wrapper-radio{
        display: inline-flex;
    }
    .wrapper-radio .option{
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        margin: 0 10px;
        border-radius: 5px;
        cursor: pointer;
        padding: 0 10px;
        border: 2px solid lightgrey;
        transition: all 0.3s ease;
    }
    .wrapper-radio .option .dot{
        height: 15px;
        width: 15px;
        background: #d9d9d9;
        border-radius: 50%;
        position: relative;
    }
    .wrapper-radio .option .dot::before{
        position: absolute;
        content: "";
        border-radius: 50%;
        opacity: 0;
        transform: scale(1.5);
        transition: all 0.3s ease;
    }
    input[type="radio"]{
        display: none;
    }
    #radioGanjil:checked:checked ~ .radioGanjil,
    #radioGenap:checked:checked ~ .radioGenap{
        border-color: #1d81be;
        background: #1d81be;
    }
    #radioGanjil:checked:checked ~ .radioGanjil .dot,
    #radioGenap:checked:checked ~ .radioGenap .dot{
        background: url(<?php echo base_url('assets/icons/checkmark.svg');?>);
    }
    #radioGanjil:checked:checked ~ .radioGanjil .dot::before,
    #radioGenap:checked:checked ~ .radioGenap .dot::before{
        opacity: 1;
        transform: scale(1);
    }
    .wrapper-radio .option span{
        font-size: 12px;
        color: #808080;
    }
    #radioGanjil:checked:checked ~ .radioGanjil span,
    #radioGenap:checked:checked ~ .radioGenap span{
        color: #fff;
    }
</style>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= isset($title) ? $title : "-" ?></h3>
            </div>
        </div>
        <!-- <div class="row"> -->
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= isset($title) ? $title : "-" ?></h2>
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
                        <form action="<?= base_url('general/update') ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Logo</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <img id="preview1" name="preview1" class="thumbnail" src="<?= base_url() ?>../assets/images/<?= (isset($logo)) ? $logo : '-' ?>" title="Preview Logo">
                                    <input type="file" name="logo_web" id="logo_web" onchange="tampilkanPreview(this,'preview1')"><br><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Tujuan Rekening</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea id="keterangan" name="tujuan_rekening" id="tujuan_rekening" placeholder="Bank, nomor rekening, & a.n." rows="8">
                                        <?= isset($tujuan_rekening) ? $tujuan_rekening : '' ?>
                                    </textarea>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- /x_content -->
                </div>
            <!-- </div> -->
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