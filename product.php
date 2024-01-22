<?php
include 'header.php';

?>
<?php
include 'connect.php';
$id = $_GET['Laptop_id'];
$sql = "Select * from ldetails WHERE SN='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
	while ($row = mysqli_fetch_array($result)) {
?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<!-- <li><a href="#">All Categories</a></li> -->
							<!-- <li><a href="#">Accessories</a></li> -->
							<!-- <li><a href="#">Headphones</a></li> -->
							<li class="active"><?php echo $row['Laptop_Name']; ?></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
    <div class="container">
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-6">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="./img/<?php echo $row['Image'] ?>" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product details -->
            <div class="col-md-6">
                <div class="product-details">
                    <h1 class="product-name"><?php echo $row['Laptop_Name'] ?></h1>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="product-price">Rs <?php echo $row['Price'] ?> <del class="product-old-price">
                                Rs <?php $a = $row['Price']; $del_price = 1.1 * $a; echo $del_price; ?>
                            </del></h3>
                        <span class="product-available">In Stock</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                    <h4>Key Features:</h4>
                    <div class="table-container">
                        <table class="table table table-striped ">
                            <thead>
                                <tr>
                                    <th scope="col">Category</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
							<tr>
											<th scope="row">Processor</th>
											<td><?php echo $row['Processor'] ?></td>

										</tr>
										<tr>
											<th scope="row">Graphics</th>
											<td><?php echo $row['Graphics'] ?></td>

										</tr>
										<tr>
											<th scope="row">RAM</th>
											<td colspan="2"><?php echo $row['RAM'] ?></td>

										</tr>
										<tr>
											<th scope="row">Storage</th>
											<td><?php echo $row['Storage'] ?></td>

										</tr>
										<tr>
											<th scope="row">Display</th>
											<td><?php echo $row['Display'] ?></td>

										</tr>
										<tr>
											<th scope="row">OS</th>
											<td colspan="2"><?php echo $row['OS'] ?></td>

										</tr>
										<tr>
											<th scope="row">Other Features</th>
											<td colspan="2"><?php echo $row['Other_Features'] ?></td>

										</tr>                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Product details -->
        </div>
    </div>
</div>
<!-- /SECTION -->



		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
<?php
	}
}
?>
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
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
						<ul class="footer-links">
							<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
							<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Categories</h3>
						<ul class="footer-links">
							<li><a href="#">Hot deals</a></li>
							<li><a href="#">Laptops</a></li>
							<li><a href="#">Smartphones</a></li>
							<li><a href="#">Cameras</a></li>
							<li><a href="#">Accessories</a></li>
						</ul>
					</div>
				</div>

				<div class="clearfix visible-xs"></div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Information</h3>
						<ul class="footer-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Orders and Returns</a></li>
							<li><a href="#">Terms & Conditions</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Service</h3>
						<ul class="footer-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">View Cart</a></li>
							<li><a href="#">Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
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

	<!-- bottom footer -->
	<div id="bottom-footer" class="section">
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="footer-payments">
						<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
						<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
					</ul>
					<span class="copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</span>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>

</html>