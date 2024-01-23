<!-- FOOTER -->
<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">About Us</h3>
							<p>Elevate your digital experience with <span style="color: #D10024;"> Laptop Haven </span> Your adventure begins here.</p>
							<ul class="footer-links">
								<li><a href="#"><i class="fa fa-map-marker"></i>Balkumari, Lalitpur</a></li>
								<li><a href="#"><i class="fa fa-phone"></i>+091-123214</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>laptop_haven@email.com</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Categories</h3>
							<ul class="footer-links">
								<li><a href="#top_sell">Top Sell</a></li>
								<li><a href="#laptop">Laptops</a></li>
								<li><a href="#upcoming">Upcoming Laptop</a></li>
								<li><a href="#">Monitor</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
						</div>
					</div>

					<div class="clearfix visible-xs"></div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Information</h3>
							<ul class="footer-links">
								<!-- <li><a href="#">About Us</a></li> -->
								<li><a href="contact_us.php">Contact Us</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<!-- <li><a href="#">Orders and Returns</a></li> -->
								<li><a href="#">Terms & Conditions</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Service</h3>
							<ul class="footer-links">
                                <?php
                                if (isset($_SESSION['status']) && $_SESSION['status'] === 'logged_in') {

                                    echo '<li><a href="profile.php">My Account</a></li>';
                                }
                                else{
                                   echo '<li><a href="login.php">My Account</a></li>';
                                }?>
								<?php
                                if (isset($_SESSION['status']) && $_SESSION['status'] === 'logged_in') {

                                    echo '<li><a href="cart.php">View Cart</a></li>
                                    ';
                                }
                                else{
                                   echo '<li><a href="login.php">My Account</a></li>';
                                }?>
								<li><a href="#">Wishlist</a></li>
								<!-- <li><a href="#">Track My Order</a></li> -->
								<li><a href="#">Help</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->


	</footer>
	<!-- /FOOTER -->
