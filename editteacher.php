 <?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/teacher.php'; ?>
<?php 
    $teach = new Teacher();
   
 ?>
<?php 
  
  if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
       $updateTeach = $teach->UpdateTeacher($_POST,$_FILES);
  }
   
 ?>


<?php

    if (isset($_GET['techid'])) {
        $techid = $_GET['techid'];
    }

       $teache_search=$teach->TeacherById($techid);

?>

<?php
 if(isset($teache_search)){
    while ($result = $teache_search->fetch_assoc()) { ?>
      

<h2 style="margin-bottom:30px;">Update Teacher's information here</h2>
<h3>
           <?php if (isset($updateTeach)) {
              echo $updateTeach;
           } ?>
</h3>

<div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
 <form action="" method="POST" enctype="multipart/form-data">
      <div class="table-responsive">
         <table class="table">

        <div class="form-group">
          <label for="exampleInputEmail1">Teacher Name</label>
          <td>:</td>
          <input " type="hidden" name="id" class="form-control" value="<?php echo $result['id'] ?>">
          <input " type="text" name="teacher_name" class="form-control" value="<?php echo $result['teacher_name'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Department</label>
            <select name="department" class="form-control">

            <option selected value="<?php echo $result['department'] ?>"><?php echo $result['department'] ?></option>
              
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
          <input " type="text" name="teacher_id" class="form-control" id="" value="<?php echo $result['teacher_id'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Joining Date</label>
          <td>:</td>
          <input " type="text" name="joining_date" class="form-control" id="" value="<?php echo $result['joining_date'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Designation</label>
          <td>:</td>
          <input " type="text" name="designation" class="form-control" value="<?php echo $result['designation'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Date of Birth</label>
          <td>:</td>
          <input " type="text" name="date_of_birth" class="form-control" id="" value="<?php echo $result['date_of_birth'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
            <select name="status" class="form-control">
             
              <option selected value="<?php echo $result['status'] ?>">

                      <?php
                         if ($result['status']=='0') {
                         echo "Running";
                      }else if($result['status']=='1'){
                       echo "Transfered";
                      }else if($result['status']=='2'){
                        echo "Retired";
                  } 
                  ?>
                
              </option>

              <option  value="0">Running</option>
              <option  value="1">Transfered</option>
              <option  value="2">Retired</option>


            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Image</label>
          <td>:</td>  
             <img height="40px" width="60px" src="<?php echo $result['image']?>">
          <input " type="file" name="image" class="form-control" id="" value="<?php echo $result[''] ?>">
        </div>
        
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
              <td>
              <button type="submit" class="btn btn-primary" name="update">Update</button></td>
          <td><button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>
         
         </table>
         </div>

</form>
<?php  } }
   ?>
   <a href="teacher_list.php"> <button type="reset" class="btn btn-default">Back</button></a>
</div>
      
  
</div>
</div>


</div



?>

<style>
  
  h2{
    text-align: center;
    color:green;
    }
    h3{
    text-align: center;
    color:green;
    }
    h4{
    text-align: center;
    color:red;
    }
</style>
<?php include 'inc/footer.php'; ?>