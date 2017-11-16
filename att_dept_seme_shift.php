<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/UserControl.php'; ?>


<?php 
 $query="SELECT * FROM tbl_subject";
 $sub_result=$db->select($query)->fetch_assoc();

 $dept=$sub_result['dept'];
 $semester=$sub_result['semester'];

 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['att_dept_seme_shift'])){
      $dept             = $_POST['dept'];
      $semester         = $_POST['semester'];
      $shift            = $_POST['shift'];
      if(empty ($dept)|| empty($semester)|| empty($shift)){
        echo "field must not be empty...!";
      }else{
    Session::set("dept",$dept); 
    Session::set("semester",$semester); 
    Session::set("shift",$shift); 
    Session::set("set_dept",$dept);
    Session::set("set_semester",$semester);

    echo "<script>window.location='com_subject_select.php'</script>";
    }
  }
?>



<div class="well text-center">
    <h2>First Time You Select Combo Box Then Continue-!</h2>

  </div>
  

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="post" class="form-horizontal">
       <div class="form-group">
            <label for="exampleInputEmail1">Deparment:</label>
            <select name="dept" class="form-control">
              <option value="">---Select Department---</option>
              <option value="computer">Computer-7,6,5</option>
              <option value="aidt">AIDT-7</option>
              <option value="food">FOOD-4</option>
              <option value="rac">RAC-6</option>
              <option value="mecha">MECHA</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Semester:</label>
            <select name="semester" class="form-control">
              <option value="">---Select Semester---</option>
              <option value="first">First</option>
              <option value="second">Second</option>
              <option value="third">Third</option>
              <option value="four">Four</option>
              <option value="five">Five</option>
              <option value="six">Six</option>
              <option value="seventh">Seventh</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Shift:</label>
            <select name="shift" class="form-control">
              <option value="">---Select Shift---</option>
              <option value="first">First</option>
              <option value="second">Second</option>
              
            </select>
          </div>
          
          <button  type="submit" name="att_dept_seme_shift" class="btn btn-primary">submit</button>

     </form>
    </div>







<?php include 'inc/footer.php'; ?>