<?php
include 'header.php';
?>


<!-- NAVIGATION -->
<nav id="navigation">
	<!-- container -->
	<div class="container">
		<!-- responsive-nav -->
		<div id="responsive-nav">
			<!-- NAV -->
			<ul class="main-nav nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Apple Prodcuts</a></li>
				<li><a href="#">Desktop</a></li>
				<li><a href="#">Monitors</a></li>

				<li><a href="#">PC Builder</a></li>
				<li><a href="#">Accessories</a></li>
			</ul>
			<!-- /NAV -->
		</div>
		<!-- /responsive-nav -->
	</div>
	<!-- /container -->
</nav>
<!-- /NAVIGATION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/shop01.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Upcoming <br>Laptop</h3>
						<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/shop03.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Accessories<br>Collection</h3>
						<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/shop02.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Cameras<br>Collection</h3>
						<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section" id="laptop">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">New Products</h3>

				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->

			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active ">
							<div class="products-slick" data-nav="#slick-nav-1">
								<?php
								include 'connect.php';
								$sql = "Select * from ldetails";
								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) {

									while ($row = mysqli_fetch_array($result)) {
								?>
										<div class="product d-flex flex-column flex-fill" onclick="redirectToProductPage('<?php echo $row['SN']; ?>')">

											<div class="product-img ">
												<img src="./img/<?php echo $row['Image'] ?>" alt="Laptop Image">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body ">
												<h2 class="product-name"><a href="#"><?php echo $row['Laptop_Name'] ?></a></h2>
												<div style="height: 50px;">
													<span class="product-category text-wrap"><?php echo $row['Processor'] ?> || <?php echo $row['Graphics'] ?> || <?php echo $row['RAM'] ?></span>
													<span class="product-category text-wrap"><?php echo $row['Storage'] ?> || <?php echo $row['Display'] ?> || <?php echo $row['OS'] ?>||</span><br>
													<span class="product-category text-wrap"><?php echo $row['Other_Features'] ?> </span><br>
												</div><br><br>
												<h3 class="product-price">Rs. <?php echo $row['Price'] ?><del class="product-old-price">
														Rs <?php
															$a = $row['Price'];
															$del_price = 1.1 * $a;
															echo $del_price;
															?>
													</del></h3>
												</h3>
												<div class="product-rating">
													<!-- <i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i> -->
												</div>
												<div class="product-btns d-flex">
													<!-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button> -->
													<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
													<button class="quick-view"><a href="product.php?Laptop_id=<?php echo $row['SN'] ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<!-- Example of how you might generate this button within a loop -->
											<form action="addtocart.php" method="post">
												<input type="hidden" name="Lid" value="<?php echo $row['SN'] ?>" >
												
												<div class="add-to-cart">
													<button class="add-to-cart-btn" type="submit" name="addtocart"></i> add to cart</button>
												</div>
											</form>
										</div>
								<?php

									}
								}
								?>

							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->


<!-- SECTION -->
<div class="section" id="top_sell">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Top selling Laptop</h4>
					<div class="section-nav">
						<div id="slick-nav-3" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick overflow-auto" data-nav="#slick-nav-3">

					<?php
					include 'connect.php';
					$sql = "SELECT * FROM ldetails where Top='top'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						$counter = 0;
						while ($row = mysqli_fetch_array($result)) {
							if ($counter % 3 == 0) {
								echo '<div>';
							}
					?>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/<?php echo $row['Image'] ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#"><?php echo $row['Laptop_Name'] ?></a></h3>
									<h4 class="product-price">Rs <?php echo $row['Price'] ?> </h4>
								</div>
							</div>

					<?php
							if ($counter % 3 == 2) {
								echo '</div>';
							}
							$counter++;
						}
						if ($counter % 3 != 0) {
							echo '</div>';
						}
					}
					?>
				</div>
				<!-- </div> -->
			</div>

			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Top selling Laptop</h4>
					<div class="section-nav">
						<div id="slick-nav-3" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick overflow-auto" data-nav="#slick-nav-3">

					<?php
					include 'connect.php';
					$sql = "SELECT * FROM ldetails where Top='top'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						$counter = 0;
						while ($row = mysqli_fetch_array($result)) {
							if ($counter % 3 == 0) {
								echo '<div>';
							}
					?>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/<?php echo $row['Image'] ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#"><?php echo $row['Laptop_Name'] ?></a></h3>
									<h4 class="product-price">Rs <?php echo $row['Price'] ?> </h4>
								</div>
							</div>

					<?php
							if ($counter % 3 == 2) {
								echo '</div>';
							}
							$counter++;
						}
						if ($counter % 3 != 0) {
							echo '</div>';
						}
					}
					?>
				</div>
				<!-- </div> -->
			</div>

			<div class="clearfix visible-sm visible-xs"></div>

			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Top selling Laptop</h4>
					<div class="section-nav">
						<div id="slick-nav-3" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick overflow-auto" data-nav="#slick-nav-3">

					<?php
					include 'connect.php';
					$sql = "SELECT * FROM ldetails where Top='top'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						$counter = 0;
						while ($row = mysqli_fetch_array($result)) {
							if ($counter % 3 == 0) {
								echo '<div>';
							}
					?>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/<?php echo $row['Image'] ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#"><?php echo $row['Laptop_Name'] ?></a></h3>
									<h4 class="product-price">Rs <?php echo $row['Price'] ?> </h4>
								</div>
							</div>

					<?php
							if ($counter % 3 == 2) {
								echo '</div>';
							}
							$counter++;
						}
						if ($counter % 3 != 0) {
							echo '</div>';
						}
					}
					?>
				</div>
				<!-- </div> -->
			</div>


		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
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
include 'footer.php';
?>

<script>
	function redirectToProductPage(id) {
		window.location.href = "product.php?Laptop_id=" + id;
	}
</script>


<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
      <script>

<?php if (isset($_SESSION['cart_status'])){ ?>
          alertify.set('notifier','delay', 2);
        alertify.set('notifier','position', 'top-right');
        alertify.success('<?php echo $_SESSION['cart_status'] ?>');
        <?php 
        
        
        unset($_SESSION['cart_status']);
        } 
        ?>

<?php if (isset($_SESSION['cart_status'])){ ?>
          alertify.set('notifier','delay', 2);
        alertify.set('notifier','position', 'top-right');
        alertify.error('<?php echo $_SESSION['cart_status'] ?>');
        <?php 
        unset($_SESSION['cart_status']);
        } 
        ?>
        
	  </script>

</body>

</html>