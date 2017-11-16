<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/teacher.php'; ?>


<?php
 $tech = new Teacher();

if(isset($_POST['techsubmit']) && $_SERVER['REQUEST_METHOD']=='POST'){

  $teachInsert =$tech->AddTeacher($_POST,$_FILES);
}
 ?>

<div style="background:#1E3C1E" class="well text-center">
    <h2 style="color:white">Add Teacher!</h2>
<?php 
    if(isset($teachInsert)){
      echo $teachInsert;
    }

   ?>
  </div>
  

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" enctype="multipart/form-data">
      <div class="table-responsive">
         <table class="table">

        <div class="form-group">
          <label for="exampleInputEmail1">Teachrer Name</label>
          <td>:</td>
          <input " type="text" name="teacher_name" class="form-control" id="" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Department</label>
            <select name="department" class="form-control">
              <option value="">---Select Departments---</option>
              <option value="computer">Computer</option>
              <option value="food">Food</option>
              <option value="aidt">AIDT</option>
              <option value="rac">RAC</option>
              <option value="mechatronics">Mechatronics</option>
               <option value="non-department">Non-Departmental</option>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Teacher ID</label>
          <td>:</td>
          <input " type="text" name="teacher_id" class="form-control" id="" placeholder="Enter ID">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Joining Date</label>
          <td>:</td>
          <input " type="text" name="joining_date" class="form-control" id="" placeholder="Enter joining_date">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Designation</label>
          <td>:</td>
          <input " type="text" name="designation" class="form-control" id="" placeholder="Enter designation">
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

<a href="teacher.php"> <button type="reset" class="btn btn-default">Back</button></a>

    </div>






<?php include 'inc/footer.php'; ?>