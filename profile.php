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
 
  <?php 
   $id = Session::get('customerId');
   $getdata = $customer->getCustomerData($id);
   if ($getdata) {
     while ($result = $getdata->fetch_assoc()) {
        
  ?>


    <table class="table-profile">

       <tr>
          
          <td colspan="3"> <h2>  Your Profile Details </h2> </td>
           
      </tr>

      <tr>
          <td width="20%"> Name  </td>
          <td width="5%"> : </td>
          <td> <?php echo $result['name']; ?>  </td>
      </tr>
        <tr>
          <td> Phone  </td>
          <td> : </td>
          <td> <?php echo $result['phone']; ?> </td>
      </tr>

        <tr>
          <td> Email  </td>
          <td> : </td>
          <td> <?php echo $result['email']; ?>  </td>
      </tr>
        <tr>
          <td> Address  </td>
          <td> : </td>
          <td> <?php echo $result['address']; ?>  </td>
      </tr>
        <tr>
          <td> City  </td>
          <td> : </td>
          <td><?php echo $result['city']; ?>  </td>
      </tr>
        <tr>
          <td> Zipcode  </td>
          <td> : </td>
          <td> <?php echo $result['zip']; ?>  </td>
      </tr>
        <tr>
          <td> Country  </td>
          <td> : </td>
          <td> <?php echo $result['country']; ?>  </td>
      </tr>


  <tr>
          <td>   </td>
          <td>  </td>
          <td><a href="edituserprofile.php"> Update Details </a> </td>
      </tr>

       
    </table>


  <?php   } }  ?> 

    </div>
 </div>
</div>
   
