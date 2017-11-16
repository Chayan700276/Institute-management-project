<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Library.php'; ?>

<?php 
error_reporting(0);
if(isset($_GET['bookid'])){
  $bookid=$_GET['bookid'];

 $query="SELECT * FROM tbl_library WHERE id='$bookid'";
 $bookid_data  =$db->select($query)->fetch_assoc();
 $b_name       =$bookid_data['b_name'];
 $w_name       =$bookid_data['w_name'];
 $price        =$bookid_data['price'];


}
 ?>

<?php 
 $query="SELECT * FROM tbl_subject";
 $sub_role=$db->select($query)->fetch_assoc();
 $sub_role=$sub_role['sub_role'];

 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['lib_d_s_s'])){
      $dept             = $_POST['dept'];
      $semester         = $_POST['semester'];
      $shift            = $_POST['shift'];
      if(empty ($dept)|| empty($semester)|| empty($shift)){
        echo "field must not be empty...!";
      }else{
    Session::set("dept",$dept); 
    Session::set("semester",$semester); 
    Session::set("shift",$shift); 
    //set for book single id
    Session::set("bo_name",$b_name); 
    Session::set("wr_name",$w_name); 
    Session::set("b_price",$price); 
   
    echo "<script>window.location='lib_roll_list.php'</script>";
    }
  }
?>



<div class="well text-center">
    <h2>First Time You Select Combo Box Then Continue-!</h2>

  </div>
  
 <h2>
    <a class="btn btn-info pull-left " href="booklist.php">Back</a>
  </h2>
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
              <option value="first">First </option>
              <option value="second">Second</option>
              
            </select>
          </div>
          
          <button  type="submit" name="lib_d_s_s" class="btn btn-primary">submit</button>

     </form>
    </div>







<?php include 'inc/footer.php'; ?>