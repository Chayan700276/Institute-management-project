 <?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/employee.php'; ?>
<?php 
    $teach = new EMPLOYEE();
   
 ?>

<?php

       $em_search_run=$teach->getAllEmployeeByRunning();
       $em_search_trans=$teach->getAllEmployeeByTrans();
       $em_search_retired=$teach->getAllEmployeeByRetired();

?>


<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">

<?php
 if(isset($em_search_run)){
   ?>


<table class="table table-bordered table-hover">

      <thead>
        <tr   class="success">
          <th>Sl.No</th>
          <th>ID No</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Joining Date</th>
          <th>Birth Date</th>
           <th>Status</th>
          <th>image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         <h2>Running Employee List</h2>
   

    <?php 
    $i=0;
    while ($result=$em_search_run->fetch_assoc()){ 
    $i++;
    ?>   
        <tr class="active">
          <td><?php echo $i; ?></td>
          <td><?php echo $result['employee_id']; ?></td>
          <td><?php echo $result['employee_name']; ?></td>
          <td><?php echo $result['designation']; ?></td>
          <td><?php echo $result['joining_date']; ?></td>
          <td><?php echo $result['date_of_birth']; ?></td>
          <td><?php echo $result['status']; ?></td>
          <td><img src="<?php echo $result['image']; ?>" height="40px" width="60px" ></td>
          
            <td> 
            
              <a href="editemployee.php?emid=<?php echo $result['id'];?>" class="btn btn-danger">Edit</a>
              
            

            </td>
        </tr>
        
      </tbody>
    
  <?php }}else{
    echo "<span style='color:red;font-size:20px;'>No data Available!</span>";
    }  ?>

<?php
 if(isset($em_search_trans)){
   ?>


</table>
<table class="table table-bordered table-hover">

      <thead>
        <tr   class="success">
          <th>Sl.No</th>
          <th>ID No</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Joining Date</th>
          <th>Birth Date</th>
           <th>Status</th>
          <th>image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         <h2>Transfered Employee List</h2>
   

    <?php 
    $i=0;
    while ($tresult=$em_search_trans->fetch_assoc()){ 
    $i++;
    ?>   
        <tr class="active">
          <td><?php echo $i; ?></td>
          <td><?php echo $tresult['employee_id']; ?></td>
          <td><?php echo $tresult['employee_name']; ?></td>
          <td><?php echo $tresult['designation']; ?></td>
          <td><?php echo $tresult['joining_date']; ?></td>
          <td><?php echo $tresult['date_of_birth']; ?></td>
          <td><?php echo $tresult['status']; ?></td>
          <td><img src="<?php echo $tresult['image']; ?>" height="40px" width="60px" ></td>
          
            <td> 
            
              <a href="editemployee.php?emid=<?php echo $tresult['id'];?>" class="btn btn-danger">Edit</a>
              
            

            </td>
        </tr>
        
      </tbody>
    
  <?php }}
     ?>
</table>

<?php
 if(isset($em_search_retired)){
   ?>

<table class="table table-bordered table-hover">

      <thead>
        <tr   class="success">
          <th>Sl.No</th>
          <th>ID No</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Joining Date</th>
          <th>Birth Date</th>
           <th>Status</th>
          <th>image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         <h2>Retired Employee List</h2>
   

    <?php 
    $i=0;
    while ($rresult=$em_search_retired->fetch_assoc()){ 
    $i++;
    ?>   
        <tr class="active">
          <td><?php echo $i; ?></td>
          <td><?php echo $rresult['employee_id']; ?></td>
          <td><?php echo $rresult['employee_name']; ?></td>
          <td><?php echo $rresult['designation']; ?></td>
          <td><?php echo $rresult['joining_date']; ?></td>
          <td><?php echo $rresult['date_of_birth']; ?></td>
          <td><?php echo $rresult['status']; ?></td>
          <td><img src="<?php echo $rresult['image']; ?>" height="40px" width="60px" ></td>
          
            <td> 
            
              <a href="editemployee.php?emid=<?php echo $rresult['id'];?>" class="btn btn-danger">Edit</a>
              
            

            </td>
        </tr>
        
      </tbody>
    
  <?php }} ?>
</table>

      <a href="employee.php"> <button type="reset" class="btn btn-default">Back</button></a>
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