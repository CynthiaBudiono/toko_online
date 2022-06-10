<!-- <style>
  .navbar-bg{z-index:889;height:70px}
  .navbar-bg{content:" ";position:absolute;top:0;left:0;width:100%;height:115px;background-color:#6777ef;z-index:-1}
</style> -->
<style>
  .nav_menu{
    background-color: #1d81be; 
    /* #82b19b;  */
    /* GreenColor */
    /* background-color: #82b19b;  */
    /* BlueColor */
  }

  #menu_toggle{
    color: #f2f2f2;
  }

  a.user-profile{
    color: #000 !important;
  }
  .btn-action{
    font-size: 12px;
  }

</style>
<!-- top navigation -->
<!-- <div class="navbar-bg"></div> -->
<div class="top_nav">
  <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
        <!-- <span>Periode</span> -->
        <ul class=" navbar-right">
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              <img src="<?= base_url() ?>/assets/images/user.png" alt=""><?= $this->session->userdata('logged_name');?>
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"  href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </div>
          </li>
        </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->