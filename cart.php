<?php include 'inc/header.php'; ?>
<?php


if (isset($_GET['delPro'])) {
	$deletePorductId = $_GET['delPro'];
	$deleteProduct = $cart->DeleteProductById($deletePorductId);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];

	$updateCart = $cart->updateCartQuantity($cartId, $quantity);
	if ($quantity <= 0) {
		$deleteProduct = $cart->DeleteProductById($cartId);
	}
}



?>


<?php
if (!isset($_GET['id'])) {
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'/> ";
}
?>

<div class="main">
	<div class="content-white">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Your Cart</h2>
				<?php

				if (isset($updateCart)) {
					echo $updateCart;
				}


				if (isset($deleteProduct)) {
					echo $deleteProduct;
				}
				?>
				<table class="table-cart">
					<tr>
						<th width="10%">Image</th>
						<th width="30%">Product Name</th>
						<th width="15%">Unit Price</th>
						<th width="20%">Quantity</th>
						<th width="15%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
					<?php
					$getProduct = $cart->getCartProduct();
					if ($getProduct) {
						$i = 0;
						$sum = 0;

						while ($result = $getProduct->fetch_assoc()) {
							$i++;
					?>
							<tr>
								<td><img src="admin/<?php echo $result['image']; ?>" alt="" width="30px" height="50px" /></td>
								<td><?php echo $result['productName'];  ?></td>

								<td>$ <?php echo $result['price'];  ?></td>
								<td>

									<form action="" method="post">

										<input type="hidden" name="cartId" value="<?php echo $result['cartId'];  ?>" />
										<input type="number" name="quantity" value="<?php echo $result['quantity'];  ?>" />
										<input type="submit" name="submit" value="Update" />
									</form>
								</td>
								<td>$
									<?php

									$total = $result['price'] * $result['quantity'];
									echo $total;


									?>

								</td>
								<td><a onclick="return confirm('Are you sure to Delete');" href="?delPro=<?php echo $result['cartId']; ?>">X</a></td>
							</tr>
							<?php

							$sum = $sum + $total;
							Session::set("sum", $sum);

							?>
					<?php }
					}   ?>
				</table>


				<?php
				$getSum = $cart->CheckCart();
				if ($getSum) {

				?>

					<table style="float:right;text-align:left;" width="40%">
						<tr>
							<th>Sub Total : </th>
							<td>$ <?php echo $sum;  ?></td>
						</tr>
						<tr>
							<th>TVA : </th>
							<td>
								10%
							</td>
						</tr>
						<tr>
							<th>Total Cost :</th>
							<td>$<?php
									$tva = $sum * 0.1;
									$TotalWithTva = $sum + $tva;
									echo $TotalWithTva;
									?> </td>
						</tr>
					</table>

				<?php } else {
					echo "Cart Empty";
					header("Location:index.php");
				} ?>
			</div>
			<div class="container">
			<div class="row">
				<div class="col-6 shopping text-center">
					<a class="btn btn-dark"
						href="index.php">Continue Shopping</a>
				</div>
				<div class="col-6 shopping ">
				<a class="btn btn-dark"  href="payment.php">Checkout</a>
			</div>
			</div>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
</div>
</div>
</div>

