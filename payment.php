<?php include 'inc/header.php'; ?>
 
 <?php 
  $login =  Session::get("customerLogin");
  if ($login == false) {
  	header("Location:login.php");
  }
 
  ?>
 
<style>

 
</style>
 
<div class="main">
	<div class="content-white">
      <div class="section group"> 
      <div class="payment"> 
      <h2> Choose Payment Option </h2>  
      <a href="paymentatdelivery.php"> Payment At Delivery </a> | 
      <a href="onlinepayment.php"> Online Payment </a>
      </div>
    
      <div class="go-back">
    <a href="cart.php" class="btn btn-dark"> Go Back </a>
     
   </div>
    </div>
 </div>
</div>   
