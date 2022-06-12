<footer class="footer section text-center p-0" style="padding: 0 0;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="social-media">
					<li>
						<a href="#">
							<i class="tf-ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="tf-ion-social-instagram"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="tf-ion-social-twitter"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="tf-ion-social-pinterest"></i>
						</a>
					</li>
				</ul>
				<ul class="footer-menu text-uppercase">
					<li>
						<a href="contact.html">HOME</a>
					</li>
				</ul>
				<p class="copyright-text">Copyright &copy;2022</p>
			</div>
		</div>
	</div>
</footer>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="<?= base_url() ?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="<?= base_url() ?>assets/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="<?= base_url() ?>assets/vendors/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="<?= base_url() ?>assets/vendors/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="<?= base_url() ?>assets/vendors/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="<?= base_url() ?>assets/vendors/slick/slick.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/slick/slick-animation.min.js"></script>

    <!-- Main Js File -->
    <script src="<?= base_url() ?>assets/js/script.js"></script>
    

  </body>
  </html>

  <script>
    var baseurl = "<?php echo base_url(); ?>";

	function addquickcart($id){
		$.post(baseurl + "order/cart", {
			id: $id,
			jumlah: 1,
		},
		function(result) {
			
			$("#success-alert").css('display', 'block')
			$("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
				$("#success-alert").slideUp(500);
			});
		});
	}
</script>

<?php if ($this->session->flashdata('msg')) : ?>

<div style="margin-top:100px;" class="modal" tabindex="-1" role="dialog" id="infomsg">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #d60c3b;">
        <h4 class="modal-title" id="myModalLabel2" style="color: white; display:inline-block;">Notification</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <?= $this->session->flashdata('msg') ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  $('#infomsg').modal('show');
</script>

<?php endif; ?>