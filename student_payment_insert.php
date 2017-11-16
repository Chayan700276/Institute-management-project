<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'classes/paymentclass.php'; ?>
<?php
 $pay = new Payment();
if(isset($_POST['submit'])){
$roll           =$_POST['roll'];
$payment_type   =$_POST['payment_type'];
$amaount        =$_POST['amaount'];
$refardSub        =$_POST['refardSub'];
if(empty($roll) || empty($payment_type) || empty($amaount)){
  echo "<span style='color:red;font-size:20px'>Field must not be empty...!</span>";
}
else{
  Session::set("roll",$roll);
  Session::set("payment_type",$payment_type);
  Session::set("amaount",$amaount);
  Session::set("refardSub",$refardSub);
  echo "<script>window.location='payment_due_show.php'</script>";

}
}else if(isset($_POST['close'])){
  echo "<script>window.location='definefine.php'</script>";
}
 ?>

<div class="well text-center">
    <h2>Payment Insert Here!</h2>

  </div>
  

    <div class="col-xs-12 col-sm-7 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form action="" method="post" class="form-horizontal"
       enctype="multipart/form-data">

        <div class="form-group">
          <label for="exampleInputEmail1">Student Roll</label>
          <td>:</td>
          <input " type="text" name="roll" class="form-control" id="" placeholder="Enter Roll">
        </div>
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
          <label for="exampleInputEmail1">Refard subject No:</label>
            <select name="refardSub" class="form-control">
              <option value="">---if have---</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Payment Amount</label>
          <td>:</td>
          <input " type="text" name="amaount" class="form-control" id="" placeholder="Enter payment Amount">
        </div>
      
        <div class="form-grop">
           <div class="col-sm-offset-2 col-xs-10">
           <td>
              <button type="submit" class="btn btn-primary" name="close">Month close</button></td>
              <td>
              <button type="submit" class="btn btn-primary" name="submit">submit</button></td>
          <td><button type="reset" class="btn btn-primary">Reset</button></td>
          </div>
         </div>

</form>
    </div>






<?php include 'inc/footer.php'; ?>