<?php include 'inc/header.php'; ?>



<?php


if (!isset($_GET['proid']) || ($_GET['proid'] == NULL)) {
	echo "<script>window.location='pagenotfound.php'</script>";
} else {
	$id = $_GET['proid'];
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$quantity = $_POST['quantity'];
	$addproduct = $cart->AddProductToCart($quantity, $id);
}
?>


<div class="main">
	<div class="content-white">
		<div class="container-fluid">
			<?php

			$getSelectedProduct = $product->getSelectedProduct($id);
			if ($getSelectedProduct) {
				while ($result = $getSelectedProduct->fetch_assoc()) {


			?>

					<div class="row">
						<div class="col-9">
							<div class="container">
								<div class="text-heading-bg" style="  margin-left: 0%; margin-right: 0%;margin-bottom:5%;">
									<h3 class="text-heading">Product Description</h3>
								</div>
								<div class="row">
									<div class="col-6">

										<img src="admin/<?php echo $result['image'];?>" class="image-single-prod" alt="productImage" /></a>

									</div>
									<div class="col-6">
										<h2><?php echo $result['productName']; ?></h2>
										<p><?php echo $format->textShorten($result['description'], 250); ?></p>
										<div class="product-view-info">
											<p>Price: <span><?php echo $result['price']; ?></span></p>
											<p>Category: <span><?php echo $result['catName']; ?></span></p>
											<p>Brand: <span><?php echo $result['brandName']; ?></span></p>
										</div>
										<div class="add-cart">
											<form action="" method="post">
												<input type="number" class="buyfield" name="quantity" value="1" />
												<input type="submit" class="btn btn-outline-success" name="submit" value="Add To Cart" />
											</form>
										</div>


									</div>
								</div>

								<col class="row">
								<div class="product-view-desc">
									<h2>Product Details</h2>
									<p><?php echo $result['description']; ?></p>
								</div>




							</div>

					<?php }
			}			 ?>





						</div>
						<div class="col-3">
							<h2>CATEGORIES</h2>
							<ul>
								<?php
								$getCategory = $category->getAllCategories();
								if ($getCategory) {
									while ($result = $getCategory->fetch_assoc()) {
								?>

										<li><a href="productbycategory.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>


								<?php }
								} ?>
							</ul>

						</div>
					</div>





		</div>
	</div>



</div>


