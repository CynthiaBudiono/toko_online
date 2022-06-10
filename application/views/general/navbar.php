<style>
    /* html, body {
        height: 100%;
    } */
    .btn-solid-border:hover{
        background-color: #d60c3b;
        border-color: #d60c3b;
    }


</style>
<body id="body">
<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container" style="padding-bottom: 0px;">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					<i class="tf-ion-ios-telephone"></i>
					<span>021 - 010101</span>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="index.html">
						<!-- replace logo here -->
						<svg width="250px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
								font-family="AustinBold, Austin" font-weight="bold">
								<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
									<text id="AVIATO">
										<tspan x="108.94" y="325">STORE</tspan>
									</text>
								</g>
							</g>
						</svg>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<ul class="top-menu text-right list-inline">
                    <?php if(!$this->session->userdata('logged_in')) {?>
					<li class="dropdown cart-nav dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="fa fa-cart"></i>Login</a>
						<div class="dropdown-menu cart-dropdown">
                            <form action="<?= base_url('auth') ?>" method="post" id="login_form">
                            <div class="media">
								<div class="media-body">
                                    <h5>Login</h5>
                                    <div class="col-md-12 col-sm-12 m-0 p-0">
                                        <input type="text" class="form-control has-feedback-left" name="username" id="username" placeholder="Username" required="required">
                                    </div>
                                    <div class="col-md-12 col-sm-12 m-0 p-0">
                                        <input type="password" class="form-control has-feedback-left" name="password" id="password" placeholder="Password" required="required">
                                    </div>
                                </div>
							</div>
							<ul class="text-center cart-buttons">
								<li><button type="submit" class="btn btn-lg btn-solid-border">Login</button></li>
							</ul>
                            </form>
						</div>
					</li>
                    <?php } else { ?>
                        <li>Selamat datang, <b><?= $this->session->userdata('username')?></b></li>
                        <li>
                            <a href="<?= base_url('auth/logout') ?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="tf-ion-log-out" aria-hidden="true"></i></a>
                        </li>
                    <?php }?>
				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown">
						<a href="<?= base_url('home') ?>">Home</a>
					</li><!-- / Home -->

                    <!-- Products -->
					<li class="dropdown ">
						<a href="<?= base_url('produk') ?>">Products</a>
					</li><!-- / Products -->

                    <!-- Order -->
					<li class="dropdown ">
						<a href="<?= base_url('order') ?>">Order</a>
					</li><!-- / Order -->

				</ul><!-- / .nav .navbar-nav -->
			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>
