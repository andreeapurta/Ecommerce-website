<?php include 'inc/header.php'; ?>
 
 <?php 
  $login =  Session::get("customerId");
  if ($login == false) {
  	header("Location:login.php");
  }

  ?>

<?php 
    $customerId =  Session::get("customerId");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
              
        $updatecustomer = $customer->customerUpdate($_POST, $customerId);
    }

?>




<style>
 .tblone{width: 550px; margin: 0 auto; border: 2px solid black; } 
 .tblone tr td{text-align: justify;} 
 .tblone input[type="text"]{width:400px; padding: 5px; font-size: 15px; }






input[type=text], select, textarea,input[type=password] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: black;
  color: white;
  padding: 12px 20px;
  border: none;

}





</style>




<div class="main">
	<div class="content-white">
      <div class="section group ">
 
  <?php 
   $id = Session::get('customerId');
   $getdata = $customer->getCustomerData($id);
   if ($getdata) {
     while ($result = $getdata->fetch_assoc()) {
        
  ?>

   <form action=" "  method="post">   
    <table class="tblone">

 <?php 
  if (isset($updatecustomer)) {
    echo "<tr> <td colspan='2'>".$updatecustomer."</td> </tr>";
  }  ?>

 

       <tr>
          
          <td colspan="2"> <h2>  Update Profile Details </h2> </td>
           
      </tr>

      <tr>
          <td width="20%"> Name  </td>
          
          <td> <input type="text" name="name" value="<?php echo $result['name']; ?>">  </td>
      </tr>
        <tr>
          <td> Phone  </td>
          
          <td> <input type="text" name="phone" value="<?php echo $result['phone']; ?>">  </td>
      </tr>

        <tr>
          <td> Email  </td>
           
          <td> <input type="text" name="email" value="<?php echo $result['email']; ?>">   </td>
      </tr>
        <tr>
          <td> Address  </td>
           
          <td><input type="text" name="address" value="<?php echo $result['address']; ?>">  </td>
      </tr>
        <tr>
          <td> City  </td>
          
          <td><input type="text" name="city" value="<?php echo $result['city']; ?>">   </td>
      </tr>
        <tr>
          <td> Zipcode  </td>
           
          <td> <input type="text" name="zip" value="<?php echo $result['zip']; ?>">  </td>
      </tr>
        <tr>
          <td> Country  </td>
           
          <td> <input type="text" name="country" value="<?php echo $result['country']; ?>">  </td>
      </tr>


  <tr>
          <td>   </td>
           
          <td><input type="submit" name="submit" value="Save Profile"> </td>
      </tr>

       
    </table>
   </form>

  <?php   } }  ?> 

    </div>
 </div>
</div>
   
  