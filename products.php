<?php include 'inc/header.php'; ?>









<div class="main">
	<div class="content">
	<div class="text-heading-bg">
		<h3 class="text-heading"> Our Products</h3>
	</div>

		<div class="container">


			<?php

	  $numOfCols = 4; $rowCount = 0; $bootstrapColWidth = 12 / $numOfCols;
	  $getFtrProduct = $product->getAllProducts();
	  if ($getFtrProduct) {
		  while ($result = $getFtrProduct->fetch_assoc()) {
		  
		 if($rowCount % $numOfCols == 0) { ?>
		  <div class="row"> 
			  <?php } $rowCount++; ?> 
			  <div class="col-md-<?php echo $bootstrapColWidth; ?>">
			 
			

						<figure class="card card-product">
							<div class="img-product"><a href="preview.html?proid=<?php echo $result['productId'];?>">
							<img src="admin/<?php echo $result['image']; ?>" alt="product" /></a></div>
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
			<?php
    if($rowCount % $numOfCols == 0) { ?> </div> <?php } } ?>
		
			</div> <?php }  ?> 

					
			
		</div>

