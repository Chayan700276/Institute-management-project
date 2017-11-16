<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Subject_select.php'; ?>

<?php 

$sb=new Subject_select();

 ?>
<?php 

     if (isset($_GET['subid'])) {
        $subid = $_GET['subid'];
        $edit_subject=$sb->Edit_Subject($subid);
    }
 ?>
<?php 

if(isset($_POST['del_subject_data'])){

  $del_subject=$sb->Delete_Subject($subid);

}
 ?>



<?php 

if(isset($_POST['Update_subject_data'])){

  $sub_name   =$_POST['sub_name'];
  $sub_code   =$_POST['sub_code'];
  $dept       =$_POST['dept'];
  $semester       =$_POST['semester'];

  $update_subject=$sb->Update_Subject($sub_name,$sub_code,$dept,$semester,$subid);

}
 ?>

<div class="well text-center">
    <h2>Subject Update Here~!</h2>
<?php 
  if(isset($update_subject)){
    echo $update_subject;
  }
 ?>
  </div>

<a href="all_show_subject.php"> <button  type="submit" name="Update_subject_data" class="btn btn-primary pull-left">Back</button></a>
    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-2">
      <form action="" method="post" class="form-horizontal">  
          <?php 
      if(isset($edit_subject)){     
      while ($result=$edit_subject->fetch_assoc()){   
      ?>     
          <div class="form-group">
          <label for="exampleInputEmail1">Subject Name</label>
          <td>:</td>
            <input type="text" name="sub_name" class="form-control" value="<?php echo $result['sub_name']; ?>">
          </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Subject Code</label>
          <td>:</td>
            <input type="text" name="sub_code" class="form-control" value="<?php echo $result['sub_code']; ?>"">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Deparment:</label>
            <select  name="dept" class="form-control">
              <option
              selected value="<?php echo $result['dept']; ?>">
              <?php echo $result['dept']; ?></option>
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
              <option selected value="<?php echo $result['semester']; ?>">
              <?php echo $result['semester']; ?></option>
              <option value="first">First</option>
              <option value="second">Second</option>
              <option value="third">Third</option>
              <option value="four">Four</option>
              <option value="five">Five</option>
              <option value="six">Six</option>
              <option value="seventh">Seventh</option>
            </select>
          </div>

             
        <?php }} ?>  
         <button  type="submit" name="Update_subject_data" class="btn btn-primary">Update Subject</button>
 

     </form>
    </div>
<style>
.sub_width {
  border: 2px solid navy;
  border-radius: 3px;
  font-size: 25px;
  height: 40px;
  margin-left: -180px;
  width: 960px;
}
.edit_subject {
  margin-left: 808px;
  margin-top: -65px;
}
</style>

<?php include 'inc/footer.php'; ?>