<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/UserControl.php'; ?>
<?php 

 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['result_dept_seme_shift']))
 {
      $dept             = $_POST['dept'];
      $semester         = $_POST['semester'];
      $shift            = $_POST['shift'];

      if(empty ($dept)|| empty($semester)|| empty($shift)){
        echo "<span class='error'>Field must not be empty...!</span>";
      }else{
    Session::set("dept",$dept); 
    Session::set("semester",$semester); 
    Session::set("shift",$shift); 
  
    echo "<script>window.location='re_subject_select.php'</script>";
    }
  }
?>

<div class="well text-center">
    <h2>Select Box Then Next Result Process Continue-!</h2>

  </div>
  

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="post" class="form-horizontal">
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
          
          <button  type="submit" name="result_dept_seme_shift" class="btn btn-primary">submit</button>

     </form>
    </div>







<?php include 'inc/footer.php'; ?>