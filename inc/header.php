<?php 
   include 'lib/Session.php'; 
    Session::checkSession();
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
$db=new Database();
$fm=new Format();

 ?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Institute Management</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="inc/js/jquery.min.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function(){
    var roll = true;
    $(':radio').each(function(){
      name = $(this).attr('name');
      if(roll && !$(':radio[name="' + name + '"]:checked').length){
        alert( name + " Roll Missing !");
        roll = false;
      }
    });
    return roll;
  });
});
 </script>





	
</head>
<body>

		<nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top" role="navigation">
			<div class="container-fluid">
			      <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-chayan-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
					<a class="navbar-brand" href="index.php">Institute Management </a>
					
				  </div>
				<div class="collapse navbar-collapse" id="bs-chayan-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Home</a></li>

						
												
						<li role="presentation" class="dropdown">
							    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							      Menu <span class="caret"></span>
							    </a>
							    <ul class="dropdown-menu">
							        <li><a href="#">Contact</a></li>
							        <li><a href="#">Image</a></li>
							        <li><a href="#">News</a>
							        
							    </ul>
						</li>
						<?php 

                            if(isset($_GET['action']) && $_GET['action']=="logout"){
                                Session::destroy();
                            }



                         ?>
						

						<li>
						<a href="index.php">
						Hi - <?php echo Session::get('userName'); ?> 
						& Email:<?php echo Session::get('Email'); ?>
							<?php echo Session::get('adminId'); ?>
						</a></li>
						</li>

						<li><a href="?action=logout"><span class="glyphicon glyphicon-off ff" aria-hidden="true"></span>Logout</a></li>
					</ul>
				</div>
		   </div>
		</nav>
<br/><br/>
<br/>