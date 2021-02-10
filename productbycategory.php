<?php include 'inc/header.php'; ?>

<?php
  if (!isset($_GET['catId'])  || $_GET['catId'] == NULL ) {
     echo "<script>window.location = 'pagenotfound.php';  </script>";
  }else {
    $id = $_GET['catId']; // here i get this id and take this with one variable. 
  }
 ?>

<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
			<?php
				$productJustByCategory = $product-> getProductJustByCategory($id); // Create this method in our Product.php Class 
				if ($productJustByCategory) {
					while ($result = $productJustByCategory->fetch_assoc()) {

				?>




	<div class="text-heading-bg">
		<h3 class="text-heading">Latest from <?php echo $result['catName']; ?> </h3>
	</div>
			

					<?php } }?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<div class="section group">

			<div class="container">


<?php

$numOfCols = 4; $rowCount = 0; $bootstrapColWidth = 12 / $numOfCols;
				$productByCategory = $product-> getProductByCategory($id); // Create this method in our Product.php Class 
				if ($productByCategory) {
					while ($result = $productByCategory->fetch_assoc()) {

		

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

		








