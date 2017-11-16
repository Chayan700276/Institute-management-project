<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/Subject_select.php'; ?>

<?php 

$sb=new Subject_select();

 ?>

<?php 

if(isset($_POST['insert_subject_data'])){
  $dept       =$_POST['dept'];
  $semester   =$_POST['semester'];
  
  $sub_name   =$_POST['sub_name'];
  $sub_code   =$_POST['sub_code'];

  $inser_subject=$sb->Insert_Subject( $dept, $semester,$sub_name,$sub_code);

}
 ?>
<div class="well text-center">
    <h2>Subject Insert Hete ~!</h2>
    <?php 
    if(isset( $inser_subject)){
      echo  $inser_subject;
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
        
          <div class="form-group">
          <label for="exampleInputEmail1">Subject Name</label>
          <td>:</td>
            <input type="text" name="sub_name" class="form-control" id="" placeholder="Enter Subject Name">
          </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Subject Code</label>
          <td>:</td>
            <input type="text" name="sub_code" class="form-control" id="" placeholder="Enter Sebject Code---[1111]">
          </div>
          
          <button  type="submit" name="insert_subject_data" class="btn btn-primary">Insert Subject</button>

     </form>
    </div>







<?php include 'inc/footer.php'; ?>