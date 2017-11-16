 <?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/paymentclass.php'; ?>
<?php
 $pay = new Payment();
   
 ?>

<div class="container-fluid marginTop">
<div class="row">
<div class="col-xs-12">
 <div class="table-responsive">
  <h2>Define Different Fee</h2>
<table class="table table-bordered table-hover">

      <thead>
        <tr   class="success">
          <th width="5%">Sl.No</th>
          <th width="20%">Semester</th>
          <th width="15%">Month Fee</th>
          <th width="20%">Examination Fee</th>
          <th width="20%">Addmission Fee</th>
          <th width="20%">Rafard Exam. Fee</th>
        </tr>
      </thead>
      <tbody>
    <?php 
    $i=0;
    $query="SELECT * FROM `payment`";
    $data=$db->select($query);
    if($data){
    while ($result=$data->fetch_assoc()){ 
      
    $i++;
    ?>   
        <tr class="danger">
          <td><?php echo $i; ?></td>
          <td><?php echo $result['semester']; ?></td>
          <td><?php echo $result['month_fee']; ?></td>
          <td><?php echo $result['exam_fee']; ?></td>
          <td><?php echo $result['admission_fee']; ?></td>
          <td><?php echo $result['refard_sub_fee']; ?></td>
        </tr>
        
      </tbody>
    
  <?php }}else{
    echo "<span style='color:red;font-size:20px;'>No data Available!</span>";
    }  ?>
</table>
 <div class="ok">
              <a href="payment.php">ok</a>
              </div>
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

 .ok{
  font-size: 30px;
  width: 25px;

 }
 .ok a{
   background: blue none repeat scroll 0 0;
    color: white;
    width: 50px;
    text-align: center;
    padding: 0px 20px;
    margin-left: 500px;
 }
</style>
<?php include 'inc/footer.php'; ?>