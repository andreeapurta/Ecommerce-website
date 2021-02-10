<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
 
<?php
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Cart.php');
?>
 
 <div class="main">
            <div class="main-box ">
		<h2>Orders List</h2>
		<div class="box-content">    
        <table class=" tabel-list ">
	 <thead>
      <tr>
	 <th>ID</th>
	 <th>Product Name</th>
	 <th>quantity</th>
     <th>Price</th>
     <th>Date</th>

		 </tr>
		 </thead>
		 <tbody>
 <?php
	 $cart = new Cart();  
	 $format = new Format(); 
	 $getOrder = $cart->GetOrders();
	 if ($getOrder) {
        $index=0;
    while ($result = $getOrder->fetch_assoc()) {
		$index++;				 
	 ?>
 
	 <tr>
	 <td><?php echo $index; ?></td>
	 <td><?php echo $result['productName']; ?></td>
	 <td><?php echo $result['quantity']; ?></td>
     <td><?php echo $result['price']; ?></td>
     <td><?php echo  $format->formatDate($result['orderDate']);?></td>  
						  
		  <?php } }  ?> 
		 </tbody>
	 </table>
               </div>
            </div>
        </div>

