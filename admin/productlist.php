<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include_once '../helper/format.php'; ?>
<?php include '../classes/Product.php'; ?>

<?php
$product = new Product();
$format = new Format();

?>



<?php
//get delete message 
if (isset($_GET['delpro'])) {
	$id = $_GET['delpro'];
	$deleteproduct = $product->deleteProductById($id);
}

if (isset($deleteproduct)) {
	echo  $deleteproduct;
}



?>

<div class="main">
	<div class="main-box ">
		<h2>Post List</h2>
		<div class="box-content">
			<table class=" tabel-list ">
				<thead>
					<tr>
						<th>No.</th>
						<th>Product Name</th>
						<th>Category</th>
						<th>Brand</th>
						<th>Description</th>
						<th>Price</th>
						<th>Image</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$getProduct = $product->getAllProduct();
					if ($getProduct) {
						$i = 0;
						while ($result = $getProduct->fetch_assoc()) {
							$i++;
					?>

							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $format->textShorten($result['productName'], 15); ?></td>
								<td><?php echo $result['catName']; ?></td>
								<td><?php echo $result['brandName']; ?></td>
								<td><?php echo $format->textShorten($result['description'], 30); ?></td>
								<td><?php echo $result['price']; ?></td>
								<td><img src="<?php echo $result['image']; ?>" height="40px; width=" 60px;></td>

								<td><?php

									if ($result['type'] == 0) {
										echo "Featured";
									} else {
										echo "Not featured";
									} ?>
								</td>
								<td><a href="productedit.php?proid=<?php echo $result['productId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete')" href="?delpro=<?php echo $result['productId']; ?>">Delete</a></td>
							</tr>
					<?php  }
					} ?>
				</tbody>
			</table>

		</div>
	</div>
</div>