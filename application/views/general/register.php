<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <h2 class="text-center">Buat Akun</h2>
            <?php if (isset($error_msg)) : ?>
            <div class="x_content bs-example-popovers">
                <div class="alert alert-danger" role="alert">
                <?php { echo $error_msg; } ?>
                </div>
            </div>
            <?php endif; ?>
            <form class="text-left clearfix" action="<?= base_url('auth/signin') ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Nama Lengkap" id="nama" name="nama" value="<?= isset($detil[0]['nama']) ? $detil[0]['nama'] : ''?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Username" id="username" name="username" value="<?= isset($detil[0]['username']) ? $detil[0]['username'] : '' ?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control"  placeholder="Email" id="email" name="email" value="<?= isset($detil[0]['email']) ? $detil[0]['email'] : '' ?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control"  placeholder="Password" id="password" name="password" value="<?= isset($detil[0]['password']) ? $detil[0]['password'] : '' ?>">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-main text-center">Sign In</button>
                </div>
            </form>
            <p class="mt-20">Already hava an account ?<a href="<?= base_url('home') ?>"> Login</a></p>
        </div>
      </div>
    </div>
  </div>
</section>