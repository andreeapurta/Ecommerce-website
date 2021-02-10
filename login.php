<?php include 'inc/header.php';
?>
<!-- <?php
		$login =  Session::get("customerLogin");
		if ($login == true) {
			header("Location:profile.php");
		}

		?> -->



<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

	$customerLogin = $customer->customerLogin($_POST);
}

?>

<style>



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



.container{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
  margin-top:5%;
  margin-bottom:5%;
}


</style>

<div class="main">
	<div class="content-white">
		<div class="container">
		<div class="row">
			<div class="col-6">
				<div class="login_panel">


					<?php
					if (isset($customerLogin)) {
						echo $customerLogin;
					}

					?>

					<h3>Existing Customers</h3>
					<p>Sign in with the form below.</p>

					<form action=" " method="post">
						<input name="email" placeholder="Email" type="text">
						<input name="pass" placeholder="Password" type="password">
						<div class="buttons">
						
							<div><input class="btn btn-dark text-white" type="submit" value="Login" name="login"></input></div>
						</div>
				</div>

				</form>



				<?php

				if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

					$customerRegistration = $customer->registerNewCustomer($_POST);
				}

				?>


				<?php
				if (isset($customerRegistration)) {
					echo $customerRegistration;
				}

				?>
			</div>
			<div class="col-6">
				<div class="register_account">
					<h3>Register New Account</h3>
					<form action=" " method="post">
						<table>
							<tbody>
								<tr>
									<td>
										<div>
											<input type="text" name="name" placeholder="Name" />
										</div>

										<div>
											<input type="text" name="city" placeholder="city" />
										</div>

										<div>
											<input type="text" name="zip" placeholder="Zip" />
										</div>
										<div>
											<input type="text" name="email" placeholder="Email" />
										</div>
									</td>
									<td>
										<div>
											<input type="text" name="address" placeholder="Address" />
										</div>
										<div>
											<input type="text" name="country" placeholder="Country" />
										</div>

										<div>
											<input type="text" name="phone" placeholder="Phone" />
										</div>

										<div>
											<input type="text" name="pass" placeholder="password" />
										</div>
									</td>
								</tr>
							</tbody>
						</table>

						<div class="search">
							<div><input class="btn btn-dark text-white" type="submit" value="Create Account" name="register"></input></div>
						</div>
						<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
					
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>