<section class="user-dashboard page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form class="text-left clearfix" action="<?= base_url('profile/update') ?>" method="POST">
            <div class="form-group block billing-details">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control"  placeholder="Nama Lengkap" id="nama" name="nama" value="<?= isset($detil[0]['nama']) ? $detil[0]['nama'] : ''?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control"  placeholder="Email" id="email" name="email" value="<?= isset($detil[0]['email']) ? $detil[0]['email'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="number" class="form-control"  placeholder="no_hp" id="no_hp" name="no_hp" value="<?= isset($detil[0]['no_hp']) ? $detil[0]['no_hp'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control"  placeholder="alamat" id="alamat" name="alamat" value="<?= isset($detil[0]['alamat']) ? $detil[0]['alamat'] : '' ?>">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-main text-center">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>