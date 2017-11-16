 <?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/employee.php'; ?>
<?php 
    $em = new EMPLOYEE();
   
 ?>
<?php 
  
  if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['emupdate'])){
       $updateem = $em->UpdateEmployee($_POST,$_FILES);
  }
   
 ?>


<?php

    if (isset($_GET['emid'])) {
        $emid = $_GET['emid'];
    }

       $em_search=$em->EmployeeById($emid);

?>

<?php
 if(isset($em_search)){
    while ($result = $em_search->fetch_assoc()) { ?>
      

<h2 style="margin-bottom:30px;">Update Employee's information here</h2>
<h3>
           <?php if (isset($updateem)) {
              echo $updateem;
           } ?>
</h3>

<div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
 <form action="" method="POST" enctype="multipart/form-data">
      <div class="table-responsive">
         <table class="table">

        <div class="form-group">
          <label for="exampleInputEmail1">Employee Name</label>
          <td>:</td>
          <input " type="hidden" name="id" class="form-control" value="<?php echo $result['id'] ?>">
          <input " type="text" name="employee_name" class="form-control" value="<?php echo $result['employee_name'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Employee ID</label>
          <td>:</td>
          <input " type="text" name="employee_id" class="form-control" id="" value="<?php echo $result['employee_id'] ?> ">
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

            <option seleted value="<?php echo $result['status'] ?>"><?php echo $result['status'] ?></option>

              <option value="running">Running</option>
              <option value="transfered">Transfered</option>
              <option value="retired">Retired</option>


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
              <button type="submit" class="btn btn-primary" name="emupdate">Update</button></td>
          <td><button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>
         
         </table>
         </div>

</form>
<?php  }}else{
      echo "Something went worng";
    }
   ?>
   <a href="employeelist.php"> <button type="reset" class="btn btn-default">Back</button></a>
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