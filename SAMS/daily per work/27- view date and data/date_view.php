<?php
include 'inc/header.php';
include "lib/Student.php";

 ?>


	<div class="pannel pannel-defult">

	<div class="pannel-heading">
		<h2>
			<a class="btn btn-success" href="add.php">Add Student</a>
			<a class="btn btn-info pull-right" href="index.php">Take Attendance</a>
		</h2>
	</div>

	 <div class="pannel-body">
	 <form action="" method="POST">
	 	<table class="table table-striped">
	 		<tr>
	 			<th width="30%">Serial Name</th>
	 			<th width="50%">Attendance Date</th>
	 			<th width="20%">Action</th>
	 		   

	 		</tr>

<?php
 $stu=new Student();

     $get_date=$stu->getDatelist();
     if($get_date){
     $i=0;
     while ($value=$get_date->fetch_assoc()) {
     $i++;

 ?>

		<tr>
		    <td><?php echo $i++; ?></td>
			<td><?php echo $value['att_time']; ?> </td>
		
			<td>
				<a class="btn btn-primary" href="student_view.php?dt=<?php echo $value['att_time']; ?>">View</a>

			</td>



	   </tr>


<?php }  } ?>



 


	 	</table>



	 </form>

	  </div>
	</div>


<?php include "inc/footer.php" ?>
