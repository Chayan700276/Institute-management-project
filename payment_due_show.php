<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/paymentclass.php'; ?>
<?php
 $Roll        = Session::get("roll");
 $payment_type= Session::get("payment_type");
 $amaount     = Session::get("amaount");
 $refardSub   = Session::get("refardSub");
 $pay = new Payment();

if(empty($Roll) || empty($payment_type) || empty($amaount)){
  echo "<span style='color:red;font-size:20px'>Field must not be empty...!</span>";
  }
else{
    $queryroll="SELECT * FROM `tbl_student` WHERE `roll`='$Roll'";
    $chk=$db->select($queryroll);
    if($chk){
  
    $due=$pay->selectdue($Roll,$payment_type,$refardSub);
  if($due){
    $due=$due;
  }
     $insert=$pay->paymentDue($Roll,$payment_type,$due,$refardSub,$amaount);

  $payment=$pay->insertpayment($Roll,$payment_type,$amaount,$due,$refardSub);
  if($payment){
  echo $payment;
  }
}else {
  echo "<span style='color:red;font-size:20px'>Roll not found...!</span>";
}

}

if(isset($_POST['submit'])){
  echo "<script>window.location='student_payment_insert.php'</script>";
  }
 ?>

<div class="well text-center">
    <h2>Payment Status</h2>

  </div>
  

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form>

        <div class="form-group">
          <label for="exampleInputEmail1">Student Roll</label>
          <td>:</td>
          <input " type="text" class="form-control" id="" value="<?php echo $Roll;?>">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Payment type</label>
            <select  class="form-control">
              <option value="">---Select Role---</option>
              <?php if($payment_type=='month_fee'){?>
              <option selected="" value="month_fee">month_fee</option>
              <?php }?>
              <?php if($payment_type=='exam_fee'){?>
              <option selected="" value="exam_fee">exam_fee</option>
              <?php }?>
              <?php if($payment_type=='add_fee'){?>
              <option selected="" value="addmission">addmission</option>
              <?php }?>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Payment Amount</label>
          <td>:</td>
          <input " type="text" class="form-control" id="" value="<?php echo $amaount;?>">
        </div>
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
           <div class="ok">
              <a href="student_payment_insert.php">ok</a>
              </div>
          </div>
         </div>

</form>
    </div>


<style>
 .ok{
  font-size: 30px;
  width: 25px;
 }
 .ok a{
   background: blue none repeat scroll 0 0;
    color: white;
    width: 50px;
    padding: 0px 20px;
    
 }
</style>



<?php include 'inc/footer.php'; ?>