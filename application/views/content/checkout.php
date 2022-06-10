<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <div class="block billing-details">
                  <h4 class="widget-title">Billing Details</h4>
                  <form class="checkout-form">
                     <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" id="full_name" placeholder="">
                     </div>
                     <div class="form-group">
                        <label for="user_address">Address</label>
                        <input type="text" class="form-control" id="user_address" placeholder="">
                     </div>
                     <div class="checkout-country-code clearfix">
                        <div class="form-group">
                           <label for="user_post_code">Zip Code</label>
                           <input type="text" class="form-control" id="user_post_code" name="zipcode" value="">
                        </div>
                        <div class="form-group" >
                           <label for="user_city">City</label>
                           <input type="text" class="form-control" id="user_city" name="city" value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="user_country">Country</label>
                        <input type="text" class="form-control" id="user_country" placeholder="">
                     </div>
                  </form>
               </div>
               <div class="block">
                  <h4 class="widget-title">Tujuan Rekening</h4>
                  <p><?= (isset($tujuan_rekening)) ? $tujuan_rekening : '' ?></p>
                  <div class="checkout-product-details">
                     <div class="payment">
                        <div class="card-details">
                           <form  class="checkout-form">
                              <a href="<?= base_url("order/detils/") ?>" class="btn btn-main mt-20">Place Order</a >
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="product-checkout-details">

                    <div class="block">
                        <h4 class="widget-title">Order Summary</h4>
                        <div class="media product-card">
                            <a class="pull-left" href="product-single.html">
                            <img class="media-object" src="images/shop/cart/cart-1.jpg" alt="Image" />
                            </a>
                            <div class="media-body">
                            <h4 class="media-heading"><a href="product-single.html">Ambassador Heritage 1921</a></h4>
                            <p class="price">1 x $249</p>
                            <span class="remove" >Remove</span>
                        </div>
                    </div>
                    <div class="summary-total">
                        <span>Total</span>
                        <span>$250</span>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>