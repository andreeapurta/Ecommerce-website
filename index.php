<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>



<div class="container-fluid main">
	<div class="text-heading-bg">
		<h3 class="text-heading">Feature Products</h3>
	</div>

	<div class="product-grid">
		<div class="row">
			<?php

			$getFtrProduct = $product->getFeaturedProduct();
			if ($getFtrProduct) {
				while ($result = $getFtrProduct->fetch_assoc()) {

			?>

					<div class="col-sm-3">
						<figure class="card card-product">
							<div class="img-product"><img src="admin/<?php echo $result['image']; ?>" alt="product" /></a></div>
							<figcaption class="info-text-product">
								<h4 class="title"><?php echo $result['productName']; ?></h4>
								<p class="desc"><?php echo $format->textShorten($result['description'], 50); ?></p>
							</figcaption>
							<div class="bottom-info">
								<a href="productview.php?proid=<?php echo $result['productId']; ?>" class="btn btn-sm ">Order Now</a>
								<div>
									<span>$<?php echo $result['price']; ?></span>
								</div>
							</div>
						</figure>
					</div>


			<?php }
			} ?>
		</div>

	</div>



	<div class="text-heading-bg">
		<h3 class="text-heading">New Products</h3>
	</div>

	<div class="product-grid">
		<div class="row">
			<?php

			$getNewProduct = $product->getNewProduct();
			if ($getNewProduct) {
				while ($result = $getNewProduct->fetch_assoc()) {

			?>
					<div class="col-sm-3">
						<figure class="card card-product">
							<div class="img-product"><img src="admin/<?php echo $result['image']; ?>" alt="product" /></a></div>
							<figcaption class="info-text-product">
								<h4 class="title"><?php echo $result['productName']; ?></h4>
								<p class="desc"><?php echo $format->textShorten($result['description'], 50); ?></p>
							</figcaption>
							<div class="bottom-info">
								<a href="productview.php?proid=<?php echo $result['productId']; ?>" class="btn btn-sm ">Order Now</a>
								<div>
									<span>$<?php echo $result['price']; ?></span>
								</div>
							</div>
						</figure>
					</div>


			<?php }
			} ?>
		</div>

	</div>

</div>




