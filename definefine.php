<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/paymentclass.php'; ?>
<?php
 $pay = new Payment();
if(isset($_POST['submit'])){
  $payment_type   =$_POST['payment_type'];
  $due        =$_POST['fine'];
  $refardSub=0;
  $amaount=0;
if(empty($payment_type) || empty($fine)){
  echo "<span style='color:red;font-size:20px'>Field must not be empty...!</span>";
}
else{
  $query="SELECT * FROM `tbl_student`";
  $data=$db->select($query);
  while($result=$data->fetch_assoc()){
  $Roll=$result['roll'];
   $fine=$pay->insertfine($Roll,$payment_type,$amaount,$due,$refardSub);
   $finelist=$pay->paymentDue($Roll,$payment_type,$due,$refardSub,$amaount);
  }
 if($fine)
  echo "Fine insert successfully...";
}
}
 ?>

<div class="well text-center">
    <h2>Payment Insert Here!</h2>

  </div>
  

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="post" class="form-horizontal"
       enctype="multipart/form-data">
         <div class="form-group">
          <label for="exampleInputEmail1">Payment type</label>
            <select name="payment_type" class="form-control">
              <option value="">---Select option---</option>
              <option value="month_fee">month_fee</option>
              <option value="exam_fee">exam_fee</option>
              <option value="add_fee">addmission</option>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">fine</label>
          <td>:</td>
          <input " type="text" name="fine" class="form-control" id="" placeholder="Enter fine Amount">
        </div>
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
           <td>
              <a onclick=" return confirm('Are you sure difine the fine..!');"><button type="submit" class="btn btn-primary" name="submit">submit</button></a></td>
          <td><button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>

</form>
    </div>






<?php include 'inc/footer.php'; ?>