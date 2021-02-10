<?php include 'inc/header.php'; ?>
<!DOCTYPE html>
<html>
<head>

<!-- The width=device-width part sets the width of the page to follow the screen-width of the device (which will vary depending on the device).

The initial-scale=1.0 part sets the initial zoom level when the page is first loaded by the browser. -->


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>



input[type=text], select, textarea {
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



.container{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}


</style>
</head>
<body>



<?php

$contact = new Contact();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
   
    $contactInserted = $contact->contactInsert($_POST); 
}
?>




<div class="text-heading-bg">
		<h3 class="text-heading">Contact Us</h3>
	</div>

<div class="container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>Swing by for a sweet treat, or leave us a message:</p>
  </div>
  <div class="row">
    <div class="col-6">
      <img  src="https://images.unsplash.com/photo-1499159058454-75067059248a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80" style="width:100%">
    </div>
    <div class="col-6">
      <form action="" method="post">
        <label for="fname">Name</label>
        <input type="text" id="fname" name="name" placeholder="Your name..">
		<label for="fname">Email</label><br>
        <input type="text" id="email" name="email" placeholder="Your email.."> 
      
        <label for="subject">Subject</label>
        <textarea id="subject" name="description" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>
  </div>
</div>

</body>
</html>

