 <?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/teacher.php'; ?>
<?php 
    $teach = new Teacher();
   
 ?>

<?php

    $dept=Session::get('dept');   

    if(!empty($dept)){
       $teache_search       =$teach->TeacherByDept($dept);
        $teachTransfered    =$teach->TeacherByDeptTransfeared($dept);
        $teachResigned      =$teach->TeacherByDeptResigned($dept);

 }
?>

<?php
 if(isset($teache_search)){
   ?>


<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
<table class="table table-bordered table-hover">

      <thead>
        <tr   class="success">
          <th>Sl.No</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Joining Date</th>
          <th>Birth Date</th>
          <th>ID No</th>
          <th>Status</th>
          <th>image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         <h2>Running Teacher`s List of <?php echo $dept; ?></h2>
    <?php 
    $i=0;
    while ($result=$teache_search->fetch_assoc()){ 
    $i++;
    ?>   
        <tr class="info">
          <td><?php echo $i; ?></td>
          <td><?php echo $result['teacher_name']; ?></td>
          <td><?php echo $result['designation']; ?></td>
          <td><?php echo $result['joining_date']; ?></td>
          <td><?php echo $result['date_of_birth']; ?></td>
          <td><?php echo $result['teacher_id']; ?></td>
           <td>
                   
                  <?php

                  if ($result['status']=='0') {
                    echo "Running";
                  }else if($result['status']=='1'){
                    echo "Transfered";
                  }else if($result['status']=='2'){
                    echo "Retired";
                  }
                  
                  ?> 
             
           </td>
          <td><img src="<?php echo $result['image']; ?>" height="40px" width="60px" ></td>
          
            <td> 
            
              <a href="editteacher.php?techid=<?php echo $result['id'];?>" class="btn btn-danger">Edit</a>
              
            

            </td>
        </tr>
        
      </tbody>
    
  <?php }}else{
    echo "<span style='color:red;font-size:20px;'>No Running Teacher Available!</span>";
    }  ?>
</table>

<?php
 if(isset($teachTransfered)){
   ?>
<table class="table table-bordered table-hover">

      <thead>
        <tr   class="success">
          <th>Sl.No</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Joining Date</th>
          <th>Birth Date</th>
          <th>ID No</th>
          <th>Status</th>
          <th>image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         <h2 style='color:yellowgreen'>Transfered Teacher`s List of <?php echo $dept; ?></h2>

    <?php 
    $i=0;
    while ($rresult=$teachTransfered->fetch_assoc()){ 
    $i++;
    ?>   
        <tr class="danger">
          <td><?php echo $i; ?></td>
          <td><?php echo $rresult['teacher_name']; ?></td>
          <td><?php echo $rresult['designation']; ?></td>
          <td><?php echo $rresult['joining_date']; ?></td>
          <td><?php echo $rresult['date_of_birth']; ?></td>
          <td><?php echo $rresult['teacher_id']; ?></td>
           <td>

             
                  <?php

                  if ($rresult['status'] =='0') {
                    echo "Running";
                  }else if($rresult['status']=='1'){
                    echo "Transfered";
                  }elseif($rresult['status']=='2'){
                    echo "Retired";
                  }
                  
                  ?> 
             


           </td>
          <td><img src="<?php echo $rresult['image']; ?>" height="40px" width="60px" ></td>
          
            <td> 
            
              <a href="editteacher.php?techid=<?php echo $rresult['id'];?>" class="btn btn-danger">Edit</a>  

            </td>
        </tr>
        
      </tbody>
    
  <?php }} ?>
</table>


<?php
 if(isset($teachResigned)){
   ?>
<table class="table table-bordered table-hover">

      <thead>
        <tr   class="active">
          <th>Sl.No</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Joining Date</th>
          <th>Birth Date</th>
          <th>ID No</th>
          <th>Status</th>
          <th>image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         <h2 style="color:red">Retired Teacher`s List of <?php echo $dept; ?></h2>

    <?php 
    $i=0;
    while ($rrresult=$teachResigned->fetch_assoc()){ 
    $i++;
    ?>   
        <tr class="info">
          <td><?php echo $i; ?></td>
          <td><?php echo $rrresult['teacher_name']; ?></td>
          <td><?php echo $rrresult['designation']; ?></td>
          <td><?php echo $rrresult['joining_date']; ?></td>
          <td><?php echo $rrresult['date_of_birth']; ?></td>
          <td><?php echo $rrresult['teacher_id']; ?></td>
           <td>

             
                  <?php

                  if ($rrresult['status'] =='0') {
                    echo "Running";
                  }else if($rrresult['status']=='1'){
                    echo "Transfered";
                  }elseif($rrresult['status']=='2'){
                    echo "Retired";
                  }
                  
                  ?> 
             


           </td>
          <td><img src="<?php echo $rrresult['image']; ?>" height="40px" width="60px" ></td>
          
            <td> 
            
              <a href="editteacher.php?techid=<?php echo $rrresult['id'];?>" class="btn btn-danger">Edit</a>  

            </td>
        </tr>
        
      </tbody>
    
  <?php }} ?>
</table>





      <a href="teacher_search.php"> <button type="reset" class="btn btn-default">Back</button></a>
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