<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Subject_select.php'; ?>

<?php 
$sb=new Subject_select();
 ?>

<?php 

if(isset($_POST['show_subject_data'])){

$dept=$_POST['dept'];
$semester=$_POST['semester'];

if(empty($dept) or empty($semester)){
  echo "<span class='error' >Field Not Be Empty~!</span>";
}
else{
  Session::set("set_dept",$dept);
 Session::set("set_semester",$semester);

 echo "<script>window.location='all_show_subject.php'</script>";

}




$show_subject=$sb->Show_Subject($dept,$semester);

}
 ?>

<div class="well text-center">
    <h2>Subject Insert Hete ~!</h2>
    <?php 
    if(isset( $show_subject)){
      echo  $show_subject;
    }
     ?>
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
              
          <button  type="submit" name="show_subject_data" class="btn btn-primary">Show Subject</button>

     </form>
    </div>
<?php include 'inc/footer.php'; ?>