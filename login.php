<?php 

include 'classes/Adminlogin.php';
?>

<?php

 $ad = new Adminlogin();
if(isset($_POST['sub_login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$logindata=$ad->AdminLoginData($email,$password);
}



 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>IMS Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>You Must Login First</h1>
			<span style="color:red;font-size:18px">
				<?php if(isset($logindata)){

					echo $logindata;
					} ?>

			</span>
			<div>
				<input type="text" placeholder="E-mail" name="email"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="password"/>
			</div>
			<div>
				<input type="submit" name="sub_login" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Digital Bangladesh</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>