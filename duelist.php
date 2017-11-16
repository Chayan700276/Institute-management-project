 <?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/paymentclass.php'; ?>
<?php
 $pay = new Payment();
   
 ?>


<?php 

if(isset($_GET['dellroll'])){
  $id=$_GET['dellroll'];

  $deldata = $pay->StudentDeleteById($id);
}



?>

<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
  <h2>Student List who's have Due</h2>
<table class="table table-bordered table-hover">

      <thead>
        <tr   class="success">
          <th width="10%">Sl.No</th>
          <th width="20%">Name</th>
          <th width="10%">Roll</th>
          <th width="10%">Department</th>
          <th width="10%">Semester</th>
          <th width="10%">Shift</th>
          <th width="15%">Due type</th>
          <th width="5%">Amount</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
      <tbody>
    <?php 
    $i=0;
    $query="SELECT * FROM `payment_due_tbl` where `due`>0";
    $data=$db->select($query);
    if($data){
    while ($result=$data->fetch_assoc()){ 
      
    $i++;
    ?>   
        <tr class="danger">
          <td><?php echo $i; ?></td>
          <td><?php echo $result['name']; ?></td>
          <td><?php echo $result['roll']; ?></td>
          <td><?php echo $result['dept']; ?></td>
          <td><?php echo $result['semester']; ?></td>
          <td><?php echo $result['shift']; ?></td>
          <td><?php echo $result['due_type']; ?></td>
          <td><?php echo $result['due']; ?></td>
          
            <td>
              <a onclick="return confirm('Are you sure to Delete this student...!')" href="?dellroll=<?php echo $result['id'];?>" class="btn btn-danger">Pay</a>
            

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
     border-bottom: 2px solid red;
    color: royalblue;
    font-size: 51px;
    text-align: center;
    text-shadow: 4px 3px 2px black;
    }
    h3{
    text-align: center;
    color:green;
    }
    h4{
    text-align: center;
    color:red;
    }
    th{
      font-size: 20px;
    }
</style>
<?php include 'inc/footer.php'; ?>