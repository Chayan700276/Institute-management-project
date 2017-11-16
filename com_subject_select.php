<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Subject_select.php'; ?>
<?php
  $sb = new Subject_select();
?>
<?php 
   $dept           = Session::get("dept"); 
   $semester       = Session::get("semester"); 
   $shift          = Session::get("shift"); 
   $get_dept       = Session::get("set_dept");
   $get_semester   = Session::get("set_semester");
 ?>
<?php 
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['sub_select'])){
      $subject   = $_POST['subject'];

      if(empty ($subject)){
        echo "field must not be empty...!";
      }else{
    Session::set("dept",$dept); 
    Session::set("semester",$semester); 
    Session::set("shift",$shift); 

    Session::set("dept",$get_dept);
    Session::set("semester",$get_semester);

    Session::set("subjectName",$subject);
    echo "<script>window.location='cmt_firstsem_first_shift.php'</script>";
    }
  }
?>
<div class="well text-center">
    <h2>First Time You Select Combo Box Then Continue-!</h2>
  </div>
<a href="att_dept_seme_shift.php">
    <button   type="submit" class="btn btn-primary pull-left">Back</button>
</a>

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="post" class="form-horizontal">
         <div class="form-group">
            <label for="exampleInputEmail1">Subject Name:</label>
            <select name="subject" class="form-control">
              <option value="">---Select Subject---</option>
  <?php 

  $sub_select = $sb->Sub_Select($semester,$dept);
  if ($sub_select) {
    while ($result = $sub_select->fetch_assoc()) {
 ?>
              <option value="<?php echo $result['sub_name']; ?>"><?php echo $result['sub_name']; ?></option>
  <?php } } ?>
            </select>
          </div>   
          <button  type="submit" name="sub_select" class="btn btn-primary">submit</button>
     </form>
    </div>

<?php include 'inc/footer.php'; ?>