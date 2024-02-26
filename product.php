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
										Rs <?php $a = $row['Price'];
											$del_price = 1.1 * $a;
											echo $del_price; ?>
									</del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p>The <?php echo $row['Laptop_Name'] ?> laptop features an <?php echo $row['Processor'] ?> processor, <?php echo $row['RAM'] ?> RAM, and a <?php echo $row['Storage'] ?> storage for efficient multitasking and ample space. Its <?php echo $row['Display'] ?> display, complemented by <?php echo $row['Graphics'] ?> graphics, delivers vibrant visuals. With a 42Wh Li-ion battery, it ensures extended usage on the go, making it a powerful and versatile computing companion.</p>
							<form action="addtocart.php" method="post">
								<input type="hidden" name="Lid" value="<?php echo $row['SN'] ?>">
								<div class="add-to-cart">
									<button class="add-to-cart-btn" type="submit" name="addtocart1"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</div>
							</form>
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

										</tr>
									</tbody>
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
<?php
include 'footer.php';
?>

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<!-- <script src="js/jquery.zoom.min.js"></script> -->
<script src="js/main.js"></script>


</body>

</html>