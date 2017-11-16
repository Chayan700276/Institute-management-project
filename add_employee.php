<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/employee.php'; ?>


<?php
 $em = new EMPLOYEE();

if(isset($_POST['techsubmit']) && $_SERVER['REQUEST_METHOD']=='POST'){

  $emInsert =$em->AddEmployee($_POST,$_FILES);
}
 ?>

<div style="background:#1389D1" class="well text-center">
    <h2 style="color:white">Add Employee!</h2>
<?php 
    if(isset($emInsert)){
      echo $emInsert;
    }

   ?>
  </div>
  

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" enctype="multipart/form-data">
      <div class="table-responsive">
         <table class="table">


          <div class="form-group">
          <label for="exampleInputEmail1">Employee ID</label>
          <td>:</td>
          <input " type="text" name="employee_id" class="form-control" id="" placeholder="Enter ID">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Employee Name</label>
          <td>:</td>
          <input " type="text" name="employee_name" class="form-control" id="" placeholder="Enter Name">
        </div>
                <div class="form-group">
          <label for="exampleInputEmail1">Designation</label>
          <td>:</td>
          <input " type="text" name="designation" class="form-control" id="" placeholder="Enter Designation">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Joining Date</label>
          <td>:</td>
          <input " type="text" name="joining_date" class="form-control" id="" placeholder="Enter joining_date">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Date of Birth</label>
          <td>:</td>
          <input " type="text" name="date_of_birth" class="form-control" id="" placeholder="Enter date_of_birth">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Image</label>
          <td>:</td>
          <input " type="file" name="image" class="form-control" id="" placeholder="Enter Name">
        </div>
        
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="techsubmit">Submit</button></td>
          <td><button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>

         </table>
         </div>

</form>

<a href="employee.php"> <button type="reset" class="btn btn-default">Back</button></a>

    </div>






<?php include 'inc/footer.php'; ?>