 <?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/stu_Registration.php'; ?>
<?php 
    $reg = new Student();
   
 ?>

<?php
  $dept=Session::get('dept');
   $semester=Session::get('semester');
    $shift=Session::get('shift');
    if(!empty($dept) || !empty($semester) || !empty($shift)){
  $semesterSearch=$reg->semesterSearch($dept,$semester,$shift);
 }
?>

<?php
 if(isset($semesterSearch)){
   ?>

<?php 

if(isset($_GET['dellroll'])){
  $roll=$_GET['dellroll'];

  $delpro = $reg->StudentDeleteById($roll);
}



?>










<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
<table class="table table-bordered table-hover">

      <thead>
        <tr   class="success">
          <th width="10%">Sl.No</th>
          <th width="25%">Name</th>
          <th width="20%">Roll</th>
          <th width="20%">Reg. No.</th>
          <th width="10%">image</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
      <tbody>
      
      <h2>Department : <?php echo $dept; ?></h2>
          <h3>Semester : <?php echo $semester; ?></h3>
          <h4>Shift : <?php echo $shift; ?></h4>
    <?php 
    $i=0;
    while ($result=$semesterSearch->fetch_assoc()){ 
    $i++;
    ?>   
        <tr class="danger">
          <td><?php echo $i; ?></td>
          <td><?php echo $result['name']; ?></td>
          <td><?php echo $result['roll']; ?></td>
          <td><?php echo $result['reg']; ?></td>
          <td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"></td>
          
            <td> 
            
              <a href="viewStudent.php?stuid=<?php echo $result['id'];?>" class="btn btn-danger">View</a>||
              <a onclick="return confirm('Are you sure to Delete this student...!')" href="?dellroll=<?php echo $result['roll'];?>" class="btn btn-danger">Delete</a>
            

            </td>
        </tr>
        
      </tbody>
    
  <?php }}else{
    echo "<span style='color:red;font-size:20px;'>No data Available!</span>";
    }  ?>
</table>
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