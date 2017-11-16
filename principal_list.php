 <?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/principal.php'; ?>
<?php 
    $ppal = new Principal();
   
 ?>

<?php

       $em_search_run=$ppal->getAllPrincipalByRunning();
       $em_search_trans=$ppal->getAllPrincipalByTrans();
       $em_search_retired=$ppal->getAllPrincipalByRetired();

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
          <th width="1%">SL</th>
          <th width="">Name</th>
          <th width="">Email</th>
          <th width="">Designation</th>
          <th width="">Joining Date</th>
          <th width="">Birth Date</th>
           <th width="">Status</th>
          <th width="">image</th>
          <th width="">Action</th>
        </tr>
      </thead>
      <tbody>
         <h2>Running Principal</h2>
   

    <?php 
    $i=0;
    while ($result=$em_search_run->fetch_assoc()){ 
    $i++;
    ?>   
        <tr class="active">
          <td><?php echo $i; ?></td>
          <td><?php echo $result['principal_name']; ?></td>
          <td><?php echo $result['p_gmail']; ?></td>
          <td><?php echo $result['designation']; ?></td>
          <td><?php echo $result['joining_date']; ?></td>
          <td><?php echo $result['date_of_birth']; ?></td>
          <td><?php echo $result['status']; ?></td>
          <td><img src="<?php echo $result['image']; ?>" height="40px" width="60px" ></td>
          
            <td> 
            
              <a href="editpricipal.php?pid=<?php echo $result['id'];?>" class="btn btn-danger">Edit</a>
              
            

            </td>
        </tr>
        
      </tbody>
    
  <?php }}else{
    echo "<span style='color:red;font-size:20px;'>No Running Principal Available!</span>";
    }  ?>

<?php
 if(isset($em_search_trans)){
   ?>


</table>
<table class="table table-bordered table-hover">

     <thead>
        <tr   class="success">
          <th width="2%">SL</th>
          <th width="">Name</th>
          <th width="5%">Email</th>
          <th width="">Designation</th>
          <th width="">Joining Date</th>
          <th width="">Birth Date</th>
          <th width="">Transfered Date</th>
           <th width="">Status</th>
          <th width="">image</th>
          <th width="2%">Action</th>
        </tr>
      </thead>
      <tbody>
         <h2>Transfered Principal`s List</h2>
   

    <?php 
    $i=0;
    while ($tresult=$em_search_trans->fetch_assoc()){ 
    $i++;
    ?>   
        <tr class="active">
          <td><?php echo $i; ?></td>
          <td><?php echo $tresult['principal_name']; ?></td>
          <td width="10%"><?php echo $tresult['p_gmail']; ?></td>
          <td><?php echo $tresult['designation']; ?></td>
          <td><?php echo $tresult['joining_date']; ?></td>
          <td><?php echo $tresult['date_of_birth']; ?></td>
          <td><?php echo $tresult['transfered_date']; ?></td>
          <td><?php echo $tresult['status']; ?></td>
          <td><img src="<?php echo $tresult['image']; ?>" height="40px" width="60px" ></td>
          
            <td> 
            
              <a href="editpricipal.php?pid=<?php echo $tresult['id'];?>" class="btn btn-danger">Edit</a>
              
            

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
          <th>SL</th>
          <th>Name</th>
          <th>Email</th>
          <th>Designation</th>
          <th>Joining Date</th>
          <th>Birth Date</th>
          <th>Retired Date</th>
           <th>Status</th>
          <th>image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         <h2>Retired Principal List</h2>
   

    <?php 
    $i=0;
    while ($rresult=$em_search_retired->fetch_assoc()){ 
    $i++;
    ?>   
        <tr class="active">
          <td><?php echo $i; ?></td>
          <td><?php echo $rresult['principal_name']; ?></td>
          <td><?php echo $rresult['p_gmail']; ?></td>
          <td><?php echo $rresult['designation']; ?></td>
          <td><?php echo $rresult['joining_date']; ?></td>
          <td><?php echo $rresult['date_of_birth']; ?></td>
          <td><?php echo $rresult['retired_date']; ?></td>
          <td><?php echo $rresult['status']; ?></td>
          <td><img src="<?php echo $rresult['image']; ?>" height="40px" width="60px" ></td>
          
            <td> 
        
              <a href="editpricipal.php?pid=<?php echo $rresult['id'];?>" class="btn btn-danger">Edit</a>


            </td>
        </tr>
        
      </tbody>
    
  <?php }} ?>
</table>

      <a href="principal.php"> <button type="reset" class="btn btn-default">Back</button></a>
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