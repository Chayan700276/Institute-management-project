<?php 
include 'inc/header.php';

 ?>

	<div class="pannel pannel-defult">
		
	<div class="pannel-heading">
		<h2>
			<a class="btn btn-success" href="add.php">Add Student</a>
			<a class="btn btn-info pull-right" href="index.php">Go Back</a>
		</h2>
	</div>

	 <div class="pannel-body">

	

		
	 <form action="" method="POST">
	 	
	 <div class="form-grup">
	 <label for="name">Student Name</label>
	 <input type="text" class="form-control" name="name" id="name" required="">
	 	
	 </div>

	 <div class="form-grup">
	 <label for="name">Student Roll</label>
	 <input type="text" class="form-control" name="roll" id="roll" required="">
	 	
	 </div>

	 <div class="form-grup">
	 <input type="submit" class="btn btn-primary" name="submit" value="Add Student">
	 	
	 </div>


	 </form>

	  </div>
	</div>


<?php include "inc/footer.php" ?>