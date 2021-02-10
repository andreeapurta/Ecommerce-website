<?php include '../classes/AdminLogin.php'; ?>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="bootstrap/js/jquery-331.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<?php
$adminLogin = new AdminLogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$adminUser = $_POST['adminUser'];
	$adminPass = md5($_POST['adminPass']);


	$loginCheck = $adminLogin->adminLogin($adminUser, $adminPass);
}
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>




<body>
	<div class="container">
		<div id="login-row" class="row justify-content-center align-items-center">
			<div id="login-column" class="col-md-6">
				<div id="login-box" class="col-md-12">
					<form action="" method="post">
						<h3 class="text-center text-login-info pt-5">Admin Login</h3>
						<span style="color:red;font-size:18px;">

							<?php

							if (isset($loginCheck)) {
								echo $loginCheck; //for the messages in adminlogin, vezi linia 12
							}
							?>
						</span>
						<div>
							<div class="text-center form-group">
								<label for="text" class="text-login-info">Username:</label><br>
								<input type="text" placeholder="Username" name="adminUser" />
							</div>
						</div>
						<div class=" text-center form-group">
							<label for="password" class="text-login-info">Password:</label><br>
							<input type="password" placeholder="Password" name="adminPass" />
						</div>
						<div class="form-group text-center">
							<input type="submit" value="Log in" class="btn btn-info btn-login-admin btn-md" />
						</div>
					</form>

				</div>
			</div>
</body>

</html>