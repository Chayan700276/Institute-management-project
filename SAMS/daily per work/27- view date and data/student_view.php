<?php
include 'inc/header.php';
include "lib/Student.php";

 ?>
 <?php
//error_reporting(0);
 $stu=new Student();

 $dt=$_GET['dt'];



if($_SERVER['REQUEST_METHOD']=='POST'){

 	/*$attend=$_POST['attend'];
 	if(empty($attend))
 	{
 		echo "<script>alert('Roll Select Missing')</script>";
     
 	}
 	$updateattend=$stu->insertAttendance($cur_date,$attend);
*/
 }



  ?>
  <?php
if(isset($updateattend)){
	echo $updateattend;
}


   ?>

	<div class="pannel pannel-defult">

	<div class="pannel-heading">
		<h2>
			<a class="btn btn-success" href="add.php">Add Student</a>
			<a class="btn btn-info pull-right" href="date_view.php">Back</a>
		</h2>
	</div>

	 <div class="pannel-body">

	 <div class="wel text-center" style="font-size: 30px">

	 	<strong></strong>Date:<?php  echo  $dt?>

	 </div>
	 <form action="" method="POST">
	 	<table class="table table-striped">
	 		<tr>
	 			<th width="25%">Serial Name</th>
	 			<th width="25%">Student Name</th>
	 			<th width="25%">Student Roll</th>
	 		    <th width="25%">Attendance</th>

	 		</tr>

<?php


     $get_student=$stu->getAllData($dt);
     if($get_student){
     $i=0;
     while ($value=$get_student->fetch_assoc()) {
     $i++;

 ?>

		<tr>
		    <td><?php echo $i++; ?></td>
			<td><?php echo $value['name']; ?> nn</td>
			<td><?php echo $value['roll']; ?>6</td>
			<td>
				<input type="radio" name="attend[<?php echo $value['roll']; ?>]"
				value="present"<?php if($value['attend']=="present"){echo "checked";}?>>P

				|---| A<input type="radio" name="attend[<?php echo $value['roll']; ?>]"
				value="absent"<?php if($value['attend']=="absent"){echo "checked";}?>>

			</td>



	   </tr>


<?php }  } ?>



 


	 	</table>



	 </form>

	  </div>
	</div>


<?php include "inc/footer.php" ?>
