<?php include 'inc/header.php'; ?>
 
 <?php 
  $login =  Session::get("customerLogin");
  if ($login == false) {
  	header("Location:login.php");
  }
  ?>
 

 <div class="main">
	<div class="content-white">
      <div class="section group">
      
      <div class="payment"> 
      <h2>Success   </h2>  
      <p> Payment Successful    </p>
      <p> Thanks for Purchase. Receive your order Successfully.</a> </p>
      </div>
    
    </div>
 </div>
</div>
