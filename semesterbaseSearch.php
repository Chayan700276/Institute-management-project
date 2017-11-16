<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/stu_Registration.php'; ?>

<?php 
    $reg = new Student();
   
 ?>

<div class="header">
  <center><h1>Student Form</h1>
</div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="POST" class="form-horizontal"
       enctype="multipart/form-data">

   
        <div class="form-group">
          <label for="exampleInputEmail1">Deparment:</label>
            <select name="dept" class="form-control">
              <option value="">---Select Department---</option>
              <option value="computer">Computer</option>
              <option value="aidt">AIDT</option>
              <option value="food">FOOD</option>
              <option value="rac">RAC</option>
              <option value="mecha">MECHA</option>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Semester:</label>
            <select name="semester" class="form-control">
              <option value="">---Select Semester---</option>
              <option value="first">First</option>
              <option value="second">Second</option>
              <option value="third">Third</option>
              <option value="fourth">Fourth</option>
              <option value="fifth">Fifth</option>
              <option value="sixth">Sixth</option>
              <option value="seventh">Seventh</option>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Shift:</label>
            <select name="shift" class="form-control">
              <option value="">---Select Shift---</option>
              <option value="first">First</option>
              <option value="second">Second</option>
            </select>
        </div>
       
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="semesterSearch">Submit</button></td>
          <td><button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>

</form>
    </div>

<?php 
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['semesterSearch'])){
      $dept             = mysqli_real_escape_string($db->link, $_POST['dept']);
      $semester         = mysqli_real_escape_string($db->link, $_POST['semester']);
      $shift            = mysqli_real_escape_string($db->link, $_POST['shift']);
      if(empty ($dept)|| empty($semester)|| empty($shift)){
        echo "field must not be empty...!";
      }else{
    Session::set("dept",$dept); 
    Session::set("semester",$semester); 
    Session::set("shift",$shift); 
    echo "<script>window.location='studentList.php'</script>";
    }
  }
    ?>
<?php include 'inc/footer.php'; ?>